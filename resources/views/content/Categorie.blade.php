@extends('pages.Admin')

@section('content')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">+ Publier une Salle</button>

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">categorie Dashboard</h2>
        
        <!-- Table for categorie data -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-3 px-4 text-left">title</th>
                        <th class="py-3 px-4 text-left">description</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4">{{$categorie->title}}</td>
                        <td class="py-3 px-4">{{$categorie->description}}</td>
                        <td class="py-3 px-4 text-center">
                            <!-- Edit Button for Modal -->
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors mr-2" onclick="openEditModal({{$categorie->id}}, '{{$categorie->title}}', '{{$categorie->description}}')">
                                <i class="fas fa-pencil-alt"></i> <!-- Pencil icon for Update -->
                            </button>
                            <form action="/categorie/delete" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" value="{{$categorie->id}}" name="id">
                                <input type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors" value="delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add Category Modal -->
        <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Publier une offre</h2>
                    <form action="/categorie/create" method="POST" class="w-full">
                        @csrf
                        <div class="form-element mb-4">
                          <label for="title" class="block text-gray-700 mb-2">Titre</label>
                          <input type="text" name="title" required placeholder="Titre"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="form-element mb-4">
                          <label for="description" class="block text-gray-700 mb-2">Description</label>
                          <input type="text" name="description" required placeholder="description"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                            <input type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Publier">
                        </div>
                    </form>
            </div>
        </div>

        <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Edit Category</h2>
                <form id="editForm" action="/categorie/edit" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="id_edit" id="editCategoryId">
                    <div class="form-element mb-4">
                        <label for="title" class="block text-gray-700 mb-2">Titre</label>
                        <input type="text" name="titre" id="editTitle" required placeholder="Titre" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="form-element mb-4">
                        <label for="description" class="block text-gray-700 mb-2">Description</label>
                        <input type="text" name="description" id="editDescription" required placeholder="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeEditModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                        <input type="submit" name="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600" value="Update">
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        const jobModal = document.getElementById("jobModal");
        const editModal = document.getElementById("editModal");
        const openModal = document.getElementById("openModal");
        const closeModal = document.getElementById("closeModal");
        const closeEditModal = document.getElementById("closeEditModal");

        openModal.addEventListener("click", () => {
            jobModal.classList.remove("hidden");
        });

        closeModal.addEventListener("click", () => {
            jobModal.classList.add("hidden");
        });

        closeEditModal.addEventListener("click", () => {
            editModal.classList.add("hidden");
        });

        function openEditModal(id, title, description) {
            document.getElementById("editCategoryId").value = id;
            document.getElementById("editTitle").value = title;
            document.getElementById("editDescription").value = description;
            editModal.classList.remove("hidden");
        }
    </script>
</body>
</html>
@endsection
 