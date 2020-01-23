@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush

@section('content')
<div id="wrapper">

   <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             ADD NEW POST
         </div>
         <div class="panel-body">
            <div class="row">
                <form role="form" action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="col-lg-8">

                    <div class="form-group">
                        <label>Post title</label>
                        <input class="form-control" placeholder="Enter title" name="title">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                        <label for="publish">Publish</label>
                    </div>

                    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('author.post.index') }}">BACK</a>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                </div> 
                <div class="col-lg-4">
                   <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                    <label for="category">Select Category</label>
                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                    <label for="tag">Select Tags</label>
                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-lg-12">
                <br><br>
                <textarea id="summernote" name="body"></textarea>
            </div>

        </form>
    </div>
    <!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>




</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
@endpush