<div class="grid">
    <div class="field">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="field">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" value="{{ old('slug', $product->slug ?? '') }}" placeholder="Auto-generated if empty">
    </div>

    <div class="field">
        <label for="brand">Brand</label>
        <input id="brand" type="text" name="brand" value="{{ old('brand', $product->brand ?? '') }}">
    </div>

    <div class="field">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" required>
            <option value="">Select a category</option>
            @foreach ($categories as $categoryOption)
                <option value="{{ $categoryOption->id }}" @selected((string) old('category_id', $product->category_id ?? '') === (string) $categoryOption->id)>
                    {{ $categoryOption->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="field full">
        <label for="image">Image Path</label>
        <input id="image" type="file" name="image" value="{{ old('image', $product->image ?? '') }}" placeholder="Example: products/item.jpg">
    </div>

    <div class="field full">
        <label for="where_to_buy">Where To Buy</label>
        <input id="where_to_buy" type="text" name="where_to_buy" value="{{ old('where_to_buy', $product->where_to_buy ?? '') }}" placeholder="Optional product URL">
    </div>

    <div class="field full">
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="field full">
        <label class="checkbox" for="is_approved">
            <input id="is_approved" type="checkbox" name="is_approved" value="1" @checked(old('is_approved', $product->is_approved ?? true))>
            Approved and visible
        </label>
    </div>
</div>

<div class="header-row" style="margin-top: 24px; margin-bottom: 0;">
    <a href="{{ route('admin.products.index') }}" class="button">Cancel</a>
    <button type="submit" class="primary">{{ $submitLabel }}</button>
</div>
