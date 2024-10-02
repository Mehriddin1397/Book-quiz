<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizes = Quiz::all();
        return view('admin.quiz.index', compact('quizes'));
    }

    public function create()
    {
        return view('quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Quiz::create($request->all());
        return redirect()->route('quizzes.index');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quiz.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $quiz->update($request->all());
        return redirect()->route('quizzes.index');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index');
    }

//    public function take(Quiz $quiz) //bu funksiyada quizlar yuboriladi
//    {
//        $questions = $quiz->questions;
//        return view('quizzes.take', compact('quiz', 'questions'));
//    }
//
//    public function submit(Request $request, Quiz $quiz)// bu funksiyada kelgan javoblarni tekshiradi
//    {
//        $score = 0;
//        $total = count($quiz->questions);
//
//        foreach ($quiz->questions as $question) {
//            if ($request->answers[$question->id] == $question->correct_option) {
//                $score++;
//            }
//        }
//
//        return view('quizzes.result', compact('quiz', 'score', 'total'));
//    }


}
