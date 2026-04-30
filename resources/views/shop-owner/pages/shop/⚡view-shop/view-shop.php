<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.app-shop-owner')] class extends Component
{
    #[Computed]
    public function myShop()
    {
        // Return all shops linked to the authenticated user
        return Auth::user()->shops;
    }
};
