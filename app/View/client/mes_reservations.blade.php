@extends('pages.Profile')

@section('client')
<div class="container mx-auto p-8">
    <a href="/salle/show">
    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-8">+    Reservation</button></a>

    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Mes RESERVATIONS</h2>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Location</th>
                    <th class="py-3 px-4 text-left">Number</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mesreservation as $reservation)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $reservation->salle->title }}</td>
                        <td class="py-3 px-4">{{ $reservation->salle->description }}</td>
                        <td class="py-3 px-4">{{ $reservation->status }}</td>
                        <td class="py-3 px-4">{{ $reservation->salle->location }}</td>
                        <td class="py-3 px-4">{{ $reservation->salle->number }}</td>
                        <td class="py-3 px-4 text-center">

                            <form action="/reservations/delete" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" value="{{ $reservation->id }}" name="id">
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">
Annuler

                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
