<!-- Card.blade.php -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://js.stripe.com/v3/"></script>

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
        <button id="openModal" class="m-6 px-12 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Pay
        </button>
    </div>

    <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <form id="checkout-form" action="{{ route('process-payment') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-center">Stripe Payment</h2>
                
                <div class="mb-4">
                    <label for="cardholderName" class="block text-gray-700 font-semibold mb-2">Cardholder's Name</label>
                    <input type="text" id="cardholderName" name="cardholderName" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="cardholderName" class="block text-gray-700 font-semibold mb-2">Cardholder's Name</label>
                    <input type="text" id="cardholderName" name="cardholderName" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
        
                <div class="mb-4">
                    <label for="cardNumber" class="block text-gray-700 font-semibold mb-2">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
        
                <div class="mb-4">
                    <label for="expMonth" class="block text-gray-700 font-semibold mb-2">Expiration Month</label>
                    <input type="text" id="expMonth" name="expMonth" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
        
                <div class="mb-4">
                    <label for="expYear" class="block text-gray-700 font-semibold mb-2">Expiration Year</label>
                    <input type="text" id="expYear" name="expYear" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
        
                <div class="mb-6">
                    <label for="cvc" class="block text-gray-700 font-semibold mb-2">CVC</label>
                    <input type="text" id="cvc" name="cvc" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Card Information</label>
                    <div id="card-element" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></div>
                    <div id="card-errors" role="alert" class="mt-2 text-red-500 text-sm"></div>
                </div>
                
                <input type="hidden" name="stripeToken" id="stripe-token-id">

                <button id="pay-btn" type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Submit Payment
                </button>
                
                <button type="button" id="closeModal" class="mt-4 w-full bg-gray-300 text-gray-700 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">
                    Cancel
                </button>
            </form>
        </div>
    </div>
@else
    <p class="text-center text-gray-500 text-xl">Votre panier est vide</p>
@endif

<script>
    // Modal handling
    const modal = document.getElementById("jobModal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");

    openModal.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    closeModal?.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // Stripe integration
    var stripe = Stripe('{{ env('STRIPE_PUBLISHABLE_KEY') }}');
    var elements = stripe.elements();
    
    // Create card element
    var cardElement = elements.create('card', {
        hidePostalCode: true,
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
    });
    
    cardElement.mount('#card-element');

    // Handle form submission
    var form = document.getElementById('checkout-form');
    var cardErrors = document.getElementById('card-errors');
    var submitButton = document.getElementById('pay-btn');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        submitButton.disabled = true;
        submitButton.textContent = 'Processing...';
        
        // Create token
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                // Show error
                cardErrors.textContent = result.error.message;
                submitButton.disabled = false;
                submitButton.textContent = 'Submit Payment';
            } else {
                // Send token to server
                document.getElementById('stripe-token-id').value = result.token.id;
                form.submit();
            }
        });
    });
</script>
