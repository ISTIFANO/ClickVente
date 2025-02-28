{{-- @extends('layouts.structeur')

@section('content')
    Détails Produit
@endsection --}}

{{-- @section('main') --}}
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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
<div class="container mx-auto p-8 bg-gray-100 shadow-xl rounded-lg">

    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Détails du Produit</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-8 rounded-lg shadow-md border border-gray-200">

        <div class="relative group overflow-hidden">
            <img src="{{  $product->image }}" 
                 class="w-full max-w-lg object-cover rounded-lg shadow-lg border border-gray-300 transform group-hover:scale-105 transition duration-300"
                 alt="{{ $product->titre }}">
        </div>

       <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-3">{{ $product->titre }}</h2>
            <p class="text-2xl font-semibold text-green-600 mb-4">{{ $product->prixunite }} MAD</p>
            
            @if($product->stock > 0)
                <p class="text-xl text-gray-700 mb-4">Disponible: {{ $product->stock }} articles en stock</p>
            @else
                <p class="text-xl text-red-600 mb-4">Indisponible</p>
            @endif

            <form action="Pannier/Ajouter" method="POST" class="mt-6">
                @csrf
                <label for="quantite" class="block text-gray-700 font-bold mb-2">Quantité :</label>
                <div class="flex items-center gap-4">
                    <input type="number" id="quantite" name="quantite" value="1" min="1" 
                           class="w-24 p-3 border border-gray-300 rounded-lg text-center shadow-sm focus:ring focus:ring-blue-300">
                   <input type="hidden" value="{{ $product->id }}" name="id">
                           <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
                        🛒 Ajouter au panier
                    </button>
                </div>
            </form>
            @yield('content')


            <div class="mt-6">
                <a href="/" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 transition">
                    🔙 Retour aux Produits
                </a>
            </div>
        </div>
    </div>

    <div class="mt-12 bg-white p-6 rounded-lg shadow-md border border-gray-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">📖 Description du Produit</h2>
        <p class="text-gray-700 italic">{{ $product->description }}</p>
    </div>

</div>
{{-- @endsection --}}
