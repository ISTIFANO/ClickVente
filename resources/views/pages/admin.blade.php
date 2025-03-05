<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <div class="flex min-h-screen">

  <div class="flex min-h-screen">
    <div class="fixed w-64 h-full bg-white shadow-lg">
      <div class="flex items-center gap-2 p-6">
        <i class="bi bi-grid-1x2-fill text-indigo-600 text-xl"></i>
        <span class="text-xl font-bold text-indigo-600">Dashboard</span>
      </div>
      
      <nav class="mt-6 px-4">
        <a href="#" class="flex items-center px-4 py-3 text-gray-700 bg-indigo-50 rounded-lg mb-2">
          <i class="bi bi-house-door mr-3 text-lg"></i>
          <span>Dashboard</span>
        </a>
        
        <a href="/Categories" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
        <i class="bi bi-star mr-3 text-lg"></i>
        <span>Categories</span>
        </a>
        
        <a href="/Produits" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
          <i class="bi bi-tag mr-3 text-lg"></i>
          <span>Produit</span>
        </a>
        
        <a href="/Commande/showCommandes" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
          <i class="bi bi-folder mr-3 text-lg"></i>
          <span>Validation</span>
        </a>
        
      
      
       
        <a href="/" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
  <i class="bi bi-box-arrow-right mr-3 text-lg"></i>
  <span>Logout</span>
</a>

<a href="/logout" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
  <i class="bi bi-box-arrow-right mr-3 text-lg"></i>
  <span>Logout</span>
</a>

      </nav>
    </div>

   
    <div class="ml-64 flex-1 p-8">
 
      <div class="space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-sm">

            @yield('content')
     
    </div>
      </div>
    </div>
  </div>
</body>
</html>