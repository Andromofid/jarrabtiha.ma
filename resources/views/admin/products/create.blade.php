@extends('admin.layout')

@section('title', 'Create Product')

@section('content')
    <div class="header-row">
        <div>
            <h2>Create Product</h2>
            <p class="muted">Add a new product to the catalog.</p>
        </div>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        @include('admin.products._form', ['submitLabel' => 'Create Product'])
    </form>
@endsection
