@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $quiz->title }}</h1>
        <form action="{{ route('quizzes.submit', $quiz) }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <div>
                    <h4>{{ $question->question }}</h4>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" value="option_a" required> {{ $question->option_a }}
                    </div>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" value="option_b" required> {{ $question->option_b }}
                    </div>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" value="option_c" required> {{ $question->option_c }}
                    </div>
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]}" value="option_d" required> {{ $question->option_d }}
                    </div>
                </div>
            @endforeach
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
