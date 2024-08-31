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
        <div class="row" style="padding-top: 10vh;">
                <div class="col" style="margin-left: 20vh">
                    <h4> 1. Ot so'z turkumini toping ?</h4> <br>
                    <img src="img/image.svg" alt="image"><br>
                    <input checked="true" name="ans" type="radio"> A <small> Bino</small> <br>
                    <input name="ans" type="radio"> B <small> Yashil</small> <br>
                    <input name="ans" type="radio"> C <small> Keng</small> <br>
                    <input name="ans" type="radio"> D <small> Yumshoq</small> <br>
                    <input value="" style="visibility: hidden" name="dbans">
                </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <a href="#"><button class="btn btn-primary"> Next</button></a>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>

@endsection
