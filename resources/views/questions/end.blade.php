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
    <div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-4">
                <label>Correct: <small> 8 </small></label>
                <label>Incorrect: <small> 2 </small></label>
                <label>Result: <small> 8/10 </small></label> <br>
                <a href="/"><button class="btn btn-primary" style="margin-left: 15%">Testni Tugatish</button></a>
                <br>
                <br>
            </div>

            <div class="col-md-3">
            </div>

        </div>
    </div>


@endsection
