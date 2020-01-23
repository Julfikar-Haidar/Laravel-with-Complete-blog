
@extends('layouts.backend.app')

@section('title','Comments')

@push('css')

<!-- DataTables CSS -->
<link href="{{asset('/')}}assets/backend/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{asset('/')}}assets/backend/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')

<div id="wrapper">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ALL Comments <span class="badge badge-primary">{{ $comments->count() }}</span>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                         <tr>
                                    <th class="text-center">Comments Info</th>
                                    <th class="text-center">Post Info</th>
                                    <th class="text-center">Action</th>
                                </tr>
                     </thead>
                     <tbody>

                          @foreach($comments as $key=>$comment)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="{{ asset('storage/profile/'.$comment->user->image) }}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small>
                                                        </h4>
                                                        <p>{{ $comment->comment }}</p>
                                                        <a target="_blank" href="{{ route('post.details',$comment->post->slug.'#comments') }}">Reply</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                            <img class="media-object" src="{{ asset('storage/post/'.$comment->post->image) }}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a style="color:#000;" target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                            <h4 class="media-heading">{{ Str::limit($comment->post->title,'40') }}</h4>
                                                        </a>
                                                        <p>by <strong>{{ $comment->post->user->name }}</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect" onclick="deleteComment({{ $comment->id }})">
                                                     <i class=" fa fa-trash-o"></i>
                                                </button>
                                                <form id="delete-form-{{ $comment->id }}" method="POST" action="{{ route('admin.comment.destroy',$comment->id) }}" style="display: none;">
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
        function deleteComment(id) {
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