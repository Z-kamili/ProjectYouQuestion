@extends('layouts.app')
@section('content')
<div class="container">
    <div class="my-3">
        <h4>{{ $posts->count()}} Post(s)</h4>
        </div>
        <ul class="list-group">
            @if($count != 0)
            @foreach ($posts as $post)
            <li class="list-group-item">
            <h2><a href="#">{{$post->titre}}</a>  </h2>
          <p>  {!!substr(($post->Description), 0, 20).'...'!!} </p>
            <em>{{$post->created_at}}</em>
               <p class="text-muted">
                   {{$post->updated_at}}
               </p>
                <a class="btn btn-warning" href="{{route('Profils.edit',[$post->id])}}">Edit</a>
                <form style="display:inline"  method="Post" action="{{ route('Profils.destroy',[$post->id])}}">
                    {{-- token --}}
                    @csrf 
                    @method('DELETE')
                    {{-- /token --}}
                <button class="btn btn-danger" type="submit">Delete</button>
                    {{-- <button type="submit">Add post</button> --}}
                </form>
            </li>
            @endforeach
            @else 
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Resulta
                        </div>
                        <div class="card-body">
                            @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{session('status')}}
                            </div>
                            @endif
                            Aucun Question
                        </div>
                    </div>
                </div>
        
            </div>
            @endif
        </ul>
        <li>{{$posts->links()}}</li>
</div>

@endsection