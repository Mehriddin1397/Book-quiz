<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        if ($request->hasFile('photo')){
            $name=$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('question-photo',$name);
        }

        $question = Question::create([
            'quiz_id'=>1,
            'question' => $request->question,
            'photo' => $path ?? null,
            'a'=> $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'ans' => $request->ans,
        ]);
        \Illuminate\Support\Facades\Session::put('success', 'Question added successfully');
        return redirect()->route('quizzes.show',1);
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
        $request->validate([
            'quiz_id' => 'required',
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'ans' => 'required',
        ]);

        $question->update($request->all());
        return redirect()->route('quizzes.show', $quiz);
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        dd($quiz->id);
        return redirect()->route('quizzes.show', 1);
    }

}
