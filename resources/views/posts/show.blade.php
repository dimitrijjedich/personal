@extends('layouts.master')

@section('content')
    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                Show Post
                <a class="btn btn-success" href="{{route('posts.create')}}">Create</a>
                <a class="btn btn-warning" href="">Trashed</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img width="300" src="{{ asset('storage/'.$post->image) }}" alt="Post Image"></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $post->description }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $post->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Publish Date</td>
                            <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
