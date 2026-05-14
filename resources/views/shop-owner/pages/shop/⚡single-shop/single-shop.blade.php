<div class="max-w-[85rem] mx-auto px-6 py-10">
  <!-- Shop Header -->
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-orange-500">{{ $shop->shop_name }}</h1>
    <a href="{{ route('shop.product.create', $shop->id) }}"
       class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-500">
       + Add Product
    </a>
  </div>

  <!-- Shop Preview -->
  <div class="bg-neutral-900 p-6 rounded-xl shadow-xl border border-gray-800 mb-10">
    <p class="text-white">Owner: {{ $shop->users->pluck('name')->join(', ') }}</p>
    <p class="text-gray-400">Created: {{ $shop->created_at->diffForHumans() }}</p>
  </div>

  <!-- Product List -->
  <h2 class="text-xl font-semibold text-white mb-4">Products</h2>
  <table class="w-full text-sm text-white border border-gray-700 rounded-lg overflow-hidden">
    <thead class="bg-orange-600 text-white">
      <tr>
        <th class="px-4 py-2">Image</th>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">Price</th>
        <th class="px-4 py-2">Quantity</th>
        <th class="px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($shop->products as $product)
        <tr class="border-t border-gray-700">
          <td class="px-4 py-2">
            <img src="{{ asset('storage/' . $product->prod_img) }}" 
                 alt="{{ $product->prod_name }}" 
                 class="h-12 w-12 object-cover rounded-md">
          </td>
          <td class="px-4 py-2">{{ $product->prod_name }}</td>
          <td class="px-4 py-2">₱{{ number_format($product->price, 2) }}</td>
          <td class="px-4 py-2">{{ $product->quantity }}</td>
          <td class="px-4 py-2">
            <a href="{{ route('shop.product.edit', [$shop->id, $product->id]) }}" 
               class="text-orange-400 hover:underline">Edit</a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="px-4 py-4 text-center text-gray-400">No products yet.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
