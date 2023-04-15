
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <link rel="icon" href="{{ asset('uploads/blog_favicon.png') }}" type="image/png" />
        </div>
        <div>
            <h4 class="logo-text">ADMIN</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.index') }}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">All Posts</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.posts.index') }}"><i class="bx bx-right-arrow-alt"></i>View All Posts</a>
                </li>
                <li> <a href="{{ route('admin.posts.create') }}"><i class="bx bx-right-arrow-alt"></i>Create New Post</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-menu'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.categories.index') }}"><i class="bx bx-right-arrow-alt"></i>All Categories</a>
                </li>
                <li> <a href="{{ route('admin.categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Create New Category</a>
                </li>
                
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.tags.index') }}">
            <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                <div class="menu-title">Tags</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-comment-dots'></i>
                </div>
                <div class="menu-title">Comments</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.comments.index') }}"><i class="bx bx-right-arrow-alt"></i>View All Comments</a>
                </li>
                <li> <a href="{{ route('admin.comments.create') }}"><i class="bx bx-right-arrow-alt"></i>Create New Comment</a>
                </li>
                
            </ul>
        </li>

        <hr>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-key'></i>
                </div>
                <div class="menu-title">Roles</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.roles.index') }}"><i class="bx bx-right-arrow-alt"></i>View All Roles</a>
                </li>
                <li> <a href="{{ route('admin.roles.create') }}"><i class="bx bx-right-arrow-alt"></i>Create New Role</a>
                </li>
            </ul>
        </li>    
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.users.index') }}"><i class="bx bx-right-arrow-alt"></i>View All Users</a>
                </li>
                <li> <a href="{{ route('admin.users.create') }}"><i class="bx bx-right-arrow-alt"></i>Create New User</a>
                </li>
            </ul>
        </li>    

        <hr>
        
        <li>
            <a target='_blank' href="{{ route('show_home_page') }}">
            <div class="parent-icon"><i class='bx bx-pointer'></i></div>
                <div class="menu-title">Visit Site</div>
            </a>
        </li>
    </ul>
</div>
