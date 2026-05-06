<?php

use App\Models\Status;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app-admin')] class extends Component
{
    public string $status_name = '';

    public function rules()
    {
        return [
            'status_name' => 'required|string|max:255|unique:statuses,status_name',
        ];
    }

    public function messages()
    {
        return [
            'status_name.required' => 'The status name is required.',
            'status_name.string'   => 'The status name must be a string.',
            'status_name.max'      => 'The status name may not be greater than 255 characters.',
            'status_name.unique'   => 'The status name is already taken.',
        ];
    }

    public function create()
    {
        $validated = $this->validate();

        $validated['status_name'] = $this->sanitizeData($validated['status_name']);

        Status::create([
            'status_name' => $validated['status_name'],
        ]);

        session()->flash('success', 'Status created successfully!');
        $this->reset(); // clear form
        return redirect()->route('admin.status');
    }

    protected function sanitizeData($data)
    {
        return is_string($data)
            ? Str::of($data)->stripTags()->trim()->toString()
            : $data;
    }
};
