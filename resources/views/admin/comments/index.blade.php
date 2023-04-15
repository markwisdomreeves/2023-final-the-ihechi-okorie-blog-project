@extends("admin.layout.app")
		
@section("main_content")

<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Post Comments</div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="ms-auto"><a href="{{ route('admin.comments.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Comment</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Comment#</th>
                                <th>Comment Author</th>
                                <th>Comment Body</th>
                                <th>View Comment</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-{{ $comment->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $comment->user->name }} </td>
                                <td>{{ \Str::limit($comment->comment, 40) }} </td>
                                <td>
                                    <a target='_blank' class='btn btn-primary btn-sm' href="{{ route('show_post_detail', $comment->post->slug) }}#comment_{{ $comment->id }}">View Comment</a>
                                </td>
                                <td>{{ $comment->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.comments.edit', $comment) }}" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $comment->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
                                        <form method='post' action="{{ route('admin.comments.destroy', $comment) }}" id='delete_form_{{ $comment->id }}'>@csrf @method('DELETE')</form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class='mt-4'>
                {{ $comments->links() }}
                </div>
                
            </div>
        </div>

    </div>
</div>
@endsection
	
@section("script")
<script>
    $(document).ready(function () {
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
    });
</script>
@endsection