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
                             ADD NEW TAG
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ route('admin.tag.store') }}" method="POST">
                                       @csrf
                                        <div class="form-group">
                                            <label>Tag Name</label>
                                            <input class="form-control" placeholder="Enter Tag" name="name">
                                        </div>

                                          <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>
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