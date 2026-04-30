<?php

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app-shop-owner')] class extends Component
{
     public string $shop_name = '';

    protected function rules()
    {
        return [
            'shop_name' => 'required|string|min:3|max:255|unique:shops,shop_name',
        ];
    }

    public function create()
    {
        $validated = $this->validate();

        // Create the shop
        $shop = Shop::create([
            'shop_name' => $validated['shop_name'],
        ]);

        // Automatically assign to the logged-in user via pivot
        $user = Auth::user();
        $user->shops()->attach($shop->id);

        session()->flash('success', 'Shop created and linked to your account.');
        return redirect()->route('shop-owner.view-shop');
    }
};