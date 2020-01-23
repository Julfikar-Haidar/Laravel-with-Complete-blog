@extends('layouts.backend.app')

@section('title','category')

@push('css')

@endpush

@section('content')
<div id="wrapper">

       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             ADD NEW CATEGORY
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" placeholder="Enter Category" name="name">
                                        </div>
                                          <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>

                                          <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
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