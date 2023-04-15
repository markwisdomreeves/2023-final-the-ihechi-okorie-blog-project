
@props(['recentPosts'])

<div class="side">
    <h3 class="sidebar-heading">Recent Posts</h3>
    @if ($recentPosts->count() >= 1)
        @foreach ($recentPosts as $recent_post)
            <div class="f-blog">
                <a href="{{ route('show_post_detail', $recent_post) }}" class="blog-img" style="background-image: url({{ asset('storage/' . $recent_post->image->path. '') }});">
                </a>
                <div class="desc">
                    <p class="admin"><span>{{ $recent_post->created_at->diffForHumans() }}</span></p>
                    <h2>
                        <a href="{{ route('show_post_detail', $recent_post) }}">
                            {{ \Str::limit($recent_post->title, 25) }}
                        </a>
                    </h2>
                </div>
            </div>
        @endforeach
    @else
        <div class="no_recent_post_found_box">
            <h3>There is no recent post to show</h3>
        </div>
    @endif
</div>