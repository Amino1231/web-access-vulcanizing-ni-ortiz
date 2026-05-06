<?php

use App\Models\Brand;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.app-admin')] class extends Component
{
    use WithPagination; // 🔑 enable pagination methods
    public $selectedBrands = []; // @var array $selectedBrands IDs of selected users across all pages
    public $selectAll = false; // @var bool $selectAll Whether all users are selected
    
    /**
     * Delete all selected users.
     * Resets selection after deletion.
     */
    public function deleteSelected()
    {
        Brand::whereIn('id', $this->selectedBrands)->delete();

        $this->selectedBrands = [];
        $this->selectAll = false;

        session()->flash('success', 'Selected users deleted successfully.');
    }

    public function updatedSelectAll($value) 
    { 
        if ($value) 
        { 
            // Grab IDs from the all pages, not just current page
            $this->selectedBrands = $this->brands->getCollection()
            ->pluck('id')
            ->map(fn($id) => (int) $id)
            ->toArray(); 
        } else { 
            $this->selectedBrands = []; 
        } 
    } 
                     
    public function updatedSelectedBrands() 
    { 
        // Keep header checkbox in sync 
        $this->selectAll = count($this->selectedBrands) === $this->totalBrandsCount(); 
    }

    /**
     * Toggle selection of all users across pages.
     */
    public function toggleSelectAll()
    {
        $allIds = Brand::pluck('id')->map(fn($id) => (int) $id)->toArray();

        $selectedCount = count($this->selectedBrands);
        $totalCount = $this->totalBrandsCount;

        if (count($this->selectedBrands) === $this->totalBrandsCount()) 
            { 
                $this->selectedBrands = []; 
                $this->selectAll = false; 
            } else { 
                $this->selectedBrands = $allIds; $this->selectAll = true; 
            }
    }

    /**
     * Toggle selection of a single user.
     */
    public function toggleRowSelection($brandId)
    {
        if (in_array($brandId, $this->selectedBrands)) {
            // Remove if already selected
            $this->selectedBrands = array_values(array_diff($this->selectedBrands, [$brandId]));
        } else {
            // Add if not selected
            $this->selectedBrands[] = $brandId;
        }

        // Sync header checkbox
        $this->selectAll = count($this->selectedBrands) === $this->totalBrandsCount();
    }
    
    /**
     * Computed property: total number of users.
     */
    #[Computed]
    public function totalBrandsCount()
    {
        return Brand::count();
    }
    

    #[Computed()]
    public function brands()
    {
        
        return Brand::select('id', 'brand_name', 'brand_image', 'created_at')
            ->latest()
            ->paginate(5);
    }
};