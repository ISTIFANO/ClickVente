<header class="bg-blue-900 shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-2xl font-bold text-white">Click<span class="text-blue-300">Vente</span></span>
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#" class="text-white hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">Accueil</a>
                    <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">Jeux</a>
                    <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">Accessoires</a>
                    <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">PS5</a>
                    <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">PS4</a>
                    <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">Promotions</a>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
         
                
                <div class="relative">
                    <button class="text-white p-2 rounded-full hover:bg-blue-800 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse-slow">3</span>
                    </button>
                </div>
               <a href="login"> <button class="text-white p-2 rounded-full hover:bg-blue-800 transition-colors duration-300">
                    Login   </button></a>
                   <a href="/register"> <button class="text-white p-2 rounded-full hover:bg-blue-800 transition-colors duration-300">
                        register   </button></a>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="md:hidden" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium bg-blue-800">Accueil</a>
                <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Jeux</a>
                <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Accessoires</a>
                <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">PS5</a>
                <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">PS4</a>
                <a href="#" class="text-gray-300 hover:bg-blue-800 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition-colors duration-300">Promotions</a>
            </div>
        </div>
    </div>
</header>
