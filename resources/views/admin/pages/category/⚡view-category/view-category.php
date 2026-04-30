<?php

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.app-admin')] class extends Component
{
    use WithPagination; // 🔑 enable pagination methods
    public $selectedCats = []; // @var array $selectedCats IDs of selected users across all pages
    public $selectAll = false; // @var bool $selectAll Whether all users are selected
    
    /**
     * Delete all selected users.
     * Resets selection after deletion.
     */
    public function deleteSelected()
    {
        Category::whereIn('id', $this->selectedCats)->delete();

        $this->selectedCats = [];
        $this->selectAll = false;

        session()->flash('success', 'Selected users deleted successfully.');
    }

    public function updatedSelectAll($value) 
    { 
        if ($value) 
        { 
            // Grab IDs from the all pages, not just current page
            $this->selectedCats = $this->categories->getCollection()
            ->pluck('id')
            ->map(fn($id) => (int) $id)
            ->toArray(); 
        } else { 
            $this->selectedCats = []; 
        } 
    } 
                     
    public function updatedSelectedCats() 
    { 
        // Keep header checkbox in sync 
        $this->selectAll = count($this->selectedCats) === $this->totalCatsCount(); 
    }

    /**
     * Toggle selection of all users across pages.
     */
    public function toggleSelectAll()
    {
        $allIds = Category::pluck('id')->map(fn($id) => (int) $id)->toArray();

        $selectedCount = count($this->selectedCats);
        $totalCount = $this->totalUsersCount;

        if (count($this->selectedCats) === $this->totalCatsCount()) 
            { 
                $this->selectedCats = []; 
                $this->selectAll = false; 
            } else { 
                $this->selectedCats = $allIds; $this->selectAll = true; 
            }
    }

    /**
     * Toggle selection of a single user.
     */
    public function toggleRowSelection($catId)
    {
        if (in_array($catId, $this->selectedCats)) {
            // Remove if already selected
            $this->selectedCats = array_values(array_diff($this->selectedCats, [$catId]));
        } else {
            // Add if not selected
            $this->selectedCats[] = $catId;
        }

        // Sync header checkbox
        $this->selectAll = count($this->selectedCats) === $this->totalCatsCount();
    }
    
    /**
     * Computed property: total number of users.
     */
    #[Computed]
    public function totalCatsCount()
    {
        return Category::count();
    }
    

    #[Computed()]
    public function categories()
    {
        
        return Category::select('id', 'cat_name', 'cat_desc', 'cat_slug', 'created_at')
            ->latest()
            ->paginate(5);
    }
};