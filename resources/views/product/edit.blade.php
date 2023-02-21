@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Детальная карточки продуктов</h2>
        <ul class="list-group mb-5">
            <li class="list-group-item">{{$product->id}}</li>
            <li class="list-group-item">{{$product->name}}</li>
            <li class="list-group-item">{{$product->price}}</li>
        </ul>

        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif

        <form enctype="multipart/form-data" action="{{route('reviewStore', ['productId' => $product->id])}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" id="comment" rows="3" name="comment">{{old('comment')}}</textarea>
                @error('comment')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="images">Изображения</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                @error('images')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" />
        </form>
    </div>
@endsection

