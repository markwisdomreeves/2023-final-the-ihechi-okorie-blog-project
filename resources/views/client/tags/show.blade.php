@extends('client.layout.app')

@section('title', $tag->name . " | The IhechiOkorie's blog")

@section('main_content')

<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 posts-col">

                @forelse($all_posts_data as $post)

                    <div class="block-21 d-flex animate-box post">
                        <a 
                        href="{{ route('show_post_detail', $post) }}" 
                        class="blog-img" 
                        style="background-image: url({{ asset('storage/' . $post->image->path. '')  }});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{ route('show_post_detail', $post) }}">{{ $post->title }}</a></h3>
                            <p class="excerpt">{{ $post->excerpt }}</p>
                            <div class="meta">
                                <div><span class="icon-calendar"></span>  {{ $post->created_at->diffForHumans() }}</div>
                                <div><p><span class="icon-user2"></span> {{ $post->author->name }}</p></div>
                                <div class="comments-count">
                                    <a href="{{ route('show_post_detail', $post) }}#post-comments">
                                        <span class="icon-chat"></span> {{ $post->comments_count }}
                                    </a>
                                </div>
                                {{-- <div><span class="icon-user2"></span> {{ $category->user->name }}</div> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <p class='lead'>There are no posts related to this tag.</p>
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
