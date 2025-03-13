<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hostelify - Your Home Away From Home</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
        <style>
            :where([class^="ri-"])::before { content: "\f3c2"; }
            .date-input::-webkit-calendar-picker-indicator {
                opacity: 0;
            }
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 3px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #c1c1c1;
                border-radius: 3px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #a8a8a8;
            }
        </style>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#2563eb',
                            secondary: '#64748b'
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
    </head>
    <body class="bg-white min-h-screen">
        <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-white shadow-lg transform translate-y-full transition-transform duration-300 z-50">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <p class="text-sm text-gray-600">We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.</p>
                <button onclick="acceptCookies()" class="ml-4 px-4 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">Accept</button>
            </div>
        </div>
        <nav class="fixed top-0 left-0 right-0 bg-white shadow-sm z-40">
            <div class="container mx-auto px-4">
                <div class="h-16 flex items-center justify-between">
                    <a href="#" class="font-['Pacifico'] text-2xl text-primary">Hostelify</a>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="text-gray-700 hover:text-primary">Home</a>
                        <a href="/booking" class="text-gray-700 hover:text-primary">Rooms</a>
                        <a href="/about" class="text-gray-700 hover:text-primary">About</a>
                        <a href="/contact" class="text-gray-700 hover:text-primary">Contact</a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 flex items-center justify-center cursor-pointer">
                            <i class="ri-user-line text-xl text-gray-700"></i>
                        </div>
                        <a href="/booking" class="hidden md:block px-6 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">Book Now</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="pt-16">
            <div class="relative h-[600px] bg-cover bg-center" style="background-image: url('https://public.readdy.ai/ai/img_res/82292aa1b287ddc8a3582adcbd8c0d1e.jpg')">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="container mx-auto px-4 h-full flex items-center">
                    <div class="relative z-10 max-w-2xl">
                        <h1 class="text-5xl font-bold text-white mb-6">Experience the Perfect Blend of Comfort & Adventure</h1>
                        <p class="text-xl text-white mb-8">Your home away from home in the heart of the city. Meet fellow travelers and create unforgettable memories.</p>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-4 -mt-24 relative z-20">
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Check-in</label>
                            <div class="relative">
                                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary date-input" min="2025-03-05">
                                <div class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <i class="ri-calendar-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Check-out</label>
                            <div class="relative">
                                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary date-input" min="2025-03-06">
                                <div class="absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <i class="ri-calendar-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Number per Room</label>
                            <div class="relative" id="guests-selector">
                                <button class="w-full px-4 py-2 border border-gray-300 rounded text-left flex items-center justify-between">
                                    <span>2 Persons</span>
                                    <i class="ri-arrow-down-s-line"></i>
                                </button>
                                <div class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded shadow-lg z-10">
                                    <div class="p-4">
                                        <div class="flex items-center justify-between">
                                            <span>Persons</span>
                                            <div class="flex items-center space-x-3">
                                                <button class="w-8 h-8 flex items-center justify-center border rounded-full" onclick="updatePersons(-1)">-</button>
                                                <span id="persons-count">2</span>
                                                <button class="w-8 h-8 flex items-center justify-center border rounded-full" onclick="updatePersons(1)">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="px-6 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer h-[42px] mt-7">Search Availability</button>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-3xl font-bold text-center mb-12">Featured Hostels</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://public.readdy.ai/ai/img_res/2a2b64f026522f592c0ed6091ed61061.jpg" alt="Urban Backpackers" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Starland Hostel</h3>
                            <div class="flex items-center mb-4">
                                <i class="ri-map-pin-line mr-2"></i>
                                <span>Luxury and Comfort</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <i class="ri-group-line mr-2"></i>
                                <span>5mins walk off campus</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-primary font-semibold">From 3500 - 7000 GHS/year</div>
                                <button class="px-4 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://public.readdy.ai/ai/img_res/1fdedf6ca7ac4ca12c1533189ca4398b.jpg" alt="Boutique Haven" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Getfund Hostel</h3>
                            <div class="flex items-center mb-4">
                                <i class="ri-star-line mr-2"></i>
                                <span>On Campus Experience</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <i class="ri-hotel-line mr-2"></i>
                                <span>Affordable and Comfortable</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-primary font-semibold">From 1800 - 2200 GHS/year</div>
                                <button class="px-4 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://public.readdy.ai/ai/img_res/a8fa792972a1b7aa3515fc748c1f56d3.jpg" alt="Eco Lodge" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Woanoh Hostel</h3>
                            <div class="flex items-center mb-4">
                                <i class="ri-leaf-line mr-2"></i>
                                <span>Vibrant Atmosphere</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <i class="ri-plant-line mr-2"></i>
                                <span>Comfortable and Close to Campus</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-primary font-semibold">From 3200 - 6200 GHS/year</div>
                                <button class="px-4 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 py-16">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center mb-12">Hostel Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <i class="ri-time-line text-4xl text-primary"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">24/7 Reception</h3>
                            <p class="text-gray-600">Our friendly staff is always here to help you, day or night</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <i class="ri-wifi-line text-4xl text-primary"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Free Wi-Fi</h3>
                            <p class="text-gray-600">High-speed internet access throughout the property</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <i class="ri-restaurant-line text-4xl text-primary"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Community Kitchen</h3>
                            <p class="text-gray-600">Fully equipped kitchen for all your cooking needs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-3xl font-bold text-center mb-12">What Our Guests Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <img src="https://public.readdy.ai/ai/img_res/e596f56f8c1f99098e77c4d189f45022.jpg" alt="Sarah Yaa Ofosuwaa" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-4">
                                <h4 class="font-semibold">Sarah Yaa Ofosuwaa</h4>
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Amazing atmosphere and friendly staff! The common areas are perfect for meeting other travelers. Will definitely come back!"</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <img src="https://public.readdy.ai/ai/img_res/1812c213eb22bdbbc694c403965a59f7.jpg" alt="Michael Brown Addo" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-4">
                                <h4 class="font-semibold">Michael Brown Addo</h4>
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-half-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Clean rooms, great location, and excellent value for money. The kitchen facilities are top-notch!"</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <img src="https://public.readdy.ai/ai/img_res/eca665ed65924d3a946109a2a6a608c2.jpg" alt="Emmanuella Ama Johnson" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-4">
                                <h4 class="font-semibold">Emmanuella Ama Johnson</h4>
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Perfect for solo students! The female dorm was very comfortable and I felt completely safe during my stay."</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 py-16">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center mb-12">Location & Surroundings</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div class="h-[400px] rounded-lg overflow-hidden">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2805.4443042027815!2d-0.2653656630048765!3d6.0634522018059815!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sgh!4v1741252041316!5m2!1sen!2sgh" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-6">Perfectly Located in the Heart of the City</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <i class="ri-train-line text-primary"></i>
                                    </div>
                                    <span class="ml-3">5 min walk to Central Station</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <i class="ri-restaurant-2-line text-primary"></i>
                                    </div>
                                    <span class="ml-3">Surrounded by cafes and restaurants</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <i class="ri-museum-line text-primary"></i>
                                    </div>
                                    <span class="ml-3">10 min walk to major attractions</span>
                                </div>
                                <button class="mt-6 px-6 py-2 bg-primary text-white !rounded-button whitespace-nowrap cursor-pointer">Get Directions</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-gray-900 text-white py-12">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <a href="#" class="font-['Pacifico'] text-2xl text-white mb-4 block">Hostelify</a>
                            <p class="text-gray-400">Your home away from home in the heart of the city.</p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Rooms</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white">Book Now</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <i class="ri-map-pin-line mr-2"></i>
                                    <span class="text-gray-400">3P8P+F5F, Koforidua-Nsutam Rd, Koforidua</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="ri-phone-line mr-2"></i>
                                    <span class="text-gray-400">+1 234 567 890</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="ri-mail-line mr-2"></i>
                                    <span class="text-gray-400">hostelify@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                            <p class="text-gray-400 mb-4">Subscribe to get special offers and updates.</p>
                            <form class="flex">
                                <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l focus:outline-none text-gray-900 w-full">
                                <button type="submit" class="px-4 py-2 bg-primary text-white !rounded-r-button whitespace-nowrap cursor-pointer">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 text-sm">&copy; 2025 Hostelify. All rights reserved.</p>
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <div class="w-8 h-8 flex items-center justify-center cursor-pointer">
                                <i class="ri-facebook-fill"></i>
                            </div>
                            <div class="w-8 h-8 flex items-center justify-center cursor-pointer">
                                <i class="ri-instagram-line"></i>
                            </div>
                            <div class="w-8 h-8 flex items-center justify-center cursor-pointer">
                                <i class="ri-twitter-x-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <button id="book-now-float" class="fixed bottom-4 right-4 px-6 py-3 bg-primary text-white rounded-full shadow-lg cursor-pointer hidden md:flex items-center space-x-2">
            <i class="ri-calendar-line"></i>
            <span>Book Now</span>
        </button>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(() => {
                    document.getElementById('cookie-banner').classList.remove('translate-y-full');
                }, 1000);

                const currencySelector = document.getElementById('currency-selector');
                currencySelector.addEventListener('click', function(e) {
                    const dropdown = this.querySelector('div');
                    dropdown.classList.toggle('hidden');
                    e.stopPropagation();
                });

                const guestsSelector = document.getElementById('guests-selector');
                guestsSelector.addEventListener('click', function(e) {
                    const dropdown = this.querySelector('div');
                    dropdown.classList.toggle('hidden');
                    e.stopPropagation();
                });

                document.addEventListener('click', function() {
                    const dropdowns = document.querySelectorAll('.relative div:not(.hidden)');
                    dropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
                });

                window.addEventListener('scroll', function() {
                    const floatButton = document.getElementById('book-now-float');
                    if (window.scrollY > 600) {
                        floatButton.classList.remove('hidden');
                        floatButton.classList.add('flex');
                    } else {
                        floatButton.classList.add('hidden');
                        floatButton.classList.remove('flex');
                    }
                });
            });

            function acceptCookies() {
                document.getElementById('cookie-banner').classList.add('translate-y-full');
            }

            function selectCurrency(currency) {
                const button = document.querySelector('#currency-selector button span');
                button.textContent = currency;
                document.querySelector('#currency-selector div').classList.add('hidden');
            }

            function updatePersons(change) {
                const count = document.getElementById('persons-count');
                let value = parseInt(count.textContent);
                value = Math.max(1, Math.min(6, value + change));
                count.textContent = value;
                document.querySelector('#guests-selector button span').textContent = `${value} Persons`;
            }
        </script>
    </body>
</html>