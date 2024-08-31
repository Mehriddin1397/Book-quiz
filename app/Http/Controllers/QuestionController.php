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
            ''=>$request->category_id,
            'nomi'=> $request->nomi,
            'narxi'=> $request->narxi,
            'tasnifi'=>$request->tasnifi,
            'photo'=>$path ?? null,
        ]);
        $quiz->questions()->create($request->all());
        \Illuminate\Support\Facades\Session::put('success', 'Question added successfully');
        return redirect()->route('/');
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
//        $request->validate([
//            'question' => 'required',
//            'option_a' => 'required',
//            'option_b' => 'required',
//            'option_c' => 'required',
//            'option_d' => 'required',
//            'correct_option' => 'required',
//        ]);
//
//        $question->update($request->all());
//        return redirect()->route('quizzes.show', $quiz);
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        return redirect()->route('quizzes.show', $quiz);
    }

}
