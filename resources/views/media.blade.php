@extends('layouts.app')
@section('title','Home')
@section('content')
    <br>
    <center><h2>Growing Media</h2></center>
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
                    <form action="{{ url('/add-to-cart') }}" method="POST">
                    @csrf
                        <input type="hidden" name="product_name" value="{{ $arrProduct[$i] }}">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>
        @endfor
        </div>
    </div>
@endsection
