<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hostelify - Contact Us</title>
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
                    <h2 class="text-3xl font-bold text-primary">Contact Us</h2> 
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full rounded-button border-gray-300 shadow-sm focus:border-primary focus:ring-primary" required>
                        </div>      
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full rounded-button border-gray-300 shadow-sm focus:border-primary focus:ring-primary" required>
                        </div>  
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" class="mt-1 block w-full rounded-button border-gray-300 shadow-sm focus:border-primary focus:ring-primary" required></textarea>
                        </div>  
                        <button type="submit" class="w-full rounded-button bg-primary text-white px-4 py-2 hover:bg-primary-dark transition-colors">Send Message</button>
                    </form> 
                </div>
                <div class="space-y-6">
                    <img src="{{ asset('images/contact.jpg') }}" alt="Contact Us" class="w-full rounded-lg shadow-md">
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

