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

<div class="category-row">
    <h3>{{ $category->name }}</h3>
    <p class="muted">Parent Category</p>
    @if ($category->children->count())
    <ul>
        @foreach ($category->children as $childCategory)
        <li>{{ $childCategory->name }}</li>
        @endforeach
    </ul>
    @else
    <p class="muted">No subcategories.</p>
    @endif
</div>
@endsection