
@extends('layouts.backend.app')

@section('title','Seetings')

@push('css')

   

@endpush

@section('content')
   
    <div id="wrapper">

    <div class="panel panel-default">
                        <div class="panel-heading">
                            Seetings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Update Profile</a>
                                </li>
                              
                                <li><a href="#settings" data-toggle="tab">Update Password</a>
                                </li>

                                <li><a href="#image" data-toggle="tab">Image View</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                <h4>Profile Information</h4>
                                   <form role="form" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       @method('PUT')
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Enter Tag" name="name" value="{{ Auth::user()->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" placeholder="Enter Tag" name="email" value="{{ Auth::user()->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <input type="file" name="image">
                                        </div>

                                            <div class="form-group">
                                            <label>About</label>
                                             <textarea rows="5" name="about" class="form-control">{{ Auth::user()->about }}</textarea>
                                        </div>

                                         
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="settings">
                                    <h4>Password Change</h4>
                                  <form role="form" action="{{ route('admin.password.update') }}" method="POST">
                                       @csrf
                                       @method('PUT')
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input class="form-control" placeholder="Enter Old Password" name="old_password" type="password">
                                        </div>

                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" placeholder="Enter New Password" name="password" type="password">
                                        </div>

                                        <div class="form-group">
                                            <label> Confirm Password</label>
                                            <input class="form-control" placeholder="Enter New Password" name="password_confirmation" type="password">
                                        </div>

                                      

                                         
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                    </form>
                                </div>

                                {{-- image show part --}}
                                <div class="tab-pane fade" id="image">
                                    <h4>Full View Image</h4>
                                
                                     
                                        <div class="form-group">
                                            
                                            <img src="{{ asset('storage/profile/'.Auth::user()->image) }}" alt="">
                                        </div>
                           
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

    </div> 
@endsection

@push('js')
  
@endpush