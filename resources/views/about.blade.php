<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hostelify - About Us</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
         tailwind.config = {
            theme: {
                extend: {
                        colors: {
                            primary: '#007bff',
                            secondary: '#6c757d',
                            background: '#f8f9fa',
                            text: '#212529'
                        }
                    }
                }  
            }
        </script>
    </head>
        
<body class="bg-background font-sans">
    <header class="bg-white shadow-sm fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-2xl font-['Pacifico'] text-primary">Hostelify</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/" class="text-gray-600 hover:text-primary">Home</a>
                <a href="/about" class="text-gray-600 hover:text-primary">About</a>
                <a href="/contact" class="text-gray-600 hover:text-primary">Contact</a>
            </div>
        </div>
    </header>
    <main class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">  
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-primary">About Us</h2>
                    <p class="text-gray-700">
                        Hostelify is a platform that helps students find the perfect hostel for their needs. We have a wide range of hostels to choose from, and we are always adding new ones.
                    </p>    
                </div>
                <div class="space-y-6">
                    <img src="{{ asset('images/about.jpg') }}" alt="About Us" class="w-full rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </main> 
    <footer class="bg-white shadow-sm py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-600">
                &copy; 2024 Hostelify. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>
