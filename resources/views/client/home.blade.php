@extends('client.layout.app')

@section('title', "The IhechiOkorie's blog | Home")

@section('main_content')

<div class="colorlib-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-8 posts-col">

				@if ($all_posts_data->count() >= 1)
					@foreach ($all_posts_data as $post)
						<div class="block-21 d-flex animate-box post" id="blog_post_small_screen_box">
							<div class="blog-img">
								<a href="{{ route('show_post_detail', $post) }}">
								  <img alt="post_image" src="{{ $post->image ? asset('storage/' . $post->image->path) : asset('https://placehold.co/600x400') }}" >
								</a>
							</div>
							<div class="text">
								<a href="{{ route('show_post_detail', $post) }}"><h3 class="heading">{{ \Str::limit($post->title,34) }}</h3></a>
								<p class="excerpt">{{ \Str::limit($post->excerpt, 34) }}</p>
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
					@endforeach

					{{ $all_posts_data->links() }}
				@else
				<div class="no_blog_post_found_box">
					<h3>There is no post to show</h3>
				</div>
				@endif	
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
