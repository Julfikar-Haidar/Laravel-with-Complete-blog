@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endpush

@section('content')



<div id="wrapper">

 <div class="row">

    <div class="col-lg-12">
        <br>
    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('author.post.index') }}">BACK</a>
    <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                VIEW DETAILS
                
           </div>
           <div class="panel-body">
            <div class="row">

               <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{$post->title}}

                    </div>
                    <div class="panel-body">

                        {!! $post->body !!}
                    </div>
                    <div class="panel-footer">
                        <small>Posted By <strong> <a href="#" style="color: #000;">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        Category Panel
                    </div>
                    <div class="panel-body">
                         @foreach($post->categories as $category)
                              {{ $category->name }} <br>
                            @endforeach
                    </div>
                    <div class="panel-footer">
                        Panel Footer
                    </div>
                </div>
                <!-- /.col-lg-4 -->

                <div class="panel panel-red">
                    <div class="panel-heading">
                        Tag Panel
                    </div>
                    <div class="panel-body">
                         @foreach($post->tags as $tag)
                              {{ $tag->name }} <br>
                            @endforeach
                    </div>
                    <div class="panel-footer">
                        Panel Footer
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Image Panel
                    </div>
                    <div class="panel-body">
                       <img class="img-responsive thumbnail" src="{{ asset('storage/post/'.$post->image) }}" alt="">
                    </div>
                    <div class="panel-footer">
                        Panel Footer
                    </div>
                </div>
                

            </div>


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