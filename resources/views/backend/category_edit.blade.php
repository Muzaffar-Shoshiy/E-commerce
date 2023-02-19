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
                        <h6 class="mb-3">Update Category - {{ ucfirst($category->name) }}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- / .col-md-3 -->
                </div> <!-- end section -->
            </div>
        </div>
    </div>
</main>
@endsection
