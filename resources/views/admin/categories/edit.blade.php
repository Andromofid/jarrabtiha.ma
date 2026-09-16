@extends('admin.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="grid gap-8 lg:grid-cols-[minmax(0,1.6fr)_minmax(18rem,0.9fr)]">
        <section class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Edit category</p>
                    <h2 class="mt-2 font-display text-4xl font-bold text-ink">{{ $category->name }}</h2>
                    <p class="mt-3 max-w-2xl text-sm text-ink-soft sm:text-base">
                        Update naming, hierarchy, display order, and supporting metadata for this category.
                    </p>
                </div>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-ink transition hover:border-primary/30 hover:text-primary">
                    Back to categories
                </a>
            </div>

            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="mt-8">
                @csrf
                @method('PUT')
                @include('admin.categories._form', ['submitLabel' => 'Update Category'])
            </form>
        </section>

        <aside class="space-y-6">
            <section class="rounded-card border border-border bg-white p-5 shadow-soft sm:p-6">
                <h3 class="text-xl font-semibold text-ink">Hierarchy snapshot</h3>
                <div class="mt-5 space-y-4">
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Parent</p>
                        <p class="mt-2 text-sm font-semibold text-ink">{{ $category->parent?->name ?: 'Root level' }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Slug</p>
                        <p class="mt-2 break-all text-sm font-semibold text-ink">{{ $category->slug }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Icon</p>
                        <p class="mt-2 text-sm font-semibold text-ink">{{ $category->icon ?: 'No icon assigned' }}</p>
                    </div>
                </div>
            </section>

            <section class="rounded-card border border-border bg-white p-5 shadow-soft sm:p-6">
                <h3 class="text-xl font-semibold text-ink">Child categories</h3>
                @if ($category->children->count())
                    <div class="mt-5 space-y-3">
                        @foreach ($category->children as $childCategory)
                            <div class="rounded-2xl border border-border bg-cream px-4 py-3">
                                <p class="text-sm font-semibold text-ink">{{ $childCategory->name }}</p>
                                <p class="mt-1 text-sm text-ink-soft">{{ $childCategory->slug }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mt-5 rounded-2xl border border-dashed border-border bg-cream px-4 py-6 text-sm text-ink-soft">
                        No subcategories yet.
                    </div>
                @endif
            </section>
        </aside>
    </div>
@endsection
