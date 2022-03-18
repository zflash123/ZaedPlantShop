@extends('layouts.app')
@section('title','Home')
@section('content')
    <br>
    <center><h2>Media Tanam</h2></center>    
    <br>
    <div class="container-lg">
        <div class="row mx-2 text-center justify-content-center">
            @for ($i = 0; $i < 3; $i++)
            <div class="col-md-6 col-lg-3 my-3">
                <div class="p-3" style="background-color: #F8F9FA">
                    <a href="/order" style="color: black; text-decoration: none;">
                    <img src="{{ $Gambar[$i] }}" width="200px" alt="{{ $Barang[$i] }}"><br>
                    </a>
                    <p>{{ $Barang[$i] }}</p>
                    <button type="button" class="btn btn-primary" onclick="{{ $product[2] = $Barang[$i] }}">Add to cart</button>
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection