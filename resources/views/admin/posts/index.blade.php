@extends('layouts.admin')

@section('content')
<div class="container">

    @if ( session( 'popUp' ) )    
        <div class="alert alert-success" role="alert">
            {{ session( 'popUp' ) }}
        </div>
    @endif

    <h1>Rotta INDEX della CRUD </h1>
    
    <a class="btn btn-outline-dark  mb-4 mt-3" href="{{ route('admin.posts.create') }}">Crea nuovo post</a>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($posts as $item)
                <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->title}}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.posts.show', $item) }}">SHOW</a>
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $item) }}">EDIT</a>
                        <form class=" d-inline" 
                            action="{{ route('admin.posts.destroy', $item) }}"
                            method="POST"
                            onsubmit="return confirm('Confermi l\eliminazione di: {{ $item->title }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DESTROY</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $posts->links() }}
      
</div>
@endsection
