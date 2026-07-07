<div class="grid gap-8 lg:grid-cols-[minmax(0,1.5fr)_minmax(18rem,0.95fr)]">
    <div class="space-y-6">
        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Core details</h3>
                <p class="mt-2 text-sm text-brown-soft">Define the visible label and the URL-friendly identifier.</p>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-semibold text-brown">Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $category->name ?? '') }}"
                        required
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="slug" class="mb-2 block text-sm font-semibold text-brown">Slug</label>
                    <input
                        id="slug"
                        type="text"
                        name="slug"
                        value="{{ old('slug', $category->slug ?? '') }}"
                        placeholder="Auto-generated if empty"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown placeholder:text-brown-light focus:border-primary focus:ring-0">
                </div>
            </div>
        </section>

        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Structure</h3>
                <p class="mt-2 text-sm text-brown-soft">Choose whether this category stands alone or sits under a parent.</p>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="parent_id" class="mb-2 block text-sm font-semibold text-brown">Parent category</label>
                    <select
                        id="parent_id"
                        name="parent_id"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                        <option value="">None</option>
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{ $parentCategory->id }}" @selected((string) old('parent_id', $category->parent_id ?? '') === (string) $parentCategory->id)>
                                {{ $parentCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="order" class="mb-2 block text-sm font-semibold text-brown">Order</label>
                    <input
                        id="order"
                        type="number"
                        min="0"
                        name="order"
                        value="{{ old('order', $category->order ?? 0) }}"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown focus:border-primary focus:ring-0">
                </div>
            </div>
        </section>
    </div>

    <div class="space-y-6">
        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="mb-5">
                <h3 class="text-xl font-semibold text-brown">Visual identifier</h3>
                <p class="mt-2 text-sm text-brown-soft">Keep an icon token here if your front-end uses one for discovery or navigation.</p>
            </div>

            <div>
                <label for="icon" class="mb-2 block text-sm font-semibold text-brown">Icon</label>
                <input
                    id="icon"
                    type="text"
                    name="icon"
                    value="{{ old('icon', $category->icon ?? '') }}"
                    placeholder="Optional icon class or identifier"
                    class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-brown placeholder:text-brown-light focus:border-primary focus:ring-0">
            </div>
        </section>

        <section class="rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <h3 class="text-xl font-semibold text-brown">Quick guidance</h3>
            <div class="mt-5 space-y-3 text-sm text-brown-soft">
                <div class="rounded-2xl border border-border bg-white px-4 py-3">
                    Use root categories for broad top-level navigation.
                </div>
                <div class="rounded-2xl border border-border bg-white px-4 py-3">
                    Use subcategories to narrow product discovery within a parent group.
                </div>
                <div class="rounded-2xl border border-border bg-white px-4 py-3">
                    Lower order values appear first when categories are sorted.
                </div>
            </div>
        </section>
    </div>
</div>

<div class="mt-8 flex flex-wrap gap-3 border-t border-border pt-6">
    <a
        href="{{ route('admin.categories.index') }}"
        class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
        Cancel
    </a>
    <button
        type="submit"
        class="inline-flex items-center justify-center rounded-pill bg-primary px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-primary-hover">
        {{ $submitLabel }}
    </button>
</div>
