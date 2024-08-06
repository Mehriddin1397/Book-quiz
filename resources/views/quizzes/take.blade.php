@extends('layouts.main')
@section('title','Test yaratish')

@section('content')
    <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Contact</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
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
