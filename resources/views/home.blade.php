@extends('layouts.app')
@section('title','Home')
@section('content')
<br>
    <center><h2>Selamat Datang, @foreach ($users as $user){{ $user->name }}@endforeach</h2></center>
<br>
<div class="container-lg ">
    <div class="row mx-2 text-center justify-content-center">
        @for ($i = 0; $i < 3; $i++)
            <div class="col-md-6 col-lg-3 my-3">
                <a href="{{ $Link[$i] }}" style="color: black; text-decoration: none;">
                    <div class="p-3" style="background-color: #F8F9FA">
                        <img src="/img/{{ $Image[$i] }}.jpg" width="200px" alt="{{ $Product[$i] }}"><br>
                        <p>{{ $Product[$i] }}</p>
                    </div>
                </a>
            </div>
        @endfor
    </div>

</div>
@endsection
