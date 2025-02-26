@extends('pages.Admin')


@section('content')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">+ Publier une Salle</button>

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Sales Dashboard</h2>
        
        <!-- Table for sales data -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-3 px-4 text-left">title</th>
                        <th class="py-3 px-4 text-left">description</th>
                        <th class="py-3 px-4 text-left">status</th>
                        <th class="py-3 px-4 text-left">location</th>
                        <th class="py-3 px-4 text-left">number</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example sales data, you can loop this with PHP or a template engine -->
                    @foreach($Tsalle as $sale)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4">{{$sale->title}}</td>
                        <td class="py-3 px-4">{{$sale->description}}</td>
                        <td class="py-3 px-4">{{$sale->status}}</td>
                        <td class="py-3 px-4">{{$sale->location}}</td>
                        <td class="py-3 px-4">{{$sale->number}}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="/sales/edit/{{$sale->id}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors mr-2">
                                <i class="fas fa-pencil-alt"></i> <!-- Pencil icon for Update -->
                            </a>
                            <form action="/sales/delete/{{$sale->id}}" method="GET" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <script>
            const modal = document.getElementById("jobModal");
            const openModal = document.getElementById("openModal");
            const closeModal = document.getElementById("closeModal");
            const projectsContainer = document.getElementById("projects");
            
            openModal.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });
            
            closeModal.addEventListener("click", () => {
                modal.classList.add("hidden");
            });
            
            
        </script> --}}
        <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Publier une offre</h2>
                    <form action="/Sallecreate" method="POST" class="w-full">
                        @csrf
              
                        <div class="form-element mb-4">
                          <label for="title" class="block text-gray-700 mb-2">Titre</label>
                          <input type="text" name="title" required placeholder="Titre"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
              
                        <div class="form-element mb-4">
                          <label for="description" class="block text-gray-700 mb-2">Description</label>
                          <input type="text" name="description" required placeholder="Description"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
              
                        <div class="form-element mb-4">
                          <label for="location" class="block text-gray-700 mb-2">location</label>
                          <input type="text" name="location"  required placeholder="Emplacement" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
              
                        <div class="form-element mb-4">
                          <label for="phone" class="block text-gray-700 mb-2">number</label>
                          <input type="text" name="number" required placeholder="00000" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="form-element mb-4">
                            <input type="hidden" name="start_date"  value="2009-02-14" placeholder="" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                          </div>
                        <div class="form-element mb-4">
                            <input type="hidden" name="status"  value="notreserved" placeholder="" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                          </div>

                        <div class="form-element mb-4">
                          <label for="images" class="block text-gray-700 mb-2">images</label>
                          <input type="text" name="images" required placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                        <input type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Publier">
                    </div>
                </form>
            </div>
        </div>
    </div>
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
   
</body>
</html>
@endsection