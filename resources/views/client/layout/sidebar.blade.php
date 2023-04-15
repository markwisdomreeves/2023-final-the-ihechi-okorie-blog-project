<div class="col-md-4 animate-box global_sidebar_container">
    <div class="sidebar">
        <div class="side">
            <h3 class="sidebar-heading">Categories</h3>
            <div class="block-24">
                {{-- <ul>
                    @if($all_categories->count() > 1)
                        @foreach ($all_categories as $post_category)
                            <li>
                                <a href="#">{{ $post_category->name }} 
                                  <span>{{ $post_category->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <div class="no_post_category_found_box">
                            <h3>There is no category to show</h3>
                        </div>
                    @endif
                </ul>
            </div> --}}
        </div>
        <div class="side">
            <h3 class="sidebar-heading">Recent Posts</h3>

            {{-- @if ($all_recent_posts->count() > 1)
                @foreach ($all_recent_posts as $recent_post)
                    <div class="f-blog">
                        <a href="{{ route('post.show', $recent_post) }}" class="blog-img" style="background-image: url({{ asset('storage/' . $recent_post->image->path. '') }});">
                        </a>
                        <div class="desc">
                            <p class="admin"><span>{{ $recent_post->created_at->diffForHumans() }}</span></p>
                            <h2>
                                <a href="{{ route('post.show', $recent_post) }}">
                                    {{ \Str::limit($recent_post->title, 20) }}
                                </a>
                            </h2>
                            <p>{{ \Str::limit($recent_post->excerpt, 20) }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no_recent_post_found_box">
                    <h3>There is no recent post to show</h3>
                </div>
            @endif --}}

        </div>
        <div class="side">
            <h3 class="sidbar-heading">Tags</h3>
            <div class="block-26">
           <ul>
                {{-- @if ($all_tags->count() > 1)
                    @foreach ($all_tags as $post_tag)
                       <li><a href="#">{{ $post_tag->name }}</a></li>
                    @endforeach
                @else
                    <div class="no_post_tags_found_box">
                        <h3>There is no post tag to show</h3>
                    </div>
                @endif --}}
            </ul>
        </div>
        </div>
    </div>
</div>
