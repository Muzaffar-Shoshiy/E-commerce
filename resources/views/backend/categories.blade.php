@extends('backend.layouts.app')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Recent orders -->
                        <div class="col-md-12">
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                <strong class="text-success">{{ Session::get('success') }}</strong>
                            </div>
                            @endif
                            <h6 class="mb-3">Last orders</h6>
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Category name</th>
                                        <th>Category slug</th>
                                        <th>Parent ID</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <th scope="col">{{ $category->id }}</th>
                                        <td>{{ ucfirst($category->name) }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent_id }}</td>
                                        <td><img src="{{ asset('storage'.'/'.$category->image) }}" width="100px" alt="{{ asset('storage'.'/'.$category->image) }}"></td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle more-vertical"
                                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="{{ route('categories.edit', ['category' => $category->id]) }}" method="GET">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Edit</button>
                                                    </form>
                                                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"  type="submit">Remove</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </div> <!-- / .col-md-3 -->
                    </div> <!-- end section -->
                </div>
            </div>
        </div>
    </main>
@endsection
