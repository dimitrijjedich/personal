@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                All Posts
                <a class="btn btn-success" href="{{route('posts.create')}}">Create</a>
                <a class="btn btn-warning" href="">Trashed</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%">Image</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 10%">Category</th>
                        <th scope="col" style="width: 10%">Publish Date</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td><img src="{{asset('storage/'.$post->image)}}" alt="" width="80"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a class="btn-sm btn-success" href="{{route('posts.show', $post->id)}}">Show</a>
                            <a class="btn-sm btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
