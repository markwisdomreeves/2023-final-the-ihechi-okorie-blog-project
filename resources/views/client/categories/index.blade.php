@extends('client.layout.app')

@section('title', "Categories | The IhechiOkorie's blog")

@section('main_content')

<div class="colorlib-blog" id="custom_category_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 categories-col">

                <div class='row'>
                    @forelse($categories as $category)
                        <div class='col-md-4'>
                            <div class="block-21 d-flex animate-box post" id="custom_category_items_box">
                                <div class="text">
                                    <h3 class="category_heading"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></h3>
                                    <div class="meta">
                                        <div><span class="icon-calendar"></span> {{ $category->created_at->diffForHumans() }}</div>
                                        <div><span class="icon-user2"></span> {{ $category->user->name }}</div>
                                        <div class="posts-count">
                                            <a href="{{ route('categories.show', $category) }}">
                                                <span>tags</span> {{ $category->posts_count }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p class='lead'>There are no categories to show.</p>
                    @endforelse
                </div>

                {{ $categories->links() }}

            </div>
        </div>
    </div>
</div>

@endsection


