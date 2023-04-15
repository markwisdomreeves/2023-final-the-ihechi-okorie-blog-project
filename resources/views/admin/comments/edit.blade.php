
@extends("admin.layout.app")

@section("style")

<link href="{{ asset('admin_dist/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dist/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

@endsection
    
    @section("main_content")

    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Edit Comments</div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Comment</h5>
                    <hr/>
                    <form action="{{ route('admin.comments.update', $comment) }}" method='post'>
                        @csrf
                        @method('PATCH')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Related Post</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="rounded">
                                                        <div class="mb-3">
                                                            <select required name='post_id' class="single-select">
                                                                @foreach($posts as $key => $post)
                                                                   <option {{ $comment->post_id === $key ? 'selected' : '' }} value="{{ $key }}">{{ $post }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('post_id')
                                                                <p class='text-danger'>{{ $message }}</p>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Comment</label>
                                            <textarea name='comment' id='post_comment' class="form-control" id="inputProductDescription" rows="3">{{ old("comment", $comment->comment) }}</textarea>
                                            @error('comment')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button class='btn btn-primary' type='submit'>Update Comment</button>
                                        <a 
                                        class='btn btn-danger'
                                        onclick="event.preventDefault(); document.getElementById('comment_delete_form_{{ $comment->id }}').submit()"
                                        href="#">Delete Comment</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form id='comment_delete_form_{{ $comment->id }}' method='post' action="{{ route('admin.comments.destroy', $comment) }}">@csrf @method('DELETE')</form>

                </div>
            </div>
        </div>
    </div>
   
@endsection

@section("script")
<script src="{{ asset('admin_dist/plugins/select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function () {
        

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });

</script>
@endsection