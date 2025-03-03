<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSphere - Votre Destination PlayStation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <style>
 
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 2s ease-in-out infinite;
        }
        
        .shimmer {
            background: linear-gradient(90deg, rgba(255,255,255,0), rgba(255,255,255,0.2), rgba(255,255,255,0));
            background-size: 1000px 100%;
            animation: shimmer 2s infinite linear;
        }
        
        /* Transitions pour les hover effects */
        .hover-translate {
            transition: transform 0.3s ease;
        }
        
        .hover-translate:hover {
            transform: translateY(-8px);
        }
        
        /* Animation pour l'apparition au scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
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
                        <button id="cart-btn" class="relative p-2 bg-gray-200 rounded-full hover:bg-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>                            <span id="cart-count" class="absolute top-0 right-0 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                                2
                            </span>
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
    
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute left-0 right-0 top-0 h-40 bg-gradient-to-b from-black to-transparent opacity-40"></div>
            <div class="absolute shimmer w-full h-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">
                        <span class="block">DÉCOUVREZ L'UNIVERS</span>
                        <span class="block text-blue-300 animate-pulse-slow">PLAYSTATION</span>
                    </h1>
                    <p class="text-lg md:text-xl mb-8 max-w-lg opacity-90">Les meilleurs jeux, accessoires et consoles PlayStation au meilleur prix</p>
                    <button class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        EXPLORER
                    </button>
                </div>
                
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative w-72 h-72 md:w-96 md:h-96 animate-float">
                        <img src="/api/placeholder/400/400" alt="PlayStation 5" class="rounded-lg shadow-2xl">
                        <div class="absolute -bottom-4 -right-4 bg-blue-600 text-white px-4 py-2 rounded-lg font-bold shadow-lg animate-pulse-slow">
                            NOUVEAU
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @yield('content') --}}

    <!-- Categories Section -->
    {{-- <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 relative inline-block fade-in">
                Catégories
                <span class="block h-1 w-24 bg-blue-600 mt-2"></span>
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Category 1 -->
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover-translate">
                    <div class="h-48 bg-gray-200 relative overflow-hidden group">
                        <img src="/api/placeholder/400/300" alt="PS5" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">PS5</h3>
                        <p class="text-gray-600">Découvrez la console next-gen</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:text-blue-800 transition-colors duration-300">
                            Découvrir <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
                
                <!-- Category 2 -->
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover-translate">
                    <div class="h-48 bg-gray-200 relative overflow-hidden group">
                        <img src="/api/placeholder/400/300" alt="Jeux PS5" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Jeux PS5</h3>
                        <p class="text-gray-600">Les meilleurs titres PS5</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:text-blue-800 transition-colors duration-300">
                            Découvrir <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
                
                <!-- Category 3 -->
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover-translate">
                    <div class="h-48 bg-gray-200 relative overflow-hidden group">
                        <img src="/api/placeholder/400/300" alt="PS4" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">PS4</h3>
                        <p class="text-gray-600">La console classique</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:text-blue-800 transition-colors duration-300">
                            Découvrir <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
                
                <!-- Category 4 -->
                <div class="bg-gray-50 rounded-xl shadow-md overflow-hidden hover-translate">
                    <div class="h-48 bg-gray-200 relative overflow-hidden group">
                        <img src="/api/placeholder/400/300" alt="Accessoires" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Accessoires</h3>
                        <p class="text-gray-600">Améliorez votre expérience</p>
                        <a href="#" class="inline-block mt-4 text-blue-600 font-medium hover:text-blue-800 transition-colors duration-300">
                            Découvrir <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 relative inline-block fade-in">
                Produits Populaires
                <span class="block h-1 w-24 bg-blue-600 mt-2"></span>
            </h2>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product) 
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover-translate transition-all duration-300 hover:shadow-xl">
                    <div class="h-64 bg-gray-200 relative overflow-hidden group">
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : '/api/placeholder/400/400' }}" alt="{{ $product->titre }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @if($product->is_new)
                        <span class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Nouveau</span>
                        @elseif($product->discount)
                        <span class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">-{{ $product->discount }}%</span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->titre }}</h3>
                        <p class="text-xl font-bold text-blue-600 mb-4">{{ $product->prixunite }} €</p>
                        <div class="flex space-x-2">
                            <form action="Product/Home_pannier" method="POST" class="mt-6">
                                @csrf
                                <label for="quantite" class="block text-gray-700 font-bold mb-2">Quantité :</label>
                                <div class="flex items-center gap-4">
                                    <input type="number" id="quantite" name="quantite" value="1" min="1" 
                                           class="w-24 p-3 border border-gray-300 rounded-lg text-center shadow-sm focus:ring focus:ring-blue-300">
                                   <input type="hidden" value="{{ $product->id }}" name="id">
                                           <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition flex items-center space-x-2 text-sm">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M3 3h18v18H3z"></path>
                                                    <path d="M3 12h18"></path>
                                                    <path d="M12 3v18"></path>
                                                </svg>
                                           </button>
                                </div>
                            </form>
                            <a href="/Product/details/{{ $product->id }}">
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1 px-3 rounded-lg transition-colors duration-300 flex items-center space-x-2 text-sm">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 6h13l-1.39 10.59a2 2 0 0 1-2 1.91H7.39a2 2 0 0 1-2-1.91L8 6z"></path>
                                        <path d="M6 6l2-2h10l2 2"></path>
                                    </svg>
                                    <span> Details</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    

    <!-- Promotions Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-blue-900 to-blue-700 shadow-xl">
                <div class="absolute right-0 top-0 -mt-20 -mr-20 w-64 h-64 rounded-full bg-blue-500 opacity-20"></div>
                <div class="absolute left-0 bottom-0 -mb-20 -ml-20 w-64 h-64 rounded-full bg-blue-800 opacity-20"></div>
                
                <div class="relative z-10 px-8 py-16 md:py-20 text-center">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 animate-pulse-slow">OFFRE SPÉCIALE PS PLUS</h2>
                    <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Abonnez-vous maintenant et obtenez 3 mois offerts pour tout abonnement annuel.</p>
                    <button class="bg-white hover:bg-gray-100 text-blue-800 font-bold py-3 px-8 rounded-lg shadow-lg transition-transform duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        VOIR L'OFFRE
                    </button>
                    
                    <div class="mt-12 flex flex-wrap justify-center space-x-0 md:space-x-8 space-y-8 md:space-y-0">
                    </div> </div></div></div></section>
                    <footer class="bg-gray-800 text-white py-12">
                        <div class="container mx-auto px-6 md:px-12">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                                
                                <!-- GameSphere Column -->
                                <div class="footer-column">
                                    <h3 class="text-xl font-semibold mb-4">GameSphere</h3>
                                    <ul class="footer-links space-y-2">
                                        <li><a href="#" class="text-gray-400 hover:text-white">À propos de nous</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Conditions générales</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Politique de confidentialité</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Nous contacter</a></li>
                                    </ul>
                                </div>
                                
                                <!-- Services Column -->
                                <div class="footer-column">
                                    <h3 class="text-xl font-semibold mb-4">Services</h3>
                                    <ul class="footer-links space-y-2">
                                        <li><a href="#" class="text-gray-400 hover:text-white">Livraison</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Retours et remboursements</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Support technique</a></li>
                                    </ul>
                                </div>
                                
                                <!-- Mon Compte Column -->
                                <div class="footer-column">
                                    <h3 class="text-xl font-semibold mb-4">Mon compte</h3>
                                    <ul class="footer-links space-y-2">
                                        <li><a href="#" class="text-gray-400 hover:text-white">Se connecter</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Créer un compte</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Mes commandes</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Ma liste de souhaits</a></li>
                                    </ul>
                                </div>
                                
                                <!-- Suivez-nous Column -->
                                <div class="footer-column">
                                    <h3 class="text-xl font-semibold mb-4">Suivez-nous</h3>
                                    <ul class="footer-links space-y-2">
                                        <li><a href="#" class="text-gray-400 hover:text-white">Facebook</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Twitter</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">Instagram</a></li>
                                        <li><a href="#" class="text-gray-400 hover:text-white">YouTube</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-700 text-center py-4 mt-8">
                            <p class="text-gray-300">&copy; 2025 GameSphere. Tous droits réservés.</p>
                        </div>
                    </footer>
                    <div id="cart-overlay" class="fixed top-0 right-0 w-80 h-full bg-white shadow-lg p-6 transform translate-x-full transition-transform ease-in-out duration-300">
                        <h2 class="text-xl font-bold">Your Cart</h2>
                        @if(session('pannier'))
                        <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
                            @foreach(session('pannier') as $id => $produit)
                                <div class="flex items-center justify-between mb-4">
                                    <img src="{{ $produit['image'] }}" alt="{{ $produit['name'] }}" class="w-24 h-24 object-cover rounded-lg">
                                    <div class="ml-4 flex-1">
                                        <p class="font-semibold">{{ $produit['name'] }}</p>
                                        <p>{{ $produit['price'] }} MAD</p>
                                        <p>Quantité: {{ $produit['stock'] }}</p>
                                    </div>
                                    <div>
                                        <form action="/Pannier/delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="submit" class="text-red-500 hover:text-red-700" value="Supprimer">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 text-right">
                         <p class="text-xl font-bold">Total: {{ array_sum(array_column(session('pannier'), 'price')) }} MAD</p>
                        </div>
                    @else
                        <p class="text-center text-gray-700">Votre panier est vide</p>
                    @endif
                        <button id="close-cart" class="mt-4 bg-red-500 text-white px-4 py-2 hover:bg-red-600 w-full rounded">Close</button>
                    </div>  
                    </div>
                </div>
                <script>
                const modal = document.getElementById("jobModal");
                const cartBtn = document.getElementById("cart-btn");
    const cartOverlay = document.getElementById("cart-overlay");
    const closeCart = document.getElementById("close-cart");

    cartBtn.addEventListener("click", () => {
        cartOverlay.classList.toggle("translate-x-full");
    });

    closeCart.addEventListener("click", () => {
        cartOverlay.classList.add("translate-x-full");
    });
                    </script>
                    