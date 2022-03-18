@extends('layouts.app')
@section('title','Keranjang')
@section('content')
<br>
    <center><h2>Keranjang</h2></center>
<br>
<div class="ms-5 me-5">
    @foreach ($product as $value)
    <div class="d-grid gap-3">
        <div class="p-3 bg-light border">{{ $value }}</div>
    </div>
    @endforeach
</div>
@endsection