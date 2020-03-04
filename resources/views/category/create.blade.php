@extends('layout')
@section('dashboard-content')
<main>
  <div class="container-fluid">
<h1 class="mt-4">Create Category Form</h1>

@if(Session::get('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('Success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('Failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('Failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<form action="{{URL:: to('post-category-form')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" name="categoryName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category name">
      <small id="emailHelp" class="form-text text-muted">Insert a Category name.</small>
    </div>
    
    
    <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</main>
    
@endsection
