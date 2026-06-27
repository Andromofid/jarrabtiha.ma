@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="header-row">
        <div>
            <h2>Edit Category</h2>
            <p class="muted">Update category details and hierarchy.</p>
        </div>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.categories._form', ['submitLabel' => 'Update Category'])
    </form>
@endsection
