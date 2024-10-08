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
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        </h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" action="{{route('questions.update',['question'=>$question->id])}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="control-group">
                            <h4>Testni o'zgartirish oynasi</h4>
                            <input type="hidden" name="quiz_id" value="1">
                            <div class="control-group">
                                <label>Test savoli*</label>
                                <textarea  class="form-control"  rows="6" name="question"
                                          placeholder="Test savolini tushinarli va aniq qilib yozing"
                                          required="required"
                                          data-validation-required-message="Test savollarini kiriting!">{{$question->question}}</textarea>
                                <label>Kamida 40 ta belgi kiriting</label>
                                @error('question')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <br>
                            <div class="control-group">
                                <label>Savol bo'yicha rasm*</label>
                                <input type="file" class="form-control" id="subject" name="photo"/>
                                @error('photo')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <br>
                            <div>
                            <label>A*</label>
                            <input type="text" class="form-control" name="a" value="{{$question->a}}"
                                   required="required" data-validation-required-message="Please enter your name"/>
                            @error('a')
                            <p class="help-block text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <br>
                            <div>
                                <label>B*</label>
                                <input type="text" class="form-control" name="b" value="{{$question->b}}"
                                       required="required" data-validation-required-message="Please enter your name"/>
                                @error('b')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <br>
                            <div>
                                <label>C*</label>
                                <input type="text" class="form-control" name="c" value="{{$question->c}}"
                                       required="required" data-validation-required-message="Please enter your name"/>
                                @error('c')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <br>
                            <div>
                                <label>D*</label>
                                <input type="text" class="form-control" name="d" value="{{$question->d}}"
                                       required="required" data-validation-required-message="Please enter your name"/>
                                @error('d')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div> Javob:
                            <select name="ans" >
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-success py-2 px-4">Saqlash</button>
                            <a href="{{route('quizzes.show',['quiz'=>1])}}" class="btn btn-outline-danger py-2 px-4">Bekor qilish</a>
                        </div>
                        <div class="text-center"><a href="/">Bosh sahifaga qaytish</a></div>
                    </form>
                </div>
            </div>


@endsection
