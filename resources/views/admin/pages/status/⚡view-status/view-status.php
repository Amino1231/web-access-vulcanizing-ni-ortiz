<?php

use App\Models\Status;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.app-admin')] class extends Component
{
    use WithPagination; // 🔑 enable pagination methods
    public $selectedStatus = []; // @var array $selectedStatus IDs of selected users across all pages
    public $selectAll = false; // @var bool $selectAll Whether all users are selected
    
    /**
     * Delete all selected users.
     * Resets selection after deletion.
     */
    public function deleteSelected()
    {
        Status::whereIn('id', $this->selectedStatus)->delete();

        $this->selectedStatus = [];
        $this->selectAll = false;

        session()->flash('success', 'Selected status deleted successfully.');
    }

    public function updatedSelectAll($value) 
    { 
        if ($value) 
        { 
            // Grab IDs from the all pages, not just current page
            $this->selectedStatus = $this->statuses->getCollection()
            ->pluck('id')
            ->map(fn($id) => (int) $id)
            ->toArray(); 
        } else { 
            $this->selectedStatus = []; 
        } 
    } 
                     
    public function updatedSelectedStatus() 
    { 
        // Keep header checkbox in sync 
        $this->selectAll = count($this->selectedStatus) === $this->totalStatusCount(); 
    }

    /**
     * Toggle selection of all users across pages.
     */
    public function toggleSelectAll()
    {
        $allIds = Status::pluck('id')->map(fn($id) => (int) $id)->toArray();

        $selectedCount = count($this->selectedStatus);
        $totalCount = $this->totalStatusCount;

        if (count($this->selectedStatus) === $this->totalStatusCount()) 
            { 
                $this->selectedStatus = []; 
                $this->selectAll = false; 
            } else { 
                $this->selectedStatus = $allIds; $this->selectAll = true; 
            }
    }

    /**
     * Toggle selection of a single user.
     */
    public function toggleRowSelection($statusId)
    {
        if (in_array($statusId, $this->selectedStatus)) {
            // Remove if already selected
            $this->selectedStatus = array_values(array_diff($this->selectedStatus, [$statusId]));
        } else {
            // Add if not selected
            $this->selectedStatus[] = $statusId;
        }

        // Sync header checkbox
        $this->selectAll = count($this->selectedStatus) === $this->totalStatusCount();
    }
    
    /**
     * Computed property: total number of users.
     */
    #[Computed]
    public function totalStatusCount()
    {
        return Status::count();
    }
    

    #[Computed()]
    public function statuses()
    {
        
        return Status::select('id', 'status_name', 'created_at')
            ->latest()
            ->paginate(5);
    }
};