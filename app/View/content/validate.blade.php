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
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Users Dashboard</h2>
        
        <div class="overflow-x-auto bg-white shadow-xl rounded-lg">
            <table class="min-w-full table-auto border-collapse border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-3 px-6 text-left text-sm font-medium">Salle</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Number</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Utilisateur</th>
                        <th class="py-3 px-6 text-left text-sm font-medium">Phone</th>
                        <th class="py-3 px-6 text-center text-sm font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resevation as $resevation)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-300">
                        <td class="py-3 px-6 text-sm font-medium text-gray-800">{{$resevation->salle->title}}</td>
                        <td class="py-3 px-6 text-sm font-medium text-gray-800">{{$resevation->salle->number}}</td>
                        <td class="py-3 px-6 text-sm font-medium text-gray-800">{{$resevation->user->name}} {{$resevation->user->lastname}}</td>
                        <td class="py-3 px-6 text-sm font-medium text-gray-800">{{$resevation->user->phone}}</td>
                        <td class="py-3 px-6 text-center">
                            <form action="/Rvalidation" method="post">
                                @csrf
                                <select class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-800" name="status">
                                    <option value="{{$resevation->status}}">{{$resevation->status}}</option>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="banned">Banned</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <input type="hidden" name="id" value="{{$resevation->id}}" >

                                <button type="submit"   class="mt-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-md hover:bg-blue-600 transition-colors duration-200">Edit Status</button>
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

@endsection
