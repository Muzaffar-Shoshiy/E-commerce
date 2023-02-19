<form method="get" action="{{ route('search') }}" class="input-wrapper header-search hs-expanded hs-round bg-white br-xs d-md-flex">
    <div class="select-box bg-white">
        <select id="category">
            <option value="0" selected>All Categories</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
            @endforeach
        </select>
    </div>
    <input type="text" class="form-control bg-white" name="query" id="search" placeholder="Search in..." value="{{ $query }}" required />
    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i></button>
</form>
