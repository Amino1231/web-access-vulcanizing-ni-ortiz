<?php

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app-admin')] class extends Component
{
    public string $cat_name = '';
    public string $cat_desc = ''; 

    public function rules()
    {
        return [
            'cat_name' => 'required|string|max:255|unique:categories,cat_name',
            'cat_desc' => 'nullable|string|max:500',
            'cat_slug' => 'unique:categories,cat_slug'
        ];
    }

    public function messages()
    {
        return [
            'cat_name.required' => 'The category name is required.',
            'cat_name.string' => 'The category name must be a string.',
            'cat_name.max' => 'The category name may not be greater than 255 characters.',
            'cat_name.unique' => 'The category name is already taken.',
            'cat_desc.string' => 'The category description must be a string.',
            'cat_desc.max' => 'The category description may not be greater than 500 characters.',
            'cat_slug.unique' => 'The category slug is already taken.',
        ];
    }

    public function create()
    {
        $validated = $this->validate();

        $validated['cat_name'] = $this->sanitizeData($validated['cat_name']);
        $validated['cat_desc'] = $this->sanitizeData($validated['cat_desc']);

        Category::create([
            'cat_name' => $validated['cat_name'],
            'cat_desc' => $validated['cat_desc'],
            'cat_slug' => Str::slug($validated['cat_name'], '-'),
        ]);

        session()->flash('success', 'Category created successfully!');
        $this->reset(); // clear form
        return redirect()->route('admin.category');
    }

    protected function sanitizeData($data)
    {
        return is_string($data)
            ? Str::of($data)->stripTags()->trim()->toString()
            : $data;
    }
};