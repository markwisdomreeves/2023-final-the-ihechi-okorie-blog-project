
@props(['tags'])

<div class="side">
    <h3 class="sidbar-heading">Tags</h3>
    <div class="block-26">
        <ul>
            @if ($tags->count() >= 1)
                @foreach ($tags as $tag)
                   <li><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></li>
                @endforeach
            @else
                <div class="no_post_tags_found_box">
                    <h3>There is no post tag to show</h3>
                </div>
            @endif
        </ul>
    </div>
</div>