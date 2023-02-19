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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <th scope="col">{{ $product->id }}</th>
                                        <td>{{ ucfirst($product->name) }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>
                                            <img src="{{ asset('storage'.'/'.$product->image) }}" width="100" alt="{{ $product->image }}">
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle more-vertical"
                                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="dropdown-item">Edit</a>
                                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
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
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div> <!-- / .col-md-3 -->
                    </div> <!-- end section -->
                </div>
            </div>
        </div>
    </main>
@endsection
