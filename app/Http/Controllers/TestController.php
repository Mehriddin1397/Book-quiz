<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TestController extends Controller
{
    public function startTest()
    {
// Test boshlanish vaqtini saqlash
        Session::put('start_time', Carbon::now());

// Savollarni olish
        $questions = Question::all();

        return view('test', compact('questions'));
    }

    public function submitTest(Request $request)
    {
        // Testni tugatish va vaqtni hisoblash
        $start_time = Session::get('start_time');
        $end_time = Carbon::now();
        $total_time = $start_time->diffInMinutes($end_time);

        // To'g'ri javoblar sonini hisoblash
        $correctAnswers = 0;
        $totalQuestions = count($request->questions);

        foreach ($request->questions as $questionId => $userAnswer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer == $userAnswer) {
                $correctAnswers++;
            }
        }

    // Natijalarni saqlash
        $result = [
            'correct' => $correctAnswers,
            'total' => $totalQuestions,
            'time_spent' => $total_time
        ];

        Session::forget('start_time');

        return view('result', compact('result'));
    }

    public function saveResults(Request $request)
    {
        $userId = auth()->id(); // Foydalanuvchi ID sini olish
        $correctAns = session('correctans');
        $wrongAns = session('wrongans');

        // Model orqali natijalarni bazaga saqlash
        \App\Models\TestResult::create([
            'user_id' => $userId,
            'correct_answers' => $correctAns,
            'wrong_answers' => $wrongAns,
            'total_answers' => $correctAns + $wrongAns,
        ]);

        // Sessionni tozalash yoki boshqa kerakli amallarni bajaring
        session()->forget(['correctans', 'wrongans']);

        return redirect('/')->with('success', 'Test natijalari saqlandi!');
    }

    // TestController.php
    public function verifyCode(Request $request)
    {
        $code = $request->input('code');

        // Kodni bazadan qidiramiz
        $testCode = \App\Models\TestCode::where('code', $code)->where('is_used', false)->first();

        if (!$testCode) {
            return back()->with('error', 'Noto‘g‘ri kod yoki kod allaqachon ishlatilgan.');
        }

        // Kodni ishlatilgan deb belgilashdan oldin foydalanuvchi tizimga kirganligini tekshiramiz
        if (auth()->check()) {
            // Kod ishlatilgan deb belgilanadi va user_id yangilanadi
            $testCode->update([
                'is_used' => 1,
                'user_id' => auth()->id(),
            ]);

            // Test sahifasiga o'tkaziladi
            return redirect()->route('startquiz');
        }

        return back()->with('error', 'Foydalanuvchi tizimga kirmagan.');
    }




}

