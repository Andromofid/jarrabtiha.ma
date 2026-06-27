@extends('admin.layout')

@section('title', 'Manage Categories')

@section('content')
    <div class="header-row">
        <div>
            <h2>Categories</h2>
            <p class="muted">Create, update, and remove parent categories or subcategories.</p>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="button primary">New Category</a>
    </div>

    @if ($categories->isEmpty())
        <div class="empty">No categories yet.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Order</th>
                    <th>Children</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <strong>{{ $category->name }}</strong><br>
                            <span class="muted">{{ $category->icon ?: 'No icon' }}</span>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent?->name ?: 'Root category' }}</td>
                        <td>{{ $category->order }}</td>
                        <td>{{ $category->children_count }}</td>
                        <td>{{ $category->products_count }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="button">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
