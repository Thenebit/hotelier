<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Perfect Hostel | Hostelify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
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
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        .date-input::-webkit-calendar-picker-indicator {
            opacity: 0;
        }
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            background: #4F46E5;
            border-radius: 50%;
            cursor: pointer;
        }
        .map-container {
            background-image: url('https://public.readdy.ai/gen_page/map_placeholder_1280x720.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-['Pacifico'] text-primary">Hostelify</a>
                    <nav class="hidden md:flex ml-10 space-x-8">
                        <a href="#" class="text-gray-700 hover:text-primary">Home</a>
                        <a href="#" class="text-gray-700 hover:text-primary">About</a>
                        <a href="#" class="text-gray-700 hover:text-primary">Contact</a>
                    </nav>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-700 hover:text-primary">
                        <i class="ri-heart-line ri-lg"></i>
                    </button>
                    <button class="text-gray-700 hover:text-primary">
                        <i class="ri-user-line ri-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-24 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                <div class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <div class="relative">
                            <i class="ri-map-pin-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Where are you going?" class="w-full pl-10 pr-4 py-2 border rounded !rounded-button focus:outline-none focus:border-primary">
                        </div>
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <div class="relative">
                            <i class="ri-calendar-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="date" class="w-full pl-10 pr-4 py-2 border rounded !rounded-button focus:outline-none focus:border-primary date-input">
                        </div>
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <div class="relative">
                            <i class="ri-team-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select class="w-full pl-10 pr-8 py-2 border rounded !rounded-button focus:outline-none focus:border-primary appearance-none">
                                <option>1 in a Room</option>
                                <option>2 in a Room</option>
                                <option>3 in a Room</option>
                                <option>4 in a Room</option>
                                <option>5 in a Room</option>
                                <option>6 in a Room</option>
                            </select>
                        </div>
                    </div>
                    <button class="bg-primary text-white px-8 py-2 !rounded-button hover:bg-primary/90 whitespace-nowrap">
                        Search
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap gap-6">
                <div class="w-full lg:w-[65%]">
                    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex gap-2">
                                <button class="px-4 py-1 rounded-full bg-primary/10 text-primary text-sm">All</button>
                                <button class="px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm hover:bg-primary/10 hover:text-primary">Hostels</button>
                                <button class="px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-sm hover:bg-primary/10 hover:text-primary">Guesthouses</button>
                            </div>
                            <div class="relative">
                                <select class="pl-4 pr-8 py-1 border rounded !rounded-button focus:outline-none focus:border-primary appearance-none">
                                    <option>Sort by: Recommended</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Rating</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex gap-4 p-4 border rounded-lg hover:shadow-md transition-shadow cursor-pointer">
                                <div class="w-48 h-32 rounded-lg overflow-hidden">
                                    <img src="https://public.readdy.ai/ai/img_res/a16cef90cf16f888d4f67d265b55961a.jpg" class="w-full h-full object-cover" alt="Hostel">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold">Elite Hostel</h3>
                                            <p class="text-gray-600">KTU Junction 4, Koforidua, Ghana</p>
                                        </div>
                                        <div class="flex items-center bg-primary text-white px-2 py-1 rounded">
                                            <span class="font-semibold">7.5</span>
                                            <span class="ml-1 text-sm">Good</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Free WiFi</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Kitchen</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Lockers</span>
                                    </div>
                                    <div class="mt-4 flex items-end justify-between">
                                        <div class="flex items-center gap-2">
                                            <img src="https://public.readdy.ai/ai/img_res/451e509047b0f67abb34d2e41a765aa5.jpg" class="w-8 h-8 rounded-full" alt="User">
                                            <div class="text-sm">
                                                <p class="text-gray-700">"Amazing atmosphere and friendly staff!"</p>
                                                <p class="text-gray-500">Sarah Yaa Ofosuwaa - 2 days ago</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">from</p>
                                            <p class="text-xl font-semibold text-primary">GHS 2500 - 5000/year</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 border rounded-lg hover:shadow-md transition-shadow cursor-pointer">
                                <div class="w-48 h-32 rounded-lg overflow-hidden">
                                    <img src="https://public.readdy.ai/ai/img_res/e2525067021d5dd9944538e6b430b7a9.jpg" class="w-full h-full object-cover" alt="Hostel">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold">Starland Hostel</h3>
                                            <p class="text-gray-600">KTU Junction 4, Koforidua, Ghana</p>
                                        </div>
                                        <div class="flex items-center bg-primary text-white px-2 py-1 rounded">
                                            <span class="font-semibold">8.9</span>
                                            <span class="ml-1 text-sm">Very Good</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Fully Furnished Rooms</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Gym and Laundry Services</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">24/7 Reception</span>
                                    </div>
                                    <div class="mt-4 flex items-end justify-between">
                                        <div class="flex items-center gap-2">
                                            <img src="https://public.readdy.ai/ai/img_res/78d8a1ffa4412400ac785e69c3a4487d.jpg" class="w-8 h-8 rounded-full" alt="User">
                                            <div class="text-sm">
                                                <p class="text-gray-700">"Great location and value for money!"</p>
                                                <p class="text-gray-500">Michael Akrobo - 1 week ago</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">from</p>
                                            <p class="text-xl font-semibold text-primary">GHS 3800 - 7500/year</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 p-4 border rounded-lg hover:shadow-md transition-shadow cursor-pointer">
                                <div class="w-48 h-32 rounded-lg overflow-hidden">
                                    <img src="https://maps.app.goo.gl/iDRpJzPXqYF1fBZx5" class="w-full h-full object-cover" alt="Hostel">
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold">Woanoh Hostel</h3>
                                            <p class="text-gray-600">KTU Junction 2, Koforidua, Ghana</p>
                                        </div>
                                        <div class="flex items-center bg-primary text-white px-2 py-1 rounded">
                                            <span class="font-semibold">8.5</span>
                                            <span class="ml-1 text-sm">Exceptional</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Free WiFi</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">Events</span>
                                        <span class="text-sm px-2 py-1 bg-gray-100 rounded-full">3 minutes walk to KTU</span>
                                    </div>
                                    <div class="mt-4 flex items-end justify-between">
                                        <div class="flex items-center gap-2">
                                            <img src="https://public.readdy.ai/ai/img_res/fa4795086ad750dc8fcac2826a078450.jpg" class="w-8 h-8 rounded-full" alt="User">
                                            <div class="text-sm">
                                                <p class="text-gray-700">"Perfect spot for students!"</p>
                                                <p class="text-gray-500">Emmanuel Adu - 3 days ago</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">from</p>
                                            <p class="text-xl font-semibold text-primary">GHS 3500 - 6200 /year</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-[32%]">
                    <div class="sticky top-24">
                        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                            <h3 class="font-semibold mb-4">Filters</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                                    <input type="range" min="0" max="100" value="50" class="w-full h-2 bg-gray-200 rounded-full appearance-none cursor-pointer">
                                    <div class="flex justify-between text-sm text-gray-600 mt-1">
                                        <span>GHS 0</span>
                                        <span>GHS 10000+</span>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Hostels</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Guesthouses</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">B&Bs</span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Amenities</label>
                                    <div class="space-y-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Free WiFi</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Kitchen</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Breakfast Included</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-primary rounded">
                                            <span class="ml-2 text-sm text-gray-700">Air Conditioning</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded !rounded-button hover:bg-gray-200">
                                    Clear All Filters
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="map-container h-[400px] relative">
                                <div class="absolute bottom-4 right-4 flex flex-col gap-2">
                                    <button class="w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50">
                                        <i class="ri-add-line text-gray-700"></i>
                                    </button>
                                    <button class="w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50">
                                        <i class="ri-subtract-line text-gray-700"></i>
                                    </button>
                                    <button class="w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-gray-50">
                                        <i class="ri-map-pin-user-line text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.rounded-full');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-primary/10', 'text-primary');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    this.classList.add('bg-primary/10', 'text-primary');
                });
            });
        });
    </script>
</body>
</html>
