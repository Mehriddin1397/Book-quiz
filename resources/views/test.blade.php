{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <h1>Test</h1>

    <form action="{{ route('submitTest') }}" method="POST">
        @csrf

        @foreach ($questions as $question)
            <div>
                <p>{{ $loop->iteration }}. {{ $question->question_text }}</p>

                @foreach ($question->options as $option)
                    <label>
                        <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}">
                        {{ $option->option_text }}
                    </label><br>
                @endforeach
            </div>
        @endforeach

        <button type="submit">Submit</button>
    </form>
{{--@endsection--}}
