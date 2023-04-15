
@props(['categories'])

<div class="side">
    <h3 class="sidebar-heading">Categories</h3>
    <div class="block-24">
        <ul>
            @if($categories->count() >= 1)
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category) }}">{{ $category->name }} 
                          <span>{{ $category->posts_count }}</span>
                        </a>
                    </li>
                @endforeach
            @else
                <div class="no_post_category_found_box">
                    <h3>There is no category to show</h3>
                </div>
            @endif
        </ul>
    </div>
</div>