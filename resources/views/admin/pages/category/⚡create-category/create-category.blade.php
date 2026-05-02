<div> 
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto rounded-xl">
  <div class="mt-12 max-w-full mx-auto">
    <!-- Card -->
    <div class="flex flex-col border border-transparent rounded-xl p-4 sm:p-6 lg:p-8 
                bg-gradient-to-br from-orange-600/20 via-transparent to-transparent shadow-2xl">

      <!-- Back Button -->
      <div class="mb-4">
        <a href="{{ route('admin.category') }}"
          class="inline-flex items-center gap-x-2 px-3 py-2 text-sm font-medium
            border border-transparent rounded-lg bg-orange-600 text-white
            hover:bg-orange-400 focus:outline-hidden">
          <svg class="w-4 h-4 flex-shrink-0 align-middle" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 15l-6-6 6-6" />
          </svg>
          <span>Back</span>
        </a>
      </div>

      <!-- Title -->
      <h2 class="mb-8 text-xl font-semibold text-white">
        Create Category
      </h2>

      <!-- Form -->
      <form wire:submit.prevent="create">
        <div class="grid gap-4 lg:gap-6">

          <!-- Category Name -->
          <div>
            <label for="cat_name" class="block mb-2 text-sm font-medium text-white">Category Name</label>
            <input wire:model.defer="cat_name" type="text" id="cat_name"
              class="py-2.5 sm:py-3 px-4 block w-full border border-black rounded-lg 
                     sm:text-sm text-white placeholder:text-gray-400 focus:outline-none">
            @error('cat_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>

          <!-- Category Description -->
          <div class="mt-5">
            <label for="cat_desc" class="block mb-2 text-sm font-medium text-white">Description</label>
            <textarea wire:model.defer="cat_desc" id="cat_desc" rows="3"
              class="py-2.5 sm:py-3 px-4 block w-full border border-black rounded-lg 
                     sm:text-sm text-white placeholder:text-gray-400 focus:outline-none"></textarea>
            @error('cat_desc') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>

        </div>

        <!-- Create Button -->
        <div class="mt-6 grid">
          <button type="submit"
            class="w-50 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium 
                   rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-400 focus:outline-hidden">
            Create
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</div>
</div>