<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6">

    @foreach($this->myShop as $shop)
    <!-- Card -->
    <div class="group flex flex-col h-full bg-gradient-to-br from-orange-600/20 via-transparent to-transparent dark:bg-neutral-800 border border-neutral dark:border-neutral-700 shadow-2xs rounded-xl">
      <div class="h-52 flex flex-col justify-center items-center bg-orange-600 rounded-t-xl">
        <h3 class="text-4xl font-bold text-white">
            {{ strtoupper(substr($shop->shop_name, 0, 1)) }}
        </h3>
      </div>
      <div class="p-4 md:p-6">
        <h3 class="text-xl font-extrabold text-orange-400 dark:text-neutral-200">
          {{ $shop->shop_name }}
        </h3>
        <p class="mt-3 text-white dark:text-neutral-400">
          A software that develops products for software developers and developments.
        </p>
      </div>
      <div class="mt-auto flex border-t border-neutral dark:border-neutral-700 divide-x divide-gray-200 dark:divide-neutral-700">
        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-b-xl bg-orange-600 dark:bg-neutral-800 text-white dark:text-neutral-200 shadow-2xs hover:bg-orange-400 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
          View Shop
        </a>
      </div>
    </div>
    <!-- End Card -->
    @endforeach
  </div>
  <!-- End Grid -->
</div>
<!-- End Card Blog -->