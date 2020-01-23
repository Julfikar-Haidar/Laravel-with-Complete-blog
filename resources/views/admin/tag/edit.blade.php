@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush

@section('content')
<div id="wrapper">

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               EDIT TAG
           </div>
           <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" action="{{ route('admin.tag.update',$tag->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label>Text Input with Placeholder</label>
                        <input class="form-control" placeholder="Enter Tag" name="name" value="{{$tag->name}}">
                    </div>

                    
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                </form>
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

@push('script')

@endpush