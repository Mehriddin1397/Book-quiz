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
                <form action="{{ route('saveResults') }}" method="POST">
                    @csrf
                    <label>Tog'ri javob: <small>{{ \Illuminate\Support\Facades\Session::get('correctans') }}</small></label> <br>
                    <label>Notog'ri javob: <small>{{ \Illuminate\Support\Facades\Session::get('wrongans') }}</small></label><br>
                    <label>Umumiy: <small>{{ \Illuminate\Support\Facades\Session::get('correctans') }}/{{ \Illuminate\Support\Facades\Session::get('correctans') + \Illuminate\Support\Facades\Session::get('wrongans') }}</small></label> <br>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-left: 7%">Testni Tugatish</button>
                </form>

            </div>

            <div class="col-md-3">
            </div>

        </div>
    </div>


@endsection
