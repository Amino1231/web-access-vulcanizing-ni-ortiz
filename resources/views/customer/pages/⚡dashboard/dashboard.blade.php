
  <div class="min-h-screen flex flex-col px-6 py-12 space-y-12">

    <!-- Welcome Hero -->
    <section class="text-center">
      <h1 class="text-4xl md:text-5xl font-black text-white">
        Welcome back, <span class="text-orange-500">{{ Auth::user()->name }}</span>
      </h1>
      <p class="mt-4 text-gray-300 text-lg">
        Ready to book your next vulcanizing service? Fast, tough, and secure.
      </p>
    </section>

    <!-- Quick Actions -->
    <section class="grid md:grid-cols-3 gap-6">
      <a href="#"
         class="flex flex-col items-center justify-center bg-neutral-900 border border-gray-800 hover:border-orange-500 rounded-2xl p-8 shadow-xl transition hover:-translate-y-2">
        <div class="text-5xl mb-4">🛠️</div>
        <h3 class="text-xl font-bold text-white">Book Service</h3>
        <p class="text-gray-400 mt-2 text-sm">Instantly schedule tire repair or replacement.</p>
      </a>

      <a href="#"
         class="flex flex-col items-center justify-center bg-neutral-900 border border-gray-800 hover:border-orange-500 rounded-2xl p-8 shadow-xl transition hover:-translate-y-2">
        <div class="text-5xl mb-4">📋</div>
        <h3 class="text-xl font-bold text-white">My Queues</h3>
        <p class="text-gray-400 mt-2 text-sm">Track your ongoing and past service requests.</p>
      </a>

      <a href="#"
         class="flex flex-col items-center justify-center bg-neutral-900 border border-gray-800 hover:border-orange-500 rounded-2xl p-8 shadow-xl transition hover:-translate-y-2">
        <div class="text-5xl mb-4">⭐</div>
        <h3 class="text-xl font-bold text-white">Leave a Review</h3>
        <p class="text-gray-400 mt-2 text-sm">Share your experience and rate our service.</p>
      </a>
    </section>

    <!-- Trust Badges -->
    <section class="bg-[#1A1A1A] rounded-3xl p-8 border border-orange-500/20 text-center">
      <div class="flex justify-center gap-6 mb-4">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbOsJUPXMDaZXyJA2PxFYv2gEVkGofB0fsyQ&s" alt="Visa" class="h-6 sm:h-7 opacity-75">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="Mastercard" class="h-6 sm:h-7 opacity-75">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrmT1vXEF8onizM1eH90e4On2FWeLtcgO4OQ&s" alt="PayPal" class="h-6 sm:h-7 opacity-75">
      </div>
      <p class="text-xs sm:text-sm text-gray-400">Secure Payments</p>
      <p class="text-xs text-orange-400 font-medium">VISA • MASTERCARD • PAYPAL</p>
    </section>
  </div>
