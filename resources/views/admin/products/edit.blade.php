@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="header-row">
        <div>
            <h2>Edit Product</h2>
            <p class="muted">Update catalog information and visibility.</p>
        </div>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.products._form', ['submitLabel' => 'Update Product'])
    </form>
@endsection
