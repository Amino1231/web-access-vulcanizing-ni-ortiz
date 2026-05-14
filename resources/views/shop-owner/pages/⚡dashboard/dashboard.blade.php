<div>
    <!-- Content -->
    <div class="w-full shrink-0 p-4 sm:p-6 lg:p-8 flex-wrap px-7 bg-gradient-to-br from-orange-600/20 via-transparent to-transparent">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">

                <!-- Total Customers Card -->
                <div class="flex flex-col justify-center border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase text-orange-400">
                                Total Customers
                            </p>
                        </div>
                        <div class="mt-1 flex items-center justify-between">
                            <h3 class="text-xl sm:text-2xl font-medium text-white">
                                0
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Total Shop Card -->
                <div class="flex flex-col justify-center border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase text-orange-400">
                                Total Shops
                            </p>
                        </div>
                        <div class="mt-1 flex items-center justify-between">
                            <h3 class="text-xl sm:text-2xl font-medium text-white">
                                0
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Total Shop Owner Card -->
                <div class="flex flex-col justify-center border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase text-orange-400">
                                Total Shop Owners
                            </p>
                        </div>
                        <div class="mt-1 flex items-center justify-between">
                            <h3 class="text-xl sm:text-2xl font-medium text-white">
                                0
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Total Faculty Members Card -->
                <div class="flex flex-col justify-center border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase text-orange-400">
                                Total Pending Shop Owners
                            </p>
                        </div>
                        <div class="mt-1 flex items-center justify-between">
                            <h3 class="text-xl sm:text-2xl font-medium text-white">
                                0
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <!-- Income Card -->
                <div class="p-4 md:p-5 min-h-102.5 flex flex-col border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="flex flex-wrap justify-between items-center gap-2">
                        <h2 class="text-sm text-orange-400">Income</h2>
                        <p class="text-xl sm:text-2xl font-medium text-white">₱0.00</p>
                    </div>
                    <div id="hs-multiple-bar-charts">
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>

                <!-- Visitors Card -->
                <div class="p-4 md:p-5 min-h-102.5 flex flex-col border border-gray-800 bg-neutral-900/60 shadow-2xl rounded-2xl">
                    <div class="flex flex-wrap justify-between items-center gap-2">
                        <h2 class="text-sm text-orange-400">Visitors</h2>
                        <p class="text-xl sm:text-2xl font-medium text-white">0</p>
                    </div>
                    <div id="hs-single-area-chart">
                        <canvas id="visitorsChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- End Charts Grid -->
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Income Chart
    const ctxIncome = document.getElementById('incomeChart').getContext('2d');
    new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Monthly Income',
                data: [8000, 12000, 7000, 9000, 9000], // static values
                backgroundColor: 'rgba(255, 159, 64, 0.8)',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return '₱' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Visitors Chart
    const ctxVisitors = document.getElementById('visitorsChart').getContext('2d');
    new Chart(ctxVisitors, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Monthly Visitors',
                data: [120, 200, 150, 180, 220], // static values
                borderColor: 'rgba(54, 162, 235, 0.8)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return value + ' visitors';
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush