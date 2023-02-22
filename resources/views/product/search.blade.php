@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Поиск</h2>
        <form>
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="search">Поиск</label>
                    <input
                        type="text"
                        class="form-control"
                        id="search"
                        name="search"
                        placeholder="Поиск"
                        value="{{app('request')->input('search')}}"
                    >
                    @error('search')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-3"><b>Id</b></div>
            <div class="col-3"><b>Название продукта</b></div>
            <div class="col-3"><b>Название раздела</b></div>
            <div class="col-1"><b></b></div>
            @foreach($products as $product)
                <div class="col-3">{{$product->id}}</div>
                <div class="col-3"><a href="{{ URL::route('productEdit', ['id' => $product->id]) }}">{{$product->name}}</a></div>
                <div class="col-3">{{$product->section->name}}</div>
                <div class="col-1">
                </div>
            @endforeach
        </div>
    </div>
@endsection
