@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
    <section class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Edit product</p>
                <h2 class="mt-2 font-display text-4xl font-bold text-brown">{{ $product->name }}</h2>
                <p class="mt-3 max-w-2xl text-sm text-brown-soft sm:text-base">
                    Update the public-facing content, media, and moderation status for this product.
                </p>
            </div>

            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                Back to products
            </a>
        </div>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="mt-8">
            @csrf
            @method('PUT')
            @include('admin.products._form', ['submitLabel' => 'Update Product'])
        </form>
    </section>
@endsection
