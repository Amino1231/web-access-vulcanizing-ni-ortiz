<?php

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.app-admin')] class extends Component
{
    use WithFileUploads;

    public Brand $brand;
    public string $brand_name = '';
    public $brand_image; // file upload

    public function mount(Brand $brand)
    {
        $this->brand = $brand;
        $this->brand_name = $brand->brand_name;
    }

    public function rules()
    {
        return [
            'brand_name'  => 'required|string|max:255|unique:brands,brand_name,' . $this->brand->id,
            'brand_image' => 'nullable|image|max:2048',
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        // If new image uploaded
        if ($this->brand_image) {
            $path = $this->brand_image->store('brands', 'public');
            $this->brand->brand_image = $path;
        }

        $this->brand->brand_name = $validated['brand_name'];
        $this->brand->save();

        session()->flash('success', 'Brand updated successfully!');
        return redirect()->route('admin.brand');
    }
};
