@extends('layouts.app')
@section('title','Keranjang')
@section('content')

<div class="mt-2 mb-1">
    <br>
        <center><h2>Keranjang</h2></center>
    <br>
</div>

<div class="container mb-5">
    <div class="ms-5 me-5">
        @foreach ($product as $value)
        <div class="d-grid gap-3">
            <div class="p-3 bg-light border">{{ $value }}</div>
        </div>
        @endforeach
    </div>
</div>
@endsection
