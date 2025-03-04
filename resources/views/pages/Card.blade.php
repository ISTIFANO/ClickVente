<script src="https://cdn.tailwindcss.com"></script>

<h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Mon Panier</h1>

@if(session('pannier'))
    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
        @foreach(session('pannier') as $id => $produit)
            <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-6">
                <img src="{{ $produit['image'] }}" alt="{{ $produit['name'] }}" class="w-28 h-28 object-cover rounded-lg shadow-sm">
                <div class="ml-6 flex-1">
                    <p class="text-lg font-semibold text-gray-800">{{ $produit['name'] }}</p>
                    <p class="text-sm text-gray-600">{{ $produit['price'] }} MAD</p>
                    <p class="text-sm text-gray-500">Quantité: {{ $produit['stock'] }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <form action="/Pannier/delete_produit_from_pannier" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$id}}">
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm focus:outline-none transition duration-200">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 text-right">
       
        <p class="text-2xl font-bold text-gray-800">Total: {{ array_sum(array_column(session('pannier'), 'price')) }} MAD</p>
        <button class=" m-6 px-12 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
            
            Pay
          </button>
    </div>
   
      
@else
    <p class="text-center text-gray-500 text-xl">Votre panier est vide</p>
@endif
