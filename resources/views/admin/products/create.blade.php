@extends('admin.layout')

@section('title', 'Create Product')

@section('content')
    <section class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">New product</p>
                <h2 class="mt-2 font-display text-4xl font-bold text-brown">Create a catalog entry</h2>
                <p class="mt-3 max-w-2xl text-sm text-brown-soft sm:text-base">
                    Add the core details now, then refine the product later as reviews and assets come in.
                </p>
            </div>

            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                Back to products
            </a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-8">
            @csrf
            @include('admin.products._form', ['submitLabel' => 'Create Product'])
        </form>
    </section>
@endsection
