@extends('layouts.admin')

@section('content')

<div class="container ">
    <h1 class="">Rotta SHOW della CRUD </h1>
    <a href="{{ route('admin.posts.index') }}">&#60&#60 Go back</a>

    <div class="div">
        <a class="btn btn-warning mt-3 mb-5" href="{{ route('admin.posts.edit', $item) }}">EDIT</a>
    </div>

    <div class="d-flex justify-content-center my-5">
        <div class="text-center p-3" style="background-color: rgb(150, 204, 252); width:50%;">
            <h3 class="mb-5" style="text-decoration: underline">{{ $item->title}}</h3>
            <p>{{ $item->content }}</p>
        </div>
    </div>

    <form class=" d-inline d-flex justify-content-center" 
            action="{{ route('admin.posts.destroy', $item) }}"
            method="POST"
            onsubmit="return confirm('Confermi l\eliminazione di: {{ $item->title }}')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DESTROY</button>
    </form>
</div>
@endsection
