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
    <div class="container-fluid">
        <form method="POST" action="{{route('submitans')}}">
            @csrf
        <div class="row" style="padding-top: 10vh;">
                <div class="col" style="margin-left: 20vh">
                    <h4> {{\Illuminate\Support\Facades\Session::get("nextq")}} : {{$question->question}}</h4> <br>
                    <img class="img " style="width: 200px !important;" src="{{asset('storage/'.$question->photo)  }} " alt="image"><br>
                    <input value="a"  checked="true" name="ans" type="radio"> A <small> {{$question->a}}</small> <br>
                    <input value="b" name="ans" type="radio"> B <small> {{$question->b}}</small> <br>
                    <input value="c" name="ans" type="radio"> C <small> {{$question->c}}</small> <br>
                    <input value="d" name="ans" type="radio"> D <small> {{$question->d}}</small> <br>
                    <input value="{{$question->ans}}" style="visibility: hidden" name="dbans">
                </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"> Next</button>
            </div>
            <div class="col-md-5"></div>
        </div>
        </form>
    </div>

@endsection
