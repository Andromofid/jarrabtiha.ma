@extends('admin.layout')

@section('title', 'Manage Products')

@section('content')
    <div class="header-row">
        <div>
            <h2>Products</h2>
            <p class="muted">Manage catalog entries, category assignment, and approval status.</p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="button primary">New Product</a>
    </div>

    <form action="{{ route('admin.products.index') }}" method="GET" style="margin-bottom: 20px;">
        <div class="grid">
            <div class="field">
                <label for="category">Filter by Category</label>
                <select id="category" name="category">
                    <option value="">All categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) $selectedCategory === (string) $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="brand">Filter by Brand</label>
                <select id="brand" name="brand">
                    <option value="">All brands</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand }}" @selected($selectedBrand === $brand)>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="actions" style="margin-top: 16px;">
            <button type="submit" class="primary">Apply Filters</button>
            <a href="{{ route('admin.products.index') }}" class="button">Reset</a>
        </div>
    </form>

    @if ($products->isEmpty())
        <div class="empty">No products match the current filters.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Approved</th>
                    <th>Ratings</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <strong>{{ $product->name }}</strong><br>
                            <span class="muted">{{ $product->slug }}</span>
                        </td>
                        <td>{{ $product->category?->name ?: 'Unassigned' }}</td>
                        <td>{{ $product->brand ?: 'N/A' }}</td>
                        <td>{{ $product->is_approved ? 'Yes' : 'No' }}</td>
                        <td>{{ number_format($product->rating_avg, 2) }} ({{ $product->rating_count }})</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.products.edit', $product) }}" class="button">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
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
