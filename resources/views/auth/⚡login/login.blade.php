<div class="flex items-center justify-center min-h-screen bg-[#1A1A1A] p-4">
  <div class="w-full max-w-md">
    <div class="rounded-2xl shadow-2xl border border-orange-500/30 bg-neutral-900">
      <div class="p-6 sm:p-8">
        <!-- Header -->
        <div class="text-center mb-8">
          <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-orange-600/20 border border-orange-500/30 mb-4">
            <span class="text-3xl">⚒️</span>
          </div>
          <h3 class="text-2xl font-black text-white">
            Sign in
          </h3>
          <p class="text-gray-400 text-sm mt-1">Access your VulcanCing account</p>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="login" class="space-y-5">
          <!-- Email Field -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
              Email Address
            </label>
            <input
              wire:model.defer="email"
              type="email"
              id="email"
              name="email"
              placeholder="you@example.com"
              class="w-full py-3 px-4 bg-neutral-800 border border-gray-700 rounded-xl text-white placeholder:text-gray-500 focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 focus:outline-none transition-all"
              required
            >
            @error('email')
              <span class="text-orange-400 text-sm mt-1 block">{{ $message }}</span>
            @enderror
          </div>

          <!-- Password Field -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <label for="password" class="block text-sm font-medium text-gray-300">
                Password
              </label>
              <a href="#" class="text-xs text-orange-400 hover:text-orange-300 transition">
                Forgot password?
              </a>
            </div>
            <input
              wire:model.defer="password"
              type="password"
              id="password"
              name="password"
              placeholder="Enter your password"
              class="w-full py-3 px-4 bg-neutral-800 border border-gray-700 rounded-xl text-white placeholder:text-gray-500 focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 focus:outline-none transition-all"
              required
            >
            @error('password')
              <span class="text-orange-400 text-sm mt-1 block">{{ $message }}</span>
            @enderror
          </div>

          <!-- Sign In Button -->
          <button
            type="submit"
            class="w-full py-3 px-4 flex items-center justify-center gap-2 text-sm font-bold rounded-xl bg-orange-600 hover:bg-orange-500 text-white transition-all shadow-lg shadow-orange-600/25"
          >
            <span>🔓</span>
            Sign in
          </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-800"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-3 bg-neutral-900 text-gray-500">or</span>
          </div>
        </div>

        <!-- Sign Up Link -->
        <div class="text-center">
          <p class="text-gray-400 text-sm">
            Don't have an account?
            <a href="#" class="text-orange-400 font-semibold hover:text-orange-300 transition">
              Create an account
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
