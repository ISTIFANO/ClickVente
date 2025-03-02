@extends('pages.Profile')

@section('client')
<html>
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  </head>
  <body class="bg-gray-100">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
      <h1 class="text-2xl font-bold mb-2">
        My Info
      </h1>
      <p class="text-gray-600 mb-6">
        This is a client account
      </p>

      <form action="/user/update" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          {{-- @foreach($userinfos as $userinfo) --}}
            <div>
              <label class="block text-gray-700" for="first-name">
                First Name
              </label>
              <input name="name" value="{{ $userinfos['name'] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="first-name" type="text"/>
            </div>
            <div>
              <label class="block text-gray-700" for="last-name">
                Last Name
              </label>
              <input name="lastname" value="{{ $userinfos['lastname'] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="last-name" type="text"/>
            </div>
            <div>
              <label class="block text-gray-700" for="phone">
                Phone
              </label>
              <input name="phone" value="{{ $userinfos['phone'] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="phone" type="text"/>
            </div>
          {{-- @endforeach --}}
        </div>
        
        <div class="mb-6">
          <label class="block text-gray-700" for="email">
            Email
          </label>
          <input name="email" value="{{ $userinfos['email'] }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" id="email" type="email"/>
        </div>

        <div class="flex space-x-4">
          <input type="submit" value="Submit" class="bg-green-600 text-white cursor-pointer py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        </div>
      </form>
    </div>
  </body>
</html>
@endsection
