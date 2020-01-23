
@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

    <!-- DataTables CSS -->
    <link href="{{asset('/')}}assets/backend/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('/')}}assets/backend/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')
   
    <div id="wrapper">

      <a class="btn btn-primary waves-effect" href="{{ route('admin.tag.create') }}">
                <i class=" glyphicon-plus"></i>
                <span>Add New Tag</span>
            </a>
    
          <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Tag Here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                   
                                    <tr class="odd gradeX">
                                        <td>{{$tag->name}}</td>
                                        <td>{{$tag->slug}}</td>
                                        <td>
                                             <a href="{{ route('admin.tag.edit',$tag->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $tag->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                            </table>
                          
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>  
        
        <!-- /#page-wrapper -->

    </div> 
@endsection

@push('js')
  

    <!-- DataTables JavaScript -->
    <script src="{{asset('/')}}assets/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/backend/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('/')}}assets/backend/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/')}}assets/backend/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
   
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush