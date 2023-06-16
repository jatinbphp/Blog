@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-2" href="{{ route('post.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @if(count($posts) == 0)
            <tr>
                <td colspan="4" class="text-center"> No post found.</td>
            </tr>
        @endif
        @foreach ($posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                     <a class="btn btn-info" href="{{ route('postDetail',$post->id) }}">Post Detail</a>
                    <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $posts->links() !!}

@endsection
