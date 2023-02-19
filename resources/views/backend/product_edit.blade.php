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
                        <h6 class="mb-3">Update Product - {{ ucfirst($product->name) }}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="qty">Quantity</label>
                                        <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity" value="{{ $product->qty }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" name="image" class="form-control">
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
