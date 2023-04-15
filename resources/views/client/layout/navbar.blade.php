<nav class="colorlib-nav" role="navigation">	
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="colorlib-logo"><a href="{{ route('show_home_page') }}">The IhechiOkorie's blog</a></div>
                </div>
                <div class="col-md-8 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('show_home_page') }}">Home</a></li>
                        <li class="has-dropdown">
                            <a href="{{ route('categories.index') }}">Categories</a>
                            <ul class="dropdown">
                    
                                @foreach ($navbar_categories_data as $category)
                                    <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <li><a href="{{ route('show_about_page') }}">About</a></li>
                        <li><a href="{{ route('show_contact_page') }}">Contact</a></li>
                        
                        @guest
                        <li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
                        @endguest

                        @auth
                        @if (auth()->user()->role_id === 2)
                        <li class="has-dropdown">
                            <a href="javascript:void(0);">{{ auth()->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="has-dropdown">
                            <a href="javascript:void(0);">{{ auth()->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>  
                        @endif

                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides"></ul>
      </div>
</aside>