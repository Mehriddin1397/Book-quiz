@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $quiz->title }}</h1>
        <p>Score: {{ $score }} / {{ $total }}</p>
        <a href="{{ route('quizzes.index') }}">Back to Quizzes</a>
    </div>
@endsection
