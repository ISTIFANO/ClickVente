```<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="{{ route('process.payment') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center">Stripe Payment</h2>
        
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

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Submit Payment</button>
    </form>
</body>
</html>```