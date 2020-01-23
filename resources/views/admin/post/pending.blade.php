
@extends('layouts.backend.app')

@section('title','Post')

@push('css')

<!-- DataTables CSS -->
<link href="{{asset('/')}}assets/backend/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{asset('/')}}assets/backend/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')

<div id="wrapper">

  <a class="btn btn-primary waves-effect" href="{{ route('admin.post.create') }}">
    <i class=" glyphicon-plus"></i>
    <span>Add New Post</span>
</a>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                ALL POSTS <span class="badge badge-primary">{{ $posts->count() }}</span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th><i class="fa fa-eye"></i></th>
                            <th>Is Approved</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach($posts as $key=>$post)
                     <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{!! Str::limit($post->title,'20') !!}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->view_count }}</td>
                        <td>
                            @if($post->is_approved == true)
                            <span class="btn btn-success">Approved</span>
                            @else
                            <span class="btn btn-danger">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($post->status == true)
                            <span class="btn btn-success">Published</span>
                            @else
                            <span class="badge btn-danger">Pending</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>

                        <td class="text-center">


                            @if ($post->is_approved==false)
                            <button class="btn btn-sm btn-success pull-right"  onclick="approvePost({{ $post->id }})"><i class="fa fa-check"></i>Approve</button>
                            <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>  

                            @endif

                            <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                               <i class="fa fa-eye"></i>
                           </a>
                           <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                            <i class=" fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                            <i class=" fa fa-trash-o"></i>
                        </button>
                        <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
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
    function deletePost(id) {
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
<script>
         function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
</script>
@endpush