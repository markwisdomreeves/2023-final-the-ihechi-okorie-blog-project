@extends('client.layout.app')

@section('title', $post->title . " | Blog Detail")

@section('custom_css')
	<style>
		.class-single .desc img {
			width: 100%;
		}
	</style>
@endsection

@section('main_content')

<div class="colorlib-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
                <div class="row row-pb-lg">
                    <div class="col-md-12 animate-box">
                        <div class="classes class-single">
                            <div class="classes-img" style="background-image: url({{ $post->image ? asset('/storage/' . $post->image->path) : asset('https://placehold.co/600x400') }});">
                            </div>
                            <div class="desc desc2">
                                <h3 class="heading" style="margin-top: 20px;">{{ $post->title }}</h3>
                               <div class="blog_detail_text_box">
                                  {!! $post->description !!}
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-pb-lg animate-box">
                    <div class="col-md-12">
                        <h2 class="colorlib-heading-2">{{ count($post->comments) }} Comments</h2>
                        @foreach($post->comments as $comment)
                        <div id="comment_{{ $comment->id }}" class="review">
                               <div 
                               class="user-img" 
                               style="background-image: url({{ $comment->user->image ? asset('storage/app/public/' . $comment->user->image->path. '') : 'https://cdn-icons-png.flaticon.com/512/149/149071.png?w=826&t=st=1678468875~exp=1678469475~hmac=3ae623ab5e99ab73da256f397dda24d306ff6c8206b213984808de911a6ee069' }});"></div>
                               <div class="desc">
                                   <h4>
                                       <span class="text-left">{{ $comment->user->name }}</span>
                                       <span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
                                   </h4>
                                   <p>{{ $comment->comment }}</p>
                               </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        
                <div class="row animate-box">
                    <div class="col-md-12">

                        {{-- <x-blog.message :status="'success'"/> --}}

                        <h2 class="colorlib-heading-2">Have something to Say?</h2>

                        @auth
                        <form method="POST" action="{{ route('create_post_comment', $post) }}">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Say something about us" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Comment" class="btn btn-primary">
                            </div>
                        </form>
                        @endauth

                        @guest
                        <p class="lead custom_login_and_register_text"><a href="{{ route('login') }}">Login </a> / <a href="{{ route('register') }}">Register</a> to comment.</p>
                        @endguest	
                    </div>
                </div>
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


@section('custom_js')
<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000);
</script>
@endsection
