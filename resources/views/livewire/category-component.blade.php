<div class="dropdown category-dropdown">
    <a href="#" class="category-toggle text-white bg-primary text-capitalize" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
        data-display="static" title="Browse Categories">
        <i class="w-icon-category"></i>
        <span>Browse  Categories</span>
    </a>

    <div class="dropdown-box text-default">
        <ul class="menu vertical-menu category-menu">
            @foreach ($categories as $category)
                @if ($category->childs->count() > 0)
                <li>
                    <a href="/category/{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                    <ul class="megamenu">
                        @foreach ($category->childs as $subcat)
                            <li>
                                <ul>
                                    <li>
                                        <a href="/category/{{ $subcat->slug }}">
                                            {{ $subcat->name }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li>
                    <a href="/category/{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
