@extends('layouts.admin')

@section('content')

<div class="container ">
    <h1 class="">Rotta EDIT della CRUD </h1>
    <a href="{{ route('admin.posts.index') }}">&#60&#60 Go back</a>

    <h2 class="mt-5 mb-3 text-center">Modifica di <strong>{{ $item->title }}</strong></h2>
    <div class="justify-content-center d-flex">

        @if ($errors -> any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.posts.update', $item) }}" method="POST" class="my-5 w-50">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">
                    <strong>Titolo</strong>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}" placeholder="Inserisci il titolo"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <p class="text-danger" id="error-title"></p>
            </div>
            <div class="mb-3">
                <label  class="form-label" for="content">
                    <strong>Testo</strong>
                </label>
                <textarea name="content"  id="content" placeholder="Scrivi il contenuto" rows="10"
                    class="form-control @error('content') is-invalid @enderror"
                    > {{ old('content', $item->content) }} </textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        

    </div>
</div>
@endsection
