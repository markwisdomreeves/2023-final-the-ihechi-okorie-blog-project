
@extends("admin.layout.app")

@section("style")

<link href="{{ asset('admin_dist/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dist/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

@endsection
    
@section("main_content")

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Edit User: {{ $user->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit User</h5>
                <hr/>
                <form action="{{ route('admin.users.update', $user) }}" method='post' enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3">
                                        <label for="input_name" class="form-label">Name</label>
                                        <input name='name' type='text' class="form-control" id="input_name" value='{{ old("name", $user->name) }}'>
                                    
                                        @error('name')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="input_email" class="form-label">Email</label>
                                        <input name='email' type='email' class="form-control" id="input_email" value='{{ old("email", $user->email) }}'>
                                    
                                        @error('email')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="input_password" class="form-label">Password</label>
                                        <input name='password' type='password' class="form-control" id="input_password">
                                    
                                        @error('password')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-8'>
                                            <div class="mb-3">
                                                <label for="input_image" class="form-label">Image</label>
                                                <input name='image' type='file' class="form-control" id="input_image">
                                            
                                                @error('image')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='user-image'>
                                                
                                                <img width='50' src="{{ $user->image ? asset('storage/' . $user->image->path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png?w=826&t=st=1678468875~exp=1678469475~hmac=3ae623ab5e99ab73da256f397dda24d306ff6c8206b213984808de911a6ee069' }}" style="width: 100%; height: 100%; margin-bottom: 20px;" alt="user avatar">    
                                                
                                                <!--<img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image->path) : asset('https://cdn-icons-png.flaticon.com/512/149/149071.png?w=826&t=st=1678468875~exp=1678469475~hmac=3ae623ab5e99ab73da256f397dda24d306ff6c8206b213984808de911a6ee069') }}" style="width: 100%; height: 100%; margin-bottom: 20px;" alt="user avatar">-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">User Role</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="rounded">
                                                    <div class="mb-3">
                                                        <select required name='role_id' class="single-select">
                                                            @foreach($roles as $key => $role)
                                                            <option {{ $user->role_id === $key ? 'selected' : '' }} value="{{ $key }}">{{ $role }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('role_id')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class='btn btn-primary' type='submit'>Update User</button>

                                    <a 
                                    onclick='event.preventDefault(); document.getElementById("delete_user_{{ $user->id }}").submit()'
                                    href="#"
                                    class='btn btn-danger'>
                                        Delete User
                                    </a>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
                <form id='delete_user_{{ $user->id }}' action="{{ route('admin.users.destroy', $user) }}" method='POST'>@csrf @method('DELETE')</form>
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