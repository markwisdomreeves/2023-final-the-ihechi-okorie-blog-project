@extends("admin.layout.app")
		
    @section("main_content")

    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $user->name }}'s Posts</div>
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="ms-auto"><a href="{{ route('admin.posts.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Post</a></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Post#</th>
                                    <th>Post Title</th>
                                    <th>Post Excerpt</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->posts as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#P-{{ $post->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ \Str::limit($post->title, 10) }}</td>
                                    <td>{{ \Str::limit($post->excerpt, 15) }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="badge rounded-pill @if($post->status === 'published') {{ 'text-info bg-light-info' }} @elseif($post->status === 'draft') {{ 'text-warning bg-light-warning' }} @else {{ 'text-danger bg-light-danger' }} @endif p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>{{ $post->status }}</div>
                                    </td>
                                    <td>{{ $post->views }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.posts.edit', $post) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $post->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
                                            <form method='post' action="{{ route('admin.posts.destroy', $post) }}" id='delete_form_{{ $post->id }}'>@csrf @method('DELETE')</form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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