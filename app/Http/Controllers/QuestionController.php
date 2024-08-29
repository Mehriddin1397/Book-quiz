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

        $request->validate([
            'question' => 'required',
            'photo' => $path ?? null,
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'ans' => 'required',
        ]);

        $quiz->questions()->create($request->all());
        return redirect()->route('quizzes.show', $quiz);
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
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_option' => 'required',
        ]);

        $question->update($request->all());
        return redirect()->route('quizzes.show', $quiz);
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();
        return redirect()->route('quizzes.show', $quiz);
    }

}
