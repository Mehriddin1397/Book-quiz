<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        $questions = Question::all();
        return view('admin.question.index', compact('questions','quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizzes = Quiz::all();
        return view('questions.create', compact('quizzes'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        if ($request->hasFile('photo')){
            $name=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('question-photo',$name);
        }

        $question = Question::create([
            'quiz_id'=>$request->quiz_id,
            'question' => $request->question,
            'photo' => $path ?? null,
            'a'=> $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'ans' => $request->ans,
        ]);
        \Illuminate\Support\Facades\Session::put('success', 'Question added successfully');
        return redirect()->route('questions.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz, Question $question)
    {
        return view('questions.edit', compact('quiz', 'question'));
    }


    public function update(Request $request, Quiz $quiz, Question $question)
    {
        if ($request->hasFile('photo')){
            if (isset($question->photo)){
                Storage::delete($question->photo);
            }
            $name=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('question-photo',$name);
        }

        $question->update([
            'quiz_id'=>1,
            'question' => $request->question,
            'photo' => $path ?? $question->photo,
            'a'=> $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'ans' => $request->ans,
        ]);

        return redirect()->route('quizzes.show', 1);
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        return redirect()->route('quizzes.show', 1);
    }

    public function startQuiz(Question $question)
    {
        Session::put("nextq",'1');
        Session::put("wrongans",'0');
        Session::put("correctans",'0');

        $q = Question::all()->first();

        return view('questions.answerDesk')->with('question',$q);
    }

    public function submitans(Request $request, Question $question)
    {
        $nextq = Session::get('nextq');
        $wrongans = Session::get('wrongans');
        $correctans = Session::get('correctans');

        $validated = $request->validate([
            'ans'=>'required',
            'dbans'=>'required',
        ]);
        $nextq+=1;

        if ($request->dbans == $request->ans){
            $correctans+=1;
        }
        else{
            $wrongans+=1;
        }

        Session::put("nextq",$nextq);
        Session::put("wrongans",$wrongans);
        Session::put("correctans",$correctans);

        $i = 0;
        $questions = Question::all();

        foreach ($questions as $question){

            $i++;

            if ($questions->count() < $nextq){
                return view('questions.end');
            }

            if ($i == $nextq){
                return view('questions.answerDesk')->with('question',$question);
            }
        }
    }

}
