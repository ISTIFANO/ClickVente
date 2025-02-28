{{-- @extends('content.Details')

@section('content') --}}
<script src="https://cdn.tailwindcss.com"></script>

    <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Mon Panier</h1>
<?php  var_dump(session('pannier')); ?>
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
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6 text-right">
            <p class="text-xl font-bold">Total: {{ array_sum(array_column(session('cart'), 'price')) }} MAD</p>
        </div>
    @else
        <p class="text-center text-gray-700">Votre panier est vide</p>
    @endif
{{-- @endsection --}}
