<?php

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.app-admin')] class extends Component
{
    use WithFileUploads;

    public string $brand_name = '';
    public $brand_image; // file upload

    public function rules()
    {
        return [
            'brand_name' => 'required|string|max:255|unique:brands,brand_name',
            'brand_image'  => 'required|image|max:2048', // 2MB limit
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'The brand name is required.',
            'brand_name.unique'   => 'This brand name already exists.',
            'brand_image.required'  => 'Please upload a brand image.',
            'brand_image.image'     => 'The file must be an image.',
            'brand_image.max'       => 'The image may not be larger than 2MB.',
        ];
    }

    public function create()
    {
        $validated = $this->validate();

        // store image in /storage/app/public/brands
        $path = $this->brand_image->store('brands', 'public');

        Brand::create([
            'brand_name' => $validated['brand_name'],
            'brand_image'  => $path,
        ]);

        session()->flash('success', 'Brand created successfully!');
        $this->reset(); // clear form
        return redirect()->route('admin.brand');
    }
};
