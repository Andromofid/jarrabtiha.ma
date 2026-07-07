<div class="grid gap-8 lg:grid-cols-[minmax(0,1.6fr)_minmax(18rem,0.9fr)]">
    <div class="space-y-6">
        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Core details</h3>
                <p class="mt-2 text-sm text-brown-soft">Set the main information visitors will see first.</p>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-semibold text-brown">Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name ?? '') }}"
                        required
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="slug" class="mb-2 block text-sm font-semibold text-brown">Slug</label>
                    <input
                        id="slug"
                        type="text"
                        name="slug"
                        value="{{ old('slug', $product->slug ?? '') }}"
                        placeholder="Auto-generated if empty"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown placeholder:text-brown-light focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="brand" class="mb-2 block text-sm font-semibold text-brown">Brand</label>
                    <input
                        id="brand"
                        type="text"
                        name="brand"
                        value="{{ old('brand', $product->brand ?? '') }}"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="category_id" class="mb-2 block text-sm font-semibold text-brown">Category</label>
                    <select
                        id="category_id"
                        name="category_id"
                        required
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                        <option value="">Select a category</option>
                        @foreach ($categories as $categoryOption)
                            <option value="{{ $categoryOption->id }}" @selected((string) old('category_id', $product->category_id ?? '') === (string) $categoryOption->id)>
                                {{ $categoryOption->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </section>

        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Content</h3>
                <p class="mt-2 text-sm text-brown-soft">Give enough context to make this product easy to recognize.</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="where_to_buy" class="mb-2 block text-sm font-semibold text-brown">Where to buy</label>
                    <input
                        id="where_to_buy"
                        type="text"
                        name="where_to_buy"
                        value="{{ old('where_to_buy', $product->where_to_buy ?? '') }}"
                        placeholder="Optional product URL"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown placeholder:text-brown-light focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="description" class="mb-2 block text-sm font-semibold text-brown">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="min-h-[180px] w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
            </div>
        </section>
    </div>

    <div class="space-y-6">
        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Media</h3>
                <p class="mt-2 text-sm text-brown-soft">Upload a product image to keep the catalog polished.</p>
            </div>

            <div class="space-y-4">
                <div class="overflow-hidden rounded-[1.5rem] border border-border bg-white">
                    <img
                        src="{{ !empty($product?->image) ? asset('storage/' . $product->image) : asset('logo.png') }}"
                        alt="{{ $product->name ?? 'Product preview' }}"
                        class="h-56 w-full object-cover">
                </div>

                <div>
                    <label for="image" class="mb-2 block text-sm font-semibold text-brown">Image</label>
                    <input
                        id="image"
                        type="file"
                        name="image"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown file:mr-4 file:rounded-full file:border-0 file:bg-primary-soft file:px-4 file:py-2 file:font-semibold file:text-primary">
                </div>
            </div>
        </section>

        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Visibility</h3>
                <p class="mt-2 text-sm text-brown-soft">Control whether this product is ready to appear publicly.</p>
            </div>

            <label class="flex items-start gap-3 rounded-2xl border border-border bg-white p-4">
                <input
                    id="is_approved"
                    type="checkbox"
                    name="is_approved"
                    value="1"
                    @checked(old('is_approved', $product->is_approved ?? true))
                    class="mt-1 rounded border-border text-primary focus:ring-primary">
                <span>
                    <span class="block text-sm font-semibold text-brown">Approved and visible</span>
                    <span class="mt-1 block text-sm text-brown-soft">Keep this enabled when the product should appear in the public catalog.</span>
                </span>
            </label>
        </section>
    </div>
</div>

<div class="mt-8 flex flex-wrap gap-3 border-t border-border pt-6">
    <a
        href="{{ route('admin.products.index') }}"
        class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
        Cancel
    </a>
    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
        {{ $submitLabel }}
    </button>
</div>
