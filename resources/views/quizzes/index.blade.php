<x-layouts.app>
{{--@section('content')--}}
    <div class="container">
        <h1>Quizzes</h1>
        <a href="{{ route('quizzes.create') }}" class="btn btn-primary">Create New Quiz</a>
        <ul>
            @foreach ($quizzes as $quiz)
                <li>
                    <a href="{{ route('quizzes.show', $quiz) }}">{{ $quiz->title }}</a>
                    <a href="{{ route('quizzes.edit', $quiz) }}">Edit</a>
                    <form action="{{ route('quizzes.destroy', $quiz) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.app>
