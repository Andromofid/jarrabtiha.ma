@extends('admin.layout')

@section('title', 'Manage Categories')

@section('content')
    @php
        $rootCategories = $categories->whereNull('parent_id')->count();
        $totalProducts = $categories->sum('products_count');
    @endphp

    <section class="mb-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Total categories</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $categories->count() }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Root categories</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $rootCategories }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-brown-soft">Linked products</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $totalProducts }}</p>
        </div>
    </section>

    <section class="mb-8 rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Categories</p>
                <h2 class="mt-2 font-display text-4xl font-bold text-brown">Shape the catalog structure</h2>
                <p class="mt-3 max-w-2xl text-sm text-brown-soft sm:text-base">
                    Organize parent categories, subcategories, and ordering so the browsing experience stays clear.
                </p>
            </div>

            <a
                href="{{ route('admin.categories.create') }}"
                class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
                Add new category
            </a>
        </div>
    </section>

    @if ($categories->isEmpty())
        <section class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
            <h3 class="font-display text-3xl font-bold text-brown">No categories yet</h3>
            <p class="mx-auto mt-3 max-w-xl text-brown-soft">
                Create the first parent category to start structuring your product catalog.
            </p>
        </section>
    @else
        <section class="grid gap-5 lg:grid-cols-2">
            @foreach ($categories as $category)
                <article class="overflow-hidden rounded-card border border-border bg-white shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <div class="flex flex-col gap-5 p-5 sm:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                                    {{ $category->parent?->name ? 'Subcategory' : 'Root category' }}
                                </p>
                                <h3 class="mt-1 text-xl font-semibold text-brown">{{ $category->name }}</h3>
                                <p class="mt-2 truncate text-sm text-brown-light">{{ $category->slug }}</p>
                            </div>

                            <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                                Order {{ $category->order }}
                            </span>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Parent</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ $category->parent?->name ?: 'Root level' }}</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Children</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ $category->children_count }}</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Products</p>
                                <p class="mt-2 text-sm font-semibold text-brown">{{ $category->products_count }}</p>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-border bg-cream px-4 py-3">
                            <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Icon</p>
                            <p class="mt-2 text-sm font-semibold text-brown">{{ $category->icon ?: 'No icon assigned' }}</p>
                        </div>

                        <div class="flex flex-wrap gap-3 border-t border-border pt-4">
                            <a
                                href="{{ route('admin.categories.edit', $category) }}"
                                class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                                Edit category
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
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
