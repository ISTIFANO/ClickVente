
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    <section class="signup-area h-[888px] overflow-hidden bg-gray-100 py-12 bg-cover flex content-center items-center bg-center bg-no-repeat" style="background-image: url('https://img.freepik.com/free-photo/concierge-bell-check-desk_482257-79775.jpg?t=st=1739980265~exp=1739983865~hmac=228709c8cd340deba94710109cfcfe6a0ad7099e27745ba29601862db28b40af&w=1380');">
  <div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row items-center justify-center">
      <div class="lg:w-5/12 w-full order-2 lg:order-1 p-6 bg-white shadow-lg rounded-lg bg-opacity-80">
        <h2 class="text-2xl font-bold mb-2">Connectez-vous</h2>
        <p class="text-sm text-gray-600 mb-4">Vous n'avez pas un compte? <a href="/Login" class="text-blue-600 hover:underline">Inscrivez-vous ici</a></p>

        <form action="/update" method="POST" class="w-full">
          @csrf

          <div class="form-element mb-4">
            <label for="title" class="block text-gray-700 mb-2">Titre</label>
            <input type="text" name="title" required placeholder="Titre" value="{{$salle['title']}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div class="form-element mb-4">
            <label for="description" class="block text-gray-700 mb-2">Description</label>
            <input type="text" name="description" required placeholder="Description" value="{{$salle['description']}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div class="form-element mb-4">
            <label for="location" class="block text-gray-700 mb-2">Emplacement</label>
            <input type="text" name="location" value="{{$salle['location']}}" required placeholder="Emplacement" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div class="form-element mb-4">
            <label for="phone" class="block text-gray-700 mb-2">Téléphone</label>
            <input type="text" name="number" value="{{$salle['number']}}" required placeholder="+1234567890" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div class="form-element mb-4">
            <label for="password" class="block text-gray-700 mb-2">Mot de passe</label>
            <input type="text" name="images" value="{{$salle['images']}}" required placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="form-element mb-4">
            <label for="password" class="block text-gray-700 mb-2">Mot de passe</label>
            <input type="hidden" name="id" value="{{$salle['id']}}" required placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>

          <div class="form-element mb-4">
            <input type="submit"  class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" value="S'inscrire">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>
</html>