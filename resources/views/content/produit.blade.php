@extends('pages.admin')

@section('content')
<div class="w-[544px]">
    <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">+ Publier une Salle</button>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">prix unitaire</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($produits as $produit)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><img src="{{$produit->image}}" alt=""></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->titre}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->description}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->prixunite}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->stock}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{$produit->souscategorie_id}}</span>
                    </td>
                    <td class="px-6 py-4 flex whitespace-nowrap text-sm text-gray-500">
                        <button class="openEditModal bg-[#3c3cd5] mr-3 text-white px-6 py-3 rounded-lg hover:bg-[#173b6a] focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105" data-id="{{$produit->id}}">
                            Modifier
                        </button>
                        <form action="/produits/destroy" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$produit->id}}" />
                            <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300 transform hover:scale-105">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for Adding a New Produit -->
    <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Publier une offre</h2>
            <form enctype="multipart/form-data" action="produit/store" method="POST" class="w-full">
                @csrf
                <div class="form-element mb-4">
                    <label for="title" class="block text-gray-700 mb-2">Titre</label>
                    <input type="text" name="titre" required placeholder="Titre" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <input type="text" name="description" required placeholder="Description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="prixunite" class="block text-gray-700 mb-2">prix unitaire</label>
                    <input type="text" name="prixunite" required placeholder="Prix unitaire" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="stock" class="block text-gray-700 mb-2">Stock</label>
                    <input type="text" name="stock" required placeholder="Stock" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="image" class="block text-gray-700 mb-2">Images</label>
                    <input type="file" name="image" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <label for="categorie">Sélectionnez votre catégorie</label>
                <select name="souscategorie_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                    @endforeach
                </select>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                    <input type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Publier">
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Editing a Produit -->
    <div id="jobEditModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Modifier une offre</h2>
            <form enctype="multipart/form-data" action="produit/update" method="POST" class="w-full">
                @csrf
                <div class="form-element mb-4">
                    <label for="title" class="block text-gray-700 mb-2">Titre</label>
                    <input type="text" name="titre" id="editTitre" required placeholder="Titre" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="description" class="block text-gray-700 mb-2">Description</label>
                    <input type="text" name="description" id="editDescription" required placeholder="Description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="prixunite" class="block text-gray-700 mb-2">Prix unitaire</label>
                    <input type="text" name="prixunite" id="editPrixUnite" required placeholder="Prix unitaire" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="stock" class="block text-gray-700 mb-2">Stock</label>
                    <input type="text" name="stock" id="editStock" required placeholder="Stock" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="form-element mb-4">
                    <label for="image" class="block text-gray-700 mb-2">Images</label>
                    <input type="file" name="image" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <label for="categorie">Sélectionnez votre catégorie</label>
                <select name="souscategorie_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                    @endforeach
                </select>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeEditModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                    <input type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    const modal = document.getElementById("jobModal");

    const editButtons = document.querySelectorAll(".openEditModal");
    const closeEditModal = document.getElementById("closeEditModal");
    const editModal = document.getElementById("jobEditModal");

    openModal.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // Handle opening the edit modal
    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const productId = button.getAttribute("data-id");

            // Here, you would ideally fetch the product details with AJAX and fill in the form.
            // For now, I'm just showing the modal.
            editModal.classList.remove("hidden");

            // Example of pre-filling the form with product data (you could use AJAX here)
            document.getElementById("editTitre").value = "Product Title " + productId;
            document.getElementById("editDescription").value = "Product Description " + productId;
            document.getElementById("editPrixUnite").value = "Product Price " + productId;
            document.getElementById("editStock").value = "Product Stock " + productId;
        });
    });

    closeEditModal.addEventListener("click", () => {
        editModal.classList.add("hidden");
    });
</script>
@endsection
