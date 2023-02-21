@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Самые комментируемые товары</h2>
        <div class="row">
            <div class="col-3"><b>Id</b></div>
            <div class="col-3"><b>Название продукта</b></div>
            <div class="col-2"><b>Цена</b></div>
            <div class="col-3"><b>Количество отзывов</b></div>
            <div class="col-1"><b></b></div>
        </div>
        @foreach($products as $product)
            <div class="row">
                <div class="col-3">{{$product->id}}</div>
                <div class="col-3">{{$product->name}}</div>
                <div class="col-2">{{$product->price}}</div>
                <div class="col-3">{{$product->reviews_count}}</div>
                <div class="col-1"><b></b></div>
            </div>
        @endforeach
    </div>
@endsection
