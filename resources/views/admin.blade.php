<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <aside class="w-64 bg-white shadow-lg fixed h-full lg:block md:hidden sm:hidden">
            <div class="p-4 border-b">
                <h1 class="font-['Pacifico'] text-2xl text-primary">Hostelify</h1>
            </div>
            <nav class="p-4">
                <div class="space-y-2">
                    <a href="#" onclick="showDashboard()" class="nav-item flex items-center p-3 text-gray-700 bg-gray-100 rounded-button">
                        <i class="ri-dashboard-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="#" onclick="showHostels()" class="nav-item flex items-center p-3 text-gray-600 hover:bg-gray-100 rounded-button">
                        <i class="ri-hotel-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Hostels</span>
                    </a>
                    <a href="#" onclick="showBookings()" class="nav-item flex items-center p-3 text-gray-600 hover:bg-gray-100 rounded-button">
                        <i class="ri-calendar-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Bookings</span>
                    </a>
                    <a href="#" onclick="showUsers()" class="nav-item flex items-center p-3 text-gray-600 hover:bg-gray-100 rounded-button">
                        <i class="ri-user-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Users</span>
                    </a>
                    <a href="#" onclick="showReports()" class="nav-item flex items-center p-3 text-gray-600 hover:bg-gray-100 rounded-button">
                        <i class="ri-file-chart-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Reports</span>
                    </a>
                    <a href="#" onclick="showSettings()" class="nav-item flex items-center p-3 text-gray-600 hover:bg-gray-100 rounded-button">
                        <i class="ri-settings-line w-5 h-5 flex items-center justify-center"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                </div>
                <script>
                    function updateNavActiveState(clickedItem) {
                        document.querySelectorAll('.nav-item').forEach(item => {
                            item.classList.remove('bg-gray-100', 'text-gray-700');
                            item.classList.add('text-gray-600');
                        });
                        clickedItem.classList.remove('text-gray-600');
                        clickedItem.classList.add('bg-gray-100', 'text-gray-700');
                    }
                    function showDashboard() {
                        updateNavActiveState(event.currentTarget);
                        document.querySelector('main').style.display = 'block';
                    }
                    function showHostels() {
                        updateNavActiveState(event.currentTarget);
                        const content = `
                            <div class="p-8">
                                <div class="bg-white rounded-lg shadow-sm">
                                    <div class="p-6 border-b">
                                        <div class="flex items-center justify-between">
                                            <h2 class="text-lg font-semibold">All Hostels</h2>
                                            <button onclick="openAddHostelModal()" class="flex items-center px-4 py-2 bg-primary text-white rounded-button">
                                                <i class="ri-add-line w-5 h-5 flex items-center justify-center"></i>
                                                <span class="ml-2">Add New Hostel</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hostel</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Capacity</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Night</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hostelTableBody"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.querySelector('main').innerHTML = content;
                        renderHostelTable();
                    }
                    function showBookings() {
                        updateNavActiveState(event.currentTarget);
                        const content = `
                            <div class="p-8">
                                <div class="bg-white rounded-lg shadow-sm">
                                    <div class="p-6 border-b">
                                        <h2 class="text-lg font-semibold">Recent Bookings</h2>
                                    </div>
                                    <div class="p-6">
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking ID</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Guest</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hostel</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check In</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check Out</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">#BK001</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">John Smith</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">Backpackers Paradise</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">2025-03-10</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">2025-03-15</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Confirmed
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.querySelector('main').innerHTML = content;
                    }
                    function showUsers() {
                        updateNavActiveState(event.currentTarget);
                        const content = `
                            <div class="p-8">
                                <div class="bg-white rounded-lg shadow-sm">
                                    <div class="p-6 border-b">
                                        <h2 class="text-lg font-semibold">User Management</h2>
                                    </div>
                                    <div class="p-6">
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">Sarah Johnson</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">sarah@example.com</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">Admin</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Active
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                            <button class="text-primary hover:text-primary-dark mr-2">
                                                                <i class="ri-edit-line w-5 h-5 flex items-center justify-center"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.querySelector('main').innerHTML = content;
                    }
                    function showReports() {
                        updateNavActiveState(event.currentTarget);
                        const content = `
                            <div class="p-8">
                                <div class="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-6">
                                    <div class="bg-white rounded-lg shadow-sm">
                                        <div class="p-6 border-b">
                                            <h2 class="text-lg font-semibold">Revenue Report</h2>
                                        </div>
                                        <div class="p-6">
                                            <div id="revenueChart" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg shadow-sm">
                                        <div class="p-6 border-b">
                                            <h2 class="text-lg font-semibold">Occupancy Report</h2>
                                        </div>
                                        <div class="p-6">
                                            <div id="occupancyChart" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.querySelector('main').innerHTML = content;
                        const revenueChart = echarts.init(document.getElementById('revenueChart'));
                        const occupancyChart = echarts.init(document.getElementById('occupancyChart'));
                        revenueChart.setOption({
                            animation: false,
                            tooltip: {
                                trigger: 'axis',
                                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                borderColor: '#e5e7eb',
                                textStyle: { color: '#1f2937' }
                            },
                            xAxis: {
                                type: 'category',
                                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
                            },
                            yAxis: {
                                type: 'value'
                            },
                            series: [{
                                data: [15000, 18000, 22000, 20000, 25000, 28000],
                                type: 'bar',
                                color: 'rgba(87, 181, 231, 1)'
                            }]
                        });
                        occupancyChart.setOption({
                            animation: false,
                            tooltip: {
                                trigger: 'item',
                                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                borderColor: '#e5e7eb',
                                textStyle: { color: '#1f2937' }
                            },
                            series: [{
                                type: 'pie',
                                radius: '50%',
                                data: [
                                    { value: 70, name: 'Occupied' },
                                    { value: 30, name: 'Available' }
                                ],
                                color: ['rgba(87, 181, 231, 1)', 'rgba(141, 211, 199, 1)']
                            }]
                        });
                    }
                    function showSettings() {
                        updateNavActiveState(event.currentTarget);
                        const content = `
                            <div class="p-8">
                                <div class="bg-white rounded-lg shadow-sm">
                                    <div class="p-6 border-b">
                                        <h2 class="text-lg font-semibold">Settings</h2>
                                    </div>
                                    <div class="p-6">
                                        <div class="space-y-6">
                                            <div>
                                                <h3 class="text-lg font-medium mb-4">General Settings</h3>
                                                <div class="space-y-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                                                        <input type="text" value="Hostel Admin" class="w-full p-2 border rounded-button">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Time Zone</label>
                                                        <select class="w-full p-2 border rounded-button">
                                                            <option>UTC</option>
                                                            <option>UTC+1</option>
                                                            <option>UTC+2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium mb-4">Email Settings</h3>
                                                <div class="space-y-4">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">SMTP Host</label>
                                                        <input type="text" class="w-full p-2 border rounded-button">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">SMTP Port</label>
                                                        <input type="number" class="w-full p-2 border rounded-button">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-4">
                                                <button class="px-4 py-2 bg-primary text-white rounded-button">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.querySelector('main').innerHTML = content;
                    }
                </script>
            </nav>
            <div class="absolute bottom-0 w-full p-4 border-t">
                <button onclick="handleLogout()" class="flex items-center justify-center w-full p-3 text-red-600 hover:bg-red-50 rounded-button">
                    <i class="ri-logout-box-line w-5 h-5 flex items-center justify-center"></i>
                    <span class="ml-3">Logout</span>
                </button>
            </div>
        </aside>
        <main class="flex-1 lg:ml-64 md:ml-0 sm:ml-0">
            <header class="bg-white shadow-sm relative">
                <button onclick="toggleSidebar()" class="lg:hidden absolute left-4 top-1/2 -translate-y-1/2">
                    <i class="ri-menu-line w-6 h-6 flex items-center justify-center"></i>
                </button>
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex items-center flex-1 max-w-lg ml-12 lg:ml-0">
                        <div class="relative w-full">
                            <input type="text" placeholder="Search hostels..." class="w-full pl-10 pr-4 py-2 border rounded-button focus:outline-none focus:border-primary">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5 flex items-center justify-center"></i>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-button">
                            <i class="ri-notification-line w-6 h-6 flex items-center justify-center"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="relative" id="userDropdown">
                            <button onclick="toggleDropdown()" class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-button">
                                <img src="https://public.readdy.ai/ai/img_res/8c3e14c3e706d43859312fb279c3ebf6.jpg" class="w-8 h-8 rounded-full object-cover">
                                <span class="text-sm font-medium">James Wilson</span>
                                <i class="ri-arrow-down-s-line w-5 h-5 flex items-center justify-center"></i>
                            </button>
                            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <hr class="my-1">
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="p-8">
                <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Hostels</p>
                                <h3 class="text-2xl font-semibold mt-1">156</h3>
                            </div>
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="ri-hotel-line text-blue-600 w-6 h-6 flex items-center justify-center"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-600 mt-4">
                            <i class="ri-arrow-up-line"></i>
                            <span>12% from last month</span>
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Active Bookings</p>
                                <h3 class="text-2xl font-semibold mt-1">892</h3>
                            </div>
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="ri-calendar-check-line text-green-600 w-6 h-6 flex items-center justify-center"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-600 mt-4">
                            <i class="ri-arrow-up-line"></i>
                            <span>8% from last month</span>
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Monthly Revenue</p>
                                <h3 class="text-2xl font-semibold mt-1">$89,245</h3>
                            </div>
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="ri-money-dollar-circle-line text-purple-600 w-6 h-6 flex items-center justify-center"></i>
                            </div>
                        </div>
                        <p class="text-sm text-green-600 mt-4">
                            <i class="ri-arrow-up-line"></i>
                            <span>15% from last month</span>
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Occupancy Rate</p>
                                <h3 class="text-2xl font-semibold mt-1">78%</h3>
                            </div>
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="ri-pie-chart-line text-yellow-600 w-6 h-6 flex items-center justify-center"></i>
                            </div>
                        </div>
                        <p class="text-sm text-red-600 mt-4">
                            <i class="ri-arrow-down-line"></i>
                            <span>3% from last month</span>
                        </p>
                    </div>
                </div>
                <div class="grid lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1 gap-6 mb-8">
                    <div class="lg:col-span-2 md:col-span-1 sm:col-span-1 bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold">Booking Trends</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-gray-100 rounded-full">Weekly</button>
                                <button class="px-3 py-1 text-sm text-white bg-primary rounded-full">Monthly</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 rounded-full">Yearly</button>
                            </div>
                        </div>
                        <div id="bookingTrends" style="height: 300px;"></div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-lg font-semibold mb-6">Hostel Distribution</h2>
                        <div id="hostelDistribution" style="height: 300px;"></div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold">Recent Hostels</h2>
                            <button onclick="openAddHostelModal()" class="flex items-center px-4 py-2 bg-primary text-white rounded-button whitespace-nowrap">
                                <i class="ri-add-line w-5 h-5 flex items-center justify-center"></i>
                                <span class="ml-2">Add New Hostel</span>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hostel</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price/Night</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="hostelTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Showing <span>1</span> to <span>10</span> of <span>156</span> entries
                            </p>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border rounded-button hover:bg-gray-50">Previous</button>
                                <button class="px-3 py-1 text-white bg-primary rounded-button">1</button>
                                <button class="px-3 py-1 border rounded-button hover:bg-gray-50">2</button>
                                <button class="px-3 py-1 border rounded-button hover:bg-gray-50">3</button>
                                <button class="px-3 py-1 border rounded-button hover:bg-gray-50">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="addHostelModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-2xl">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold">Add New Hostel</h3>
            </div>
            <form id="addHostelForm" class="p-6">
                <div class="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hostel Name</label>
                        <input type="text" class="w-full p-2 border rounded-button" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" class="w-full p-2 border rounded-button" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Capacity</label>
                        <input type="number" class="w-full p-2 border rounded-button" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price per Year</label>
                        <input type="number" class="w-full p-2 border rounded-button" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea class="w-full p-2 border rounded-button" rows="4" required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeAddHostelModal()" class="px-4 py-2 border rounded-button">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-button">Add Hostel</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        }

        window.addEventListener('resize', function() {
            const sidebar = document.querySelector('aside');
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
            }
        });

        const mockHostels = [
            { name: "Backpackers Paradise", location: "London, UK", capacity: 120, price: 25, status: "Active" },
            { name: "City Central Hostel", location: "Paris, France", capacity: 85, price: 30, status: "Active" },
            { name: "Seaside Haven", location: "Barcelona, Spain", capacity: 95, price: 28, status: "Maintenance" },
            { name: "Mountain View Lodge", location: "Zurich, Switzerland", capacity: 75, price: 35, status: "Active" },
            { name: "Urban Oasis", location: "Berlin, Germany", capacity: 110, price: 27, status: "Active" }
        ];

        function editHostel(button) {
            const row = button.closest('tr');
            const hostelName = row.querySelector('td:first-child div').textContent;
            openAddHostelModal();
            const form = document.getElementById('addHostelForm');
            const inputs = form.querySelectorAll('input, textarea');
            const hostel = mockHostels.find(h => h.name === hostelName);
            inputs[0].value = hostel.name;
            inputs[1].value = hostel.location;
            inputs[2].value = hostel.capacity;
            inputs[3].value = hostel.price;
            inputs[4].value = "Sample description for " + hostel.name;
        }

        function deleteHostel(button) {
            const row = button.closest('tr');
            const hostelName = row.querySelector('td:first-child div').textContent;
            const confirmDialog = document.createElement('div');
            confirmDialog.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
            confirmDialog.innerHTML = `
                <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
                    <h3 class="text-lg font-semibold mb-4">Delete Hostel</h3>
                    <p class="text-gray-600 mb-6">Are you sure you want to delete "${hostelName}"?</p>
                    <div class="flex justify-end space-x-3">
                        <button onclick="this.parentElement.parentElement.parentElement.remove()" class="px-4 py-2 border rounded-button">Cancel</button>
                        <button onclick="confirmDelete(this, '${hostelName}')" class="px-4 py-2 bg-red-600 text-white rounded-button">Delete</button>
                    </div>
                </div>
            `;
            document.body.appendChild(confirmDialog);
        }

        function confirmDelete(button, hostelName) {
            const index = mockHostels.findIndex(h => h.name === hostelName);
            if (index > -1) {
                mockHostels.splice(index, 1);
                renderHostelTable();
                const successMessage = document.createElement('div');
                successMessage.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
                successMessage.textContent = 'Hostel deleted successfully!';
                document.body.appendChild(successMessage);
                setTimeout(() => successMessage.remove(), 3000);
            }
            button.parentElement.parentElement.parentElement.remove();
        }

        function renderHostelTable() {
            const tableBody = document.getElementById('hostelTableBody');
            tableBody.innerHTML = mockHostels.map(hostel => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${hostel.name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">${hostel.location}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${hostel.capacity} beds</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">$${hostel.price}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${
                            hostel.status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'
                        }">
                            ${hostel.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <button onclick="editHostel(this)" class="text-primary hover:text-primary-dark transition-colors duration-200 p-1 rounded hover:bg-primary/10">
                                <i class="ri-edit-line w-5 h-5 flex items-center justify-center"></i>
                            </button>
                            <button onclick="deleteHostel(this)" class="text-red-600 hover:text-red-700 transition-colors duration-200 p-1 rounded hover:bg-red-50">
                                <i class="ri-delete-bin-line w-5 h-5 flex items-center justify-center"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function initializeCharts() {
            const bookingTrends = echarts.init(document.getElementById('bookingTrends'));
            const hostelDistribution = echarts.init(document.getElementById('hostelDistribution'));

            const bookingTrendsOption = {
                animation: false,
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    borderColor: '#e5e7eb',
                    textStyle: { color: '#1f2937' }
                },
                grid: { top: 10, right: 30, bottom: 20, left: 30 },
                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    axisLine: { lineStyle: { color: '#e5e7eb' } }
                },
                yAxis: {
                    type: 'value',
                    axisLine: { show: false },
                    splitLine: { lineStyle: { color: '#f3f4f6' } }
                },
                series: [{
                    data: [820, 932, 901, 934, 1290, 1330],
                    type: 'line',
                    smooth: true,
                    symbolSize: 0,
                    lineStyle: { width: 3 },
                    color: 'rgba(87, 181, 231, 1)',
                    areaStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: 'rgba(87, 181, 231, 0.1)'
                        }, {
                            offset: 1,
                            color: 'rgba(87, 181, 231, 0)'
                        }])
                    }
                }]
            };

            const hostelDistributionOption = {
                animation: false,
                tooltip: {
                    trigger: 'item',
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    borderColor: '#e5e7eb',
                    textStyle: { color: '#1f2937' }
                },
                series: [{
                    type: 'pie',
                    radius: ['60%', '80%'],
                    data: [
                        { value: 35, name: 'London' },
                        { value: 25, name: 'Paris' },
                        { value: 20, name: 'Berlin' },
                        { value: 15, name: 'Barcelona' }
                    ],
                    color: ['rgba(87, 181, 231, 1)', 'rgba(141, 211, 199, 1)', 'rgba(251, 191, 114, 1)', 'rgba(252, 141, 98, 1)']
                }]
            };

            bookingTrends.setOption(bookingTrendsOption);
            hostelDistribution.setOption(hostelDistributionOption);
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function openAddHostelModal() {
            document.getElementById('addHostelModal').classList.remove('hidden');
            document.getElementById('addHostelModal').classList.add('flex');
        }

        function closeAddHostelModal() {
            document.getElementById('addHostelModal').classList.add('hidden');
            document.getElementById('addHostelModal').classList.remove('flex');
        }

        function handleLogout() {
            const confirmDialog = document.createElement('div');
            confirmDialog.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center';
            confirmDialog.innerHTML = `
                <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
                    <h3 class="text-lg font-semibold mb-4">Confirm Logout</h3>
                    <p class="text-gray-600 mb-6">Are you sure you want to logout?</p>
                    <div class="flex justify-end space-x-3">
                        <button onclick="this.parentElement.parentElement.parentElement.remove()" class="px-4 py-2 border rounded-button">Cancel</button>
                        <button onclick="window.location.href='/logout'" class="px-4 py-2 bg-red-600 text-white rounded-button">Logout</button>
                    </div>
                </div>
            `;
            document.body.appendChild(confirmDialog);
        }

        document.getElementById('addHostelForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const successMessage = document.createElement('div');
            successMessage.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
            successMessage.textContent = 'Hostel added successfully!';
            document.body.appendChild(successMessage);
            setTimeout(() => successMessage.remove(), 3000);
            closeAddHostelModal();
        });

        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdownMenu');
            const userDropdown = document.getElementById('userDropdown');
            if (!userDropdown.contains(e.target) && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });

        window.addEventListener('load', function() {
            renderHostelTable();
            initializeCharts();
        });
    </script>
</body>
</html>