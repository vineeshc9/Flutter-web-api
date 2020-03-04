@extends('layout')
@section('dashboard-content')
<main>
  <div class="container-fluid">
<h1 class="mt-4">Update Blog Post Form</h1>



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

<form action="{{URL:: to('store-blog-post')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleInputEmail1">Blog Title</label>
    <input type="text" name="blogTitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Blog Title">
    <small id="emailHelp" class="form-text text-muted">Insert a Category name.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Blog Details</label>
        <textarea  class="form-control" id="editor1" name="blogDetails"></textarea>
        <small id="emailHelp" class="form-text text-muted">Insert Blog Text.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Select Category</label>
            <select class="form-control" name="category">
                <option>Select Text</option>
                @foreach ($catagories as $category )
                    <option value="{{$category -> id}} "> {{$category -> name}}</option>
                    
                @endforeach
            </select>
            <small id="emailHelp" class="form-text text-muted">Select the Category.</small>
            </div>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Select Photo</label>
                <input type="file" name="featuredPhoto" class="form-control" onchange="loadPhoto(event);" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Upload Image">
                <small id="emailHelp" class="form-text text-muted">Upload Image.</small>
                </div>

                <div>

                    <img id="photo" height="100" width="100">
                </div>
                <br>
    
    <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</main>
    <script>
        function loadPhoto(event){
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('photo');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    
@endsection
