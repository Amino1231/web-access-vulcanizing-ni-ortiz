<div class="max-w-7xl mx-auto px-6 py-12 space-y-12">

    <!-- Hero -->
    <section class="text-center">
        <h1 class="text-4xl md:text-5xl font-black text-white">
            Welcome, <span class="text-orange-500">{{ Auth::user()->name }}</span>
        </h1>
        <p class="mt-4 text-gray-300 text-lg">
            Manage your jobs, queues, and shop performance in real-time.
        </p>
    </section>

    <!-- Stats Grid -->
    <section class="grid md:grid-cols-4 gap-6">
        <div class="bg-neutral-900 border border-gray-800 rounded-2xl p-6 text-center shadow-xl">
            <p class="text-orange-400 uppercase text-xs">Active Queues</p>
            <h2 class="text-3xl font-bold text-white mt-2">3</h2>
        </div>
        <div class="bg-neutral-900 border border-gray-800 rounded-2xl p-6 text-center shadow-xl">
            <p class="text-orange-400 uppercase text-xs">Completed Jobs</p>
            <h2 class="text-3xl font-bold text-white mt-2">5</h2>
        </div>
        <div class="bg-neutral-900 border border-gray-800 rounded-2xl p-6 text-center shadow-xl">
            <p class="text-orange-400 uppercase text-xs">Pending</p>
            <h2 class="text-3xl font-bold text-white mt-2">3</h2>
        </div>
        <div class="bg-neutral-900 border border-gray-800 rounded-2xl p-6 text-center shadow-xl">
            <p class="text-orange-400 uppercase text-xs">Shop</p>
            <h2 class="text-3xl font-bold text-white mt-2">Gwapo si Ortiz</h2>
        </div>
    </section>

    <!-- Queues Section -->
    <section class="bg-[#1A1A1A] rounded-3xl p-8 border border-orange-500/20">
        <h2 class="text-2xl font-bold text-white mb-6">Current Queues</h2>
        <div class="space-y-4">
            {{-- @foreach($queues as $queue) --}}
            <div
                class="flex justify-between items-center bg-neutral-900 p-4 rounded-xl border border-gray-800 hover:border-orange-500 transition">
                <div>
                    <p class="text-white font-semibold">BASKING</p>
                    <p class="text-gray-400 text-sm">Status: Pending</p>
                </div>
                <a href="#" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-500 transition">
                    View
                </a>
            </div>
            {{-- @endforeach --}}
        </div>
    </section>
</div>