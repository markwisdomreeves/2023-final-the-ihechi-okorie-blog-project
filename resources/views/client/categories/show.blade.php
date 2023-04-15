@extends('client.layout.app')

@section('title', $category->name . " | The IhechiOkorie's blog")

@section('main_content')

<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 posts-col">

                @forelse($all_posts_data as $post)

                <div class="block-21 d-flex animate-box post" id="blog_post_small_screen_box">
                    <div class="blog-img">
                        <a href="{{ route('show_post_detail', $post) }}">
                          <img src="{{ asset('storage/' . $post->image->path. '') }}" alt="">
                        </a>
                    </div>
                    <div class="text">
                        <a href="{{ route('show_post_detail', $post) }}"><h3 class="heading">{{ \Str::limit($post->title,38) }}</h3></a>
                        <p class="excerpt">{{ \Str::limit($post->excerpt, 30) }}</p>
                        <div class="meta">
                            <div class="date"><span class="icon-calendar"></span> {{ $post->created_at->diffForHumans() }}</div>
                            <div><p><span class="icon-user2"></span> {{ \Str::limit($post->author->name, 15) }}</p></div>
                            <div class="comments-count">
                                <a href="{{ route('show_post_detail', $post) }}#post-comments">
                                    <span class="icon-chat"></span> 
                                    {{ $post->comments_count }}
                                </a>
                            </div>
                            <div><p><span class="icon-folder-open"></span> {{ \Str::limit($post->category->name, 15) }}</p></div>
                        </div>
                    </div>
                </div>

                @empty
                    <p class='lead'>There are no posts related to this category.</p>
                @endforelse
            
                {{ $all_posts_data->links() }}

            </div>

            {{-- Sidebar Section --}}
			<div class="col-md-4 animate-box global_sidebar_container">
				<div class="sidebar">

					{{-- Categories Sidebar section --}}
					<x-blog.side-categories :categories="$all_categories_data" />

					{{-- Recent Post Sidebar section --}}
					<x-blog.side-recent-posts :recentPosts="$all_recent_posts_data" />

					{{-- Post Tags Sidebar section --}}
					<x-blog.side-post-tags :tags="$all_tags_data" />
					
				</div>
			</div>

        </div>
    </div>
</div>

@endsection
