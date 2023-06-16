@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" onclick="window.history.back();" href="javascript:void(0);"> Back</a>
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
  
    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             <div class="col-xs-6 col-sm-6 col-md-6 m-auto">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
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
