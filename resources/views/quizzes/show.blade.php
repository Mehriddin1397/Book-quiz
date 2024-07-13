@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $quiz->title }}</h1>
        <p>{{ $quiz->description }}</p>
        <a href="{{ route('questions.create', $quiz) }}" class="btn btn-primary">Add Question</a>
        <ul>
            @foreach ($quiz->questions as $question)
                <li>
                    {{ $question->question }}
                    <a href="{{ route('questions.edit', [$quiz, $question]) }}">Edit</a>
                    <form action="{{ route('questions.destroy', $question) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
