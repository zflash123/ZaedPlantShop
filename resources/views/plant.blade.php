@extends('layouts.app')
@section('title','Plants')
@section('content')
    <br>
    <center><h2>Plants</h2></center>
    <br>
    <div class="container-lg">
        <div class="row mx-2 text-center justify-content-center">
        @for ($i=0; $i<sizeOf($arrProduct); $i++)
            <div class="col-md-6 col-lg-3 my-3">
                <div class="p-3" style="background-color: #F8F9FA">
                    <a href="/order" style="color: black; text-decoration: none;">
                    <img src="/img/{{ $Image[$i] }}.jpg" width="200px" alt="{{ $arrProduct[$i] }}"><br>
                    </a>
                    <p>{{ $arrProduct[$i] }}</p>
                    <button type="button" class="btn btn-primary">Add to cart</button>
                </div>
            </div>
        @endfor
        </div>
    </div>
@endsection
