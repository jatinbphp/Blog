@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"  onclick="window.history.back();" href="javascript:void(0);"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('post.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control"  value="{{ $post->title }}" placeholder="Enter Post Title">
                </div>
            </div>
       </div>
       <div class="row mt-2">
            <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea type="text" name="content" class="form-control" placeholder="Enter Post Content"  id="ckContentEditor">{{ $post->content }}</textarea>
                </div>
            </div>
       </div>
       <div class="row mt-2">
            <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if( $post->category_id == $category->id) selected @endif >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
       </div>
        <div class="row mt-2">
            <div class="col-xs-6 col-sm-6 col-md-6 text-center m-auto">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("ckContentEditor");
    </script>
@endsection