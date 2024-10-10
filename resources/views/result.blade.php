{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <h1>Test Natijalari</h1>

    <p>To'g'ri javoblar: {{ $result['correct'] }} / {{ $result['total'] }}</p>
    <p>Sarflangan vaqt: {{ $result['time_spent'] }} daqiqa</p>

    <a href="{{ route('startTest') }}">Testni qaytadan boshlash</a>
{{--@endsection--}}
