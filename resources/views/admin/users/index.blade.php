@extends("admin.layout.app")
		
    @section("main_content")

    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">View All Users</div>
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="ms-auto"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Create New Category</a></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>User#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Related Posts</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#U-{{ $user->id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img width='50' src="{{ $user->image ? asset('storage/' . $user->image->path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png?w=826&t=st=1678468875~exp=1678469475~hmac=3ae623ab5e99ab73da256f397dda24d306ff6c8206b213984808de911a6ee069' }}" alt="">    
                                    </td>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href="{{ route('admin.users.show', $user) }}">Related Posts</a>
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('admin.users.edit', $user) }}" class=""><i class='bx bxs-edit'></i></a>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $user->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
                                        
                                            <form method='post' action="{{ route('admin.users.destroy', $user) }}" id='delete_form_{{ $user->id }}'>@csrf @method('DELETE')</form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class='mt-4'>
                    {{ $users->links() }}
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