@extends("admin.layout.app")
		
    @section("main_content")

    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">View All Post Tags</div>
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tag#</th>
                                    <th>Tag Name</th>
                                    <th>Related Posts</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#P-{{ $tag->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $tag->name }} </td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href="{{ route('admin.tags.show', $tag) }}">Related Posts</a>
                                    </td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $tag->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
                                        
                                            <form method='post' action="{{ route('admin.tags.destroy', $tag) }}" id='delete_form_{{ $tag->id }}'>@csrf @method('DELETE')</form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class='mt-4'>
                    {{ $tags->links() }}
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