<div>
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto rounded-xl">
  <div class="mt-12 max-w-full mx-auto">
    <!-- Card -->
    <div class="flex flex-col border border-transparent rounded-xl p-4 sm:p-6 lg:p-8 
                bg-gradient-to-br from-orange-600/20 via-transparent to-transparent shadow-2xl">

      <!-- Back Button -->
      <div class="mb-4">
        <a href="{{ route('admin.brand') }}"
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
        Update Brand
      </h2>

      <!-- Form -->
      <form wire:submit.prevent="update">
        <div class="grid gap-4 lg:gap-6">

          <!-- Brand Name -->
          <div>
            <label for="brand_name" class="block mb-2 text-sm font-medium text-white">Brand Name</label>
            <input wire:model.defer="brand_name" type="text" id="brand_name"
              class="py-2.5 sm:py-3 px-4 block w-full border border-black rounded-lg 
                     sm:text-sm text-white placeholder:text-gray-400 focus:outline-none">
            @error('brand_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>

          <!-- Brand Image -->
          <div class="mt-5">
            <label for="brand_image" class="block mb-2 text-sm font-medium text-white">Brand Image</label>
            <input wire:model="brand_image" type="file" id="brand_image"
              class="py-2.5 sm:py-3 px-4 block w-full border border-black rounded-lg 
                     sm:text-sm text-white placeholder:text-gray-400 focus:outline-none">
            @error('brand_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <!-- Preview new upload -->
            @if ($brand_image)
                <img src="{{ $brand_image->temporaryUrl() }}" 
                    alt="Preview" 
                    class="h-20 w-20 mt-2 rounded-md object-cover border border-orange-500">
            @else
                <!-- Show current image if no new upload -->
                @if($brand->brand_image)
                    <img src="{{ asset('storage/' . $brand->brand_image) }}" 
                        alt="{{ $brand_name }}" 
                        class="h-20 w-20 mt-2 rounded-md object-cover border border-gray-700">
                @endif
            @endif

          </div>

        </div>

        <!-- Update Button -->
        <div class="mt-6 grid">
          <button type="submit"
            class="w-50 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium 
                   rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-400 focus:outline-hidden">
            Update
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</div>
</div>