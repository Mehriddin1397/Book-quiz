{{--@extends('layouts.main')--}}
{{--@section('title','Test yaratish')--}}

{{--@section('content')--}}
{{--    <div class="container-xxl py-5 bg-primary hero-header">--}}
{{--        <div class="container my-5 py-5 px-lg-5">--}}
{{--            <div class="row g-5 py-5">--}}
{{--                <div class="col-12 text-center">--}}
{{--                    <h1 class="text-white animated slideInDown">Contact</h1>--}}
{{--                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb justify-content-center">--}}
{{--                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>--}}
{{--                            <li class="breadcrumb-item text-white active" aria-current="page">Create</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container">
        <h1>{{ $quiz->title }}</h1>
        <p>{{ $quiz->description }}</p>
        <a href="{{ route('questions.create', ['quiz'=>$quiz->id]) }}" class="btn btn-primary">Add Question</a>
        <ul>
            @foreach ($quiz->questions as $question)
               <table>
                <tr>
                    <td>{{$loop->index}}</td>
                    <td> {{ $question->question }}</td>

                    <td>
                    <a href="{{ route('questions.edit', $question->id) }}">Edit</a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
               </table>
            @endforeach
        </ul>
    </div>
{{--@endsection--}}
