<div class="grid">
    <div class="field">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required>
    </div>

    <div class="field">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}" placeholder="Auto-generated if empty">
    </div>

    <div class="field">
        <label for="parent_id">Parent Category</label>
        <select id="parent_id" name="parent_id">
            <option value="">None</option>
            @foreach ($parentCategories as $parentCategory)
                <option value="{{ $parentCategory->id }}" @selected((string) old('parent_id', $category->parent_id ?? '') === (string) $parentCategory->id)>
                    {{ $parentCategory->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="field">
        <label for="order">Order</label>
        <input id="order" type="number" min="0" name="order" value="{{ old('order', $category->order ?? 0) }}">
    </div>

    <div class="field full">
        <label for="icon">Icon</label>
        <input id="icon" type="text" name="icon" value="{{ old('icon', $category->icon ?? '') }}" placeholder="Optional icon class or identifier">
    </div>
</div>

<div class="header-row" style="margin-top: 24px; margin-bottom: 0;">
    <a href="{{ route('admin.categories.index') }}" class="button">Cancel</a>
    <button type="submit" class="primary">{{ $submitLabel }}</button>
</div>
