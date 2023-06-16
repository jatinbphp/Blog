@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-2" href="{{ route('category.create') }}"> Create New Category</a>
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
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @if(count($categories) == 0)
            <tr>
                <td colspan="3" class="text-center"> No category found.</td>
            </tr>
        @endif
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            
            <td>
                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('viewposts',$category->id) }}">View Posts</a>
    
                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $categories->links() !!}

@endsection
