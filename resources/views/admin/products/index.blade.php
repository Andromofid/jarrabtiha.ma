@extends('admin.layout')

@section('title', 'Manage Products')

@section('content')
    @php
        $approvedCount = $products->where('is_approved', true)->count();
    @endphp

    <section class="mb-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Products shown</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $products->count() }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Approved products</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $approvedCount }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Available brands</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $brands->count() }}</p>
        </div>
    </section>

    <section class="mb-8 rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Products</p>
                <h2 class="mt-2 font-display text-4xl font-bold text-brown">Manage your catalog</h2>
                <p class="mt-3 max-w-2xl text-sm text-brown-soft sm:text-base">
                    Review category assignment, ratings, approval state, and quickly jump into edits.
                </p>
            </div>

            <a
                href="{{ route('admin.products.create') }}"
                class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                Add new product
            </a>
        </div>

        <form action="{{ route('admin.products.index') }}" method="GET" class="mt-8 rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="category" class="mb-2 block text-sm font-semibold text-brown">Category</label>
                    <select
                        id="category"
                        name="category"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                        <option value="">All categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) $selectedCategory === (string) $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="brand" class="mb-2 block text-sm font-semibold text-brown">Brand</label>
                    <select
                        id="brand"
                        name="brand"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                        <option value="">All brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand }}" @selected($selectedBrand === $brand)>
                                {{ $brand }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-5 flex flex-wrap gap-3">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-pill bg-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-primary-hover">
                    Apply filters
                </button>
                <a
                    href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                    Reset
                </a>
            </div>
        </form>
    </section>

    @if ($products->isEmpty())
        <section class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
            <h3 class="font-display text-3xl font-bold text-brown">No products match these filters</h3>
            <p class="mx-auto mt-3 max-w-xl text-brown-soft">
                Try another category or brand, or add a fresh product to start filling this section.
            </p>
        </section>
    @else
        <section class="grid gap-5 lg:grid-cols-2">
            @foreach ($products as $product)
                <article class="overflow-hidden rounded-card border border-border bg-white shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <div class="flex flex-col gap-5 p-5 sm:p-6">
                        <div class="flex gap-4">
                            <img
                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('logo.png') }}"
                                alt="{{ $product->name }}"
                                class="h-20 w-20 shrink-0 rounded-2xl border border-border bg-cream object-cover">

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="truncate text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                                            {{ $product->brand ?: 'No brand' }}
                                        </p>
                                        <h3 class="mt-1 text-xl font-semibold text-brown">{{ $product->name }}</h3>
                                        <p class="mt-2 truncate text-sm text-brown-light">{{ $product->slug }}</p>
                                    </div>

                                    <span class="{{ $product->is_approved ? 'bg-success-soft text-brown' : 'bg-danger-soft text-brown' }} rounded-full px-3 py-1 text-xs font-semibold">
                                        {{ $product->is_approved ? 'Approved' : 'Hidden' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Category</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ $product->category?->name ?: 'Unassigned' }}</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Rating</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ number_format($product->rating_avg ?? 0, 2) }}/5</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Reviews</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ $product->rating_count }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 border-t border-border pt-4">
                            <a
                                href="{{ route('admin.products.edit', $product) }}"
                                class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                                Edit product
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center rounded-pill bg-danger px-5 py-3 text-sm font-semibold text-white transition hover:opacity-90">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    @endif
@endsection
