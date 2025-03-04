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
        <button id="openModal" class=" m-6 px-12 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">

            Pay
          </button>
    </div>
   
    <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Publier une offre</h2>
            <form action="{{ route('process.payment') }}" method="POST">
                @csrf
                <label for="cardholderName">Cardholder's Name</label>
                <input type="text" id="cardholderName" name="cardholderName" required><br>
        
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required><br>
        
                <label for="expMonth">Expiration Month</label>
                <input type="text" id="expMonth" name="expMonth" required><br>
        
                <label for="expYear">Expiration Year</label>
                <input type="text" id="expYear" name="expYear" required><br>
        
                <label for="cvc">CVC</label>
                <input type="text" id="cvc" name="cvc" required><br>
        
                <button type="submit">Submit Payment</button>
            </form>
        </div>
    </div>
@else
    <p class="text-center text-gray-500 text-xl">Votre panier est vide</p>
@endif

<script>const modal = document.getElementById("jobModal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    
    openModal.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });
    
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
    </script>
