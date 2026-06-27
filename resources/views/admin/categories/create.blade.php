@extends('admin.layout')

@section('title', 'Create Category')

@section('content')
    <div class="header-row">
        <div>
            <h2>Create Category</h2>
            <p class="muted">Add a new root category or subcategory.</p>
        </div>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        @include('admin.categories._form', ['submitLabel' => 'Create Category'])
    </form>
@endsection
