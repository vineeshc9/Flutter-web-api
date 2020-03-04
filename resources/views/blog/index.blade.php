@extends('layout')
@section('dashboard-content')


<main>
    <div class="container-fluid">
        <h1 class="mt-4">All Blog Post</h1>

        @if(Session::get('Deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('Deleted') }} </strong>
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
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Blog Post Table</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Blog Post</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Blog Post</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Actions</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($blogPosts as $blogPost )
                    <tr>
                        <td>{{$blogPost-> title}}</td>
                        <td>{{$blogPost-> details}}</td>
                        <td> <img src="{{$blogPost-> featured_image_url}}" width="100" height="100" alt=""></td>
                        <td>
                        <a href="{{URL::to('edit-blog-post')}}/{{$blogPost-> id}}" class="btn btn-primary btn-sm"> Edit </a> 

                        <a href="{{URL::to('delete-blog-post')}}/{{$blogPost -> id}}" onclick="checkDelete()" class="btn btn-danger btn-sm" > Delete </a>
                        </td>
                        
                    </tr>
                    
                @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</main>
<script>
    function checkDelete(){
        var check = confirm('Are you sure to Delete it?');
        if(check){
            return true;
        }
        return false;
    }
</script>
    
@endsection