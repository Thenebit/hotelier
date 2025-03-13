<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostelify - Find Your Perfect Stay</title>
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
        .date-input::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="bg-white shadow-sm fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-2xl font-['Pacifico'] text-primary">Hostelify</h1>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="toggleWishlist()" class="text-gray-600 hover:text-primary flex items-center space-x-1">
                    <i class="ri-heart-line text-xl"></i>
                    <span>Wishlist</span>
                </button>
                <button onclick="toggleAuthModal('login')" class="px-4 py-2 text-primary hover:bg-primary hover:text-white border border-primary rounded-button">Login</button>
                <button onclick="toggleAuthModal('signup')" class="px-4 py-2 bg-primary text-white hover:bg-primary/90 rounded-button">Sign Up</button>
            </div>
        </div>
    </header>
    <main class="pt-24 pb-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
          <div class="relative">
            <i
              class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
            ></i>
            <input
              type="text"
              placeholder="Search by city, university or hostel name"
              class="w-full pl-12 pr-4 py-3 rounded-lg border-none bg-white shadow-sm focus:ring-2 focus:ring-primary"
            />
          </div>
          <div class="flex flex-wrap gap-2 mt-4">
            <button
              onclick="sortByDistance()"
              class="px-4 py-2 bg-white shadow-sm rounded-full hover:bg-primary hover:text-white"
            >
              Near Campus
            </button>
            <button
              onclick="sortByPriceHighToLow()"
              class="px-4 py-2 bg-white shadow-sm rounded-full hover:bg-primary hover:text-white"
            >
              Elite's Choice
            </button>
            <button
              onclick="sortByPrice()"
              class="px-4 py-2 bg-white shadow-sm rounded-full hover:bg-primary hover:text-white"
            >
              Budget Friendly
            </button>
          </div>
        </div>
        <div class="flex gap-8">
          <div class="w-64 flex-shrink-0">
            <div class="bg-white p-6 rounded-lg shadow-sm">
              <h3 class="font-semibold mb-4">Filters</h3>
              <div class="mb-6">
                <h4 class="text-sm font-medium mb-2">Amenities</h4>
                <div class="space-y-2">
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">WiFi</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">Air Conditioning</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">Laundry</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">Study Room</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">Gym</span>
                  </label>
                </div>
              </div>
              <div class="mb-6">
                <h4 class="text-sm font-medium mb-2">Room Type</h4>
                <div class="space-y-2">
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">1 in a Room</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">2 in a Room</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">4 in a Room</span>
                  </label>
                  <label class="flex items-center">
                    <input type="checkbox" class="rounded text-primary" />
                    <span class="ml-2 text-sm">6 in a Room</span>
                  </label>
                </div>
              </div>
              <div>
                <h4 class="text-sm font-medium mb-2">Rating</h4>
                <div class="space-y-2">
                  <label class="flex items-center">
                    <input type="radio" name="rating" class="text-primary" />
                    <span class="ml-2 text-sm flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                    </span>
                  </label>
                  <label class="flex items-center">
                    <input type="radio" name="rating" class="text-primary" />
                    <span class="ml-2 text-sm flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-line text-gray-300"></i>
                    </span>
                  </label>
                  <label class="flex items-center">
                    <input type="radio" name="rating" class="text-primary" />
                    <span class="ml-2 text-sm flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-line text-gray-300"></i>
                      <i class="ri-star-line text-gray-300"></i>
                    </span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="flex-1">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold">Available Hostels</h2>
              <div class="flex items-center space-x-4">
                <button
                  onclick="switchView('grid')"
                  class="flex items-center space-x-1 text-sm"
                  id="gridButton"
                >
                  <i class="ri-layout-grid-line"></i>
                  <span>Grid</span>
                </button>
                <button
                  onclick="switchView('list')"
                  class="flex items-center space-x-1 text-sm text-gray-600"
                  id="listButton"
                >
                  <i class="ri-list-unordered"></i>
                  <span>List</span>
                </button>
              </div>
            </div>
            <script>
              const hostels = [
                {
                  id: 1,
                  name: "Riverside Student Housing",
                  distance: 0.5,
                  rating: 4.8,
                  location: "Near Cambridge University",
                  amenities: ["WiFi", "Gym", "Study Room"],
                  price: 599,
                },
                {
                  id: 2,
                  name: "Central Student Lodge",
                  distance: 1.2,
                  rating: 4.6,
                  location: "5 min from City Center",
                  amenities: ["AC", "Laundry", "WiFi"],
                  price: 499,
                },
                {
                  id: 3,
                  name: "University View Residence",
                  distance: 0.8,
                  rating: 4.9,
                  location: "Next to Science Park",
                  amenities: ["Pool", "Gym", "WiFi"],
                  price: 699,
                },
              ];
              function switchView(view) {
                const gridButton = document.getElementById("gridButton");
                const listButton = document.getElementById("listButton");
                const hostelGrid = document.querySelector(".grid");
                if (view === "grid") {
                  hostelGrid.classList.remove("grid-cols-1");
                  hostelGrid.classList.add("grid-cols-1", "md:grid-cols-2", "lg:grid-cols-3");
                  gridButton.classList.remove("text-gray-600");
                  gridButton.classList.add("text-primary");
                  listButton.classList.remove("text-primary");
                  listButton.classList.add("text-gray-600");
                } else {
                  hostelGrid.classList.remove("md:grid-cols-2", "lg:grid-cols-3");
                  hostelGrid.classList.add("grid-cols-1");
                  listButton.classList.remove("text-gray-600");
                  listButton.classList.add("text-primary");
                  gridButton.classList.remove("text-primary");
                  gridButton.classList.add("text-gray-600");
                }
              }
              function sortByDistance() {
                const sortedHostels = [...hostels].sort((a, b) => a.distance - b.distance);
                const hostelGrid = document.querySelector(".grid");
                hostelGrid.innerHTML = "";
                sortedHostels.forEach((hostel) => {
                  const hostelCard = `
              <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="relative h-48">
              <img src="https://readdy.ai/api/search-image?query=modern student dormitory room interior with minimalist furniture, large windows, natural lighting, clean and organized space, study desk&width=400&height=300&seq=${hostel.id}&orientation=landscape" class="w-full h-full object-cover" alt="Hostel">
              <button onclick="toggleWishlist(this)" class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm">
              <i class="ri-heart-line text-gray-600"></i>
              </button>
              </div>
              <div class="p-4">
              <div class="flex justify-between items-start mb-2">
              <h3 class="font-semibold">${hostel.name}</h3>
              <div class="flex items-center">
              <i class="ri-star-fill text-yellow-400"></i>
              <span class="ml-1 text-sm">${hostel.rating}</span>
              </div>
              </div>
              <p class="text-sm text-gray-600 mb-2">${hostel.location} (${hostel.distance}km from campus)</p>
              <div class="flex flex-wrap gap-2 mb-3">
              ${hostel.amenities.map((amenity) => `<span class="text-xs px-2 py-1 bg-gray-100 rounded-full">${amenity}</span>`).join("")}
              </div>
              <div class="flex justify-between items-center">
              <div>
              <span class="text-lg font-semibold">$${hostel.price}</span>
              <span class="text-sm text-gray-600">/year</span>
              </div>
              <button onclick="viewDetails(${hostel.id})" class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90">View Details</button>
              </div>
              </div>
              </div>
              `;
                  hostelGrid.insertAdjacentHTML("beforeend", hostelCard);
                });
                const notification = document.createElement("div");
                notification.className =
                  "fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50";
                notification.textContent = "Sorted by distance from campus";
                document.body.appendChild(notification);
                setTimeout(() => notification.remove(), 2000);
              }
            </script>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="relative h-48">
                  <img
                    src="https://public.readdy.ai/ai/img_res/32bf51d839a09e76ffb04b61204e048b.jpg"
                    class="w-full h-full object-cover"
                    alt="Hostel"
                  />
                  <button
                    onclick="toggleWishlist(this)"
                    class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm"
                  >
                    <i class="ri-heart-line text-gray-600"></i>
                  </button>
                </div>
                <div class="p-4">
                  <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold">Riverside Student Housing</h3>
                    <div class="flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <span class="ml-1 text-sm">4.8</span>
                    </div>
                  </div>
                  <p class="text-sm text-gray-600 mb-2">
                    Near Cambridge University
                  </p>
                  <div class="flex flex-wrap gap-2 mb-3">
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >WiFi</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >Gym</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >Study Room</span
                    >
                  </div>
                  <div class="flex justify-between items-center">
                    <div>
                      <span class="text-lg font-semibold">$599</span>
                      <span class="text-sm text-gray-600">/year</span>
                    </div>
                    <button
                      onclick="viewDetails(1)"
                      class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90"
                    >
                      View Details
                    </button>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="relative h-48">
                  <img
                    src="https://public.readdy.ai/ai/img_res/597b464b9fa369e38d8de835cb1ed748.jpg"
                    class="w-full h-full object-cover"
                    alt="Hostel"
                  />
                  <button
                    onclick="toggleWishlist(this)"
                    class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm"
                  >
                    <i class="ri-heart-line text-gray-600"></i>
                  </button>
                </div>
                <div class="p-4">
                  <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold">Central Student Lodge</h3>
                    <div class="flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <span class="ml-1 text-sm">4.6</span>
                    </div>
                  </div>
                  <p class="text-sm text-gray-600 mb-2">
                    5 min from City Center
                  </p>
                  <div class="flex flex-wrap gap-2 mb-3">
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >AC</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >Laundry</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >WiFi</span
                    >
                  </div>
                  <div class="flex justify-between items-center">
                    <div>
                      <span class="text-lg font-semibold">$499</span>
                      <span class="text-sm text-gray-600">/year</span>
                    </div>
                    <button
                      onclick="viewDetails(2)"
                      class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90"
                    >
                      View Details
                    </button>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="relative h-48">
                  <img
                    src="https://public.readdy.ai/ai/img_res/6e3235f3ffd36ab529f237414e5b3705.jpg"
                    class="w-full h-full object-cover"
                    alt="Hostel"
                  />
                  <button
                    onclick="toggleWishlist(this)"
                    class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm"
                  >
                    <i class="ri-heart-line text-gray-600"></i>
                  </button>
                </div>
                <div class="p-4">
                  <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold">University View Residence</h3>
                    <div class="flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <span class="ml-1 text-sm">4.9</span>
                    </div>
                  </div>
                  <p class="text-sm text-gray-600 mb-2">Next to Science Park</p>
                  <div class="flex flex-wrap gap-2 mb-3">
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >Pool</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >Gym</span
                    >
                    <span class="text-xs px-2 py-1 bg-gray-100 rounded-full"
                      >WiFi</span
                    >
                  </div>
                  <div class="flex justify-between items-center">
                    <div>
                      <span class="text-lg font-semibold">$699</span>
                      <span class="text-sm text-gray-600">/year</span>
                    </div>
                    <button
                      onclick="viewDetails(3)"
                      class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90"
                    >
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div id="authModal" class="modal">
      <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold" id="modalTitle">Login</h3>
            <button
              onclick="toggleAuthModal()"
              class="text-gray-400 hover:text-gray-600"
            >
              <i class="ri-close-line text-2xl"></i>
            </button>
          </div>
          <form id="authForm" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Email</label
              >
              <input
                type="email"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                required
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Password</label
              >
              <input
                type="password"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                required
              />
            </div>
            <button
              type="submit"
              class="w-full py-2 bg-primary text-white rounded-button hover:bg-primary/90"
            >
              <span id="submitButtonText">Login</span>
            </button>
          </form>
          <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
              <span id="switchText">Don't have an account?</span>
              <button
                onclick="switchAuthMode()"
                class="text-primary hover:underline ml-1"
              >
                <span id="switchButtonText">Sign up</span>
              </button>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="detailsModal" class="modal">
      <div class="fixed inset-0 flex items-center justify-center z-50">
        <div
          class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto"
        >
          <div class="relative">
            <img
              src="https://public.readdy.ai/ai/img_res/120b762eff56d1d0a882f75610236963.jpg"
              class="w-full h-64 object-cover"
              alt="Hostel"
            />
            <button
              onclick="closeDetailsModal()"
              class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm"
            >
              <i class="ri-close-line text-gray-600"></i>
            </button>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-start mb-4">
              <div>
                <h2 class="text-2xl font-semibold">
                  Riverside Student Housing
                </h2>
                <p class="text-gray-600">123 University Avenue, Cambridge</p>
              </div>
              <div class="flex items-center">
                <i class="ri-star-fill text-yellow-400"></i>
                <span class="ml-1">4.8 (234 reviews)</span>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
              <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold mb-2">1 in a Room</h3>
                <p class="text-gray-600 mb-2">
                  Private room with ensuite bathroom
                </p>
                <p class="text-lg font-semibold">$599/year</p>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold mb-2">2 in a Room</h3>
                <p class="text-gray-600 mb-2">
                  Shared room with private bathroom
                </p>
                <p class="text-lg font-semibold">$499/year</p>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-semibold mb-2">4 in a Room</h3>
                <p class="text-gray-600 mb-2">
                  Private studio with kitchenette
                </p>
                <p class="text-lg font-semibold">$799/year</p>
              </div>
            </div>
            <div class="mb-6">
              <h3 class="font-semibold mb-3">Amenities</h3>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex items-center">
                  <i class="ri-wifi-line mr-2"></i>
                  <span>Free WiFi</span>
                </div>
                <div class="flex items-center">
                  <i class="ri-computer-line mr-2"></i>
                  <span>Study Room</span>
                </div>
                <div class="flex items-center">
                  <i class="ri-basketball-line mr-2"></i>
                  <span>Gym</span>
                </div>
                <div class="flex items-center">
                  <i class="ri-t-shirt-line mr-2"></i>
                  <span>Laundry</span>
                </div>
              </div>
            </div>
            <div class="mb-6">
              <h3 class="font-semibold mb-3">Description</h3>
              <p class="text-gray-600">
                Modern student accommodation featuring comfortable rooms,
                excellent amenities, and a prime location near Cambridge
                University. Our facility offers 24/7 security, high-speed
                internet, and dedicated study spaces to support your academic
                success.
              </p>
            </div>
            <div class="mb-6">
              <h3 class="font-semibold mb-3">Reviews</h3>
              <div class="space-y-4">
                <div class="border-b pb-4">
                  <div class="flex items-center mb-2">
                    <span class="font-medium mr-2">Emily Thompson</span>
                    <div class="flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                    </div>
                  </div>
                  <p class="text-gray-600">
                    Excellent facilities and friendly staff. The location is
                    perfect for university access.
                  </p>
                </div>
                <div class="border-b pb-4">
                  <div class="flex items-center mb-2">
                    <span class="font-medium mr-2">Michael Chen</span>
                    <div class="flex items-center">
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-fill text-yellow-400"></i>
                      <i class="ri-star-line text-gray-300"></i>
                    </div>
                  </div>
                  <p class="text-gray-600">
                    Great amenities and study environment. The WiFi could be
                    better during peak hours.
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-6">
              <h3 class="font-semibold mb-3">Hostel Manager Contact</h3>
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center mb-3">
                  <img
                    src="https://public.readdy.ai/ai/img_res/6b47ae6bedc56e00a6a8b9329b9311ca.jpg"
                    alt="Manager"
                    class="w-12 h-12 rounded-full object-cover mr-3"
                  />
                  <div>
                    <h4 class="font-medium">Sarah Anderson</h4>
                    <p class="text-sm text-gray-600">Hostel Manager</p>
                  </div>
                </div>
                <div class="space-y-2">
                  <div class="flex items-center">
                    <i class="ri-phone-line w-5 h-5 text-gray-400 mr-2"></i>
                    <span class="text-gray-600">+44 20 7123 4567</span>
                  </div>
                  <div class="flex items-center">
                    <i class="ri-mail-line w-5 h-5 text-gray-400 mr-2"></i>
                    <span class="text-gray-600"
                      >sarah.anderson@riverside-housing.com</span
                    >
                  </div>
                  <div class="flex items-center">
                    <i class="ri-time-line w-5 h-5 text-gray-400 mr-2"></i>
                    <span class="text-gray-600"
                      >Available: Mon-Fri, 9:00 AM - 6:00 PM</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <button
              onclick="window.location.href='tel:+442071234567'"
              class="w-full py-3 bg-primary text-white rounded-button hover:bg-primary/90"
            >
              <i class="ri-phone-line mr-2"></i>
              Contact Manager Now
            </button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function toggleAuthModal(mode = null) {
        const modal = document.getElementById("authModal");
        const modalTitle = document.getElementById("modalTitle");
        const submitButtonText = document.getElementById("submitButtonText");
        const switchText = document.getElementById("switchText");
        const switchButtonText = document.getElementById("switchButtonText");
        if (mode === "login" || mode === "signup") {
          modal.style.display = "block";
          if (mode === "login") {
            modalTitle.textContent = "Login";
            submitButtonText.textContent = "Login";
            switchText.textContent = "Don't have an account?";
            switchButtonText.textContent = "Sign up";
          } else {
            modalTitle.textContent = "Sign Up";
            submitButtonText.textContent = "Sign Up";
            switchText.textContent = "Already have an account?";
            switchButtonText.textContent = "Login";
          }
        } else {
          modal.style.display = "none";
        }
      }
      function switchAuthMode() {
        const modalTitle = document.getElementById("modalTitle");
        const submitButtonText = document.getElementById("submitButtonText");
        const switchText = document.getElementById("switchText");
        const switchButtonText = document.getElementById("switchButtonText");
        if (modalTitle.textContent === "Login") {
          modalTitle.textContent = "Sign Up";
          submitButtonText.textContent = "Sign Up";
          switchText.textContent = "Already have an account?";
          switchButtonText.textContent = "Login";
        } else {
          modalTitle.textContent = "Login";
          submitButtonText.textContent = "Login";
          switchText.textContent = "Don't have an account?";
          switchButtonText.textContent = "Sign up";
        }
      }
      function toggleWishlist(button) {
        const icon = button.querySelector("i");
        if (icon.classList.contains("ri-heart-line")) {
          icon.classList.remove("ri-heart-line");
          icon.classList.add("ri-heart-fill");
          icon.classList.add("text-red-500");
        } else {
          icon.classList.add("ri-heart-line");
          icon.classList.remove("ri-heart-fill");
          icon.classList.remove("text-red-500");
        }
      }
      function viewDetails(id) {
        document.getElementById("detailsModal").style.display = "block";
      }
      function closeDetailsModal() {
        document.getElementById("detailsModal").style.display = "none";
      }
      function sortByPriceHighToLow() {
        const sortedHostels = [...hostels].sort((a, b) => b.price - a.price);
        const hostelGrid = document.querySelector(".grid");
        hostelGrid.innerHTML = "";
        sortedHostels.forEach((hostel) => {
          const hostelCard = `
      <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative h-48">
      <img src="https://readdy.ai/api/search-image?query=modern student dormitory room interior with minimalist furniture, large windows, natural lighting, clean and organized space, study desk&width=400&height=300&seq=${hostel.id}&orientation=landscape" class="w-full h-full object-cover" alt="Hostel">
      <button onclick="toggleWishlist(this)" class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm">
      <i class="ri-heart-line text-gray-600"></i>
      </button>
      </div>
      <div class="p-4">
      <div class="flex justify-between items-start mb-2">
      <h3 class="font-semibold">${hostel.name}</h3>
      <div class="flex items-center">
      <i class="ri-star-fill text-yellow-400"></i>
      <span class="ml-1 text-sm">${hostel.rating}</span>
      </div>
      </div>
      <p class="text-sm text-gray-600 mb-2">${hostel.location} (${hostel.distance}km from campus)</p>
      <div class="flex flex-wrap gap-2 mb-3">
      ${hostel.amenities.map((amenity) => `<span class="text-xs px-2 py-1 bg-gray-100 rounded-full">${amenity}</span>`).join("")}
      </div>
      <div class="flex justify-between items-center">
      <div>
      <span class="text-lg font-semibold">$${hostel.price}</span>
      <span class="text-sm text-gray-600">/year</span>
      </div>
      <button onclick="viewDetails(${hostel.id})" class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90">View Details</button>
      </div>
      </div>
      </div>
      `;
          hostelGrid.insertAdjacentHTML("beforeend", hostelCard);
        });
        const notification = document.createElement("div");
        notification.className =
          "fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50";
        notification.textContent = "Sorted by price: High to Low";
        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 2000);
      }
      function sortByPrice() {
        const sortedHostels = [...hostels].sort((a, b) => a.price - b.price);
        const hostelGrid = document.querySelector(".grid");
        hostelGrid.innerHTML = "";
        sortedHostels.forEach((hostel) => {
          const hostelCard = `
      <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative h-48">
      <img src="https://readdy.ai/api/search-image?query=modern student dormitory room interior with minimalist furniture, large windows, natural lighting, clean and organized space, study desk&width=400&height=300&seq=${hostel.id}&orientation=landscape" class="w-full h-full object-cover" alt="Hostel">
      <button onclick="toggleWishlist(this)" class="absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm">
      <i class="ri-heart-line text-gray-600"></i>
      </button>
      </div>
      <div class="p-4">
      <div class="flex justify-between items-start mb-2">
      <h3 class="font-semibold">${hostel.name}</h3>
      <div class="flex items-center">
      <i class="ri-star-fill text-yellow-400"></i>
      <span class="ml-1 text-sm">${hostel.rating}</span>
      </div>
      </div>
      <p class="text-sm text-gray-600 mb-2">${hostel.location} (${hostel.distance}km from campus)</p>
      <div class="flex flex-wrap gap-2 mb-3">
      ${hostel.amenities.map((amenity) => `<span class="text-xs px-2 py-1 bg-gray-100 rounded-full">${amenity}</span>`).join("")}
      </div>
      <div class="flex justify-between items-center">
      <div>
      <span class="text-lg font-semibold">$${hostel.price}</span>
      <span class="text-sm text-gray-600">/year</span>
      </div>
      <button onclick="viewDetails(${hostel.id})" class="px-4 py-2 bg-primary text-white rounded-button hover:bg-primary/90">View Details</button>
      </div>
      </div>
      </div>
      `;
          hostelGrid.insertAdjacentHTML("beforeend", hostelCard);
        });
        const notification = document.createElement("div");
        notification.className =
          "fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50";
        notification.textContent = "Sorted by price: Low to High";
        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 2000);
      }
      window.onclick = function (event) {
        const authModal = document.getElementById("authModal");
        const detailsModal = document.getElementById("detailsModal");
        if (event.target === authModal || event.target === detailsModal) {
          authModal.style.display = "none";
          detailsModal.style.display = "none";
        }
      };
      document.getElementById("authForm").onsubmit = function (e) {
        e.preventDefault();
        const modalTitle = document.getElementById("modalTitle");
        const message =
          modalTitle.textContent === "Login"
            ? "Login successful!"
            : "Sign up successful!";
        const notification = document.createElement("div");
        notification.className =
          "fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50";
        notification.textContent = message;
        document.body.appendChild(notification);
        setTimeout(() => {
          notification.remove();
          toggleAuthModal();
        }, 2000);
      };
    </script>
  </body>
</html>