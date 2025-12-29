@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-700">Orders</h2>
    <a href="/orders/create" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-lg transition duration-300">+ New Order</a>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-600 font-medium uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium uppercase tracking-wider">Client</th>
                <th class="px-6 py-3 text-left text-gray-600 font-medium uppercase tracking-wider">Products</th>
                <th class="px-6 py-3 text-center text-gray-600 font-medium uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $order->id }}</td>
                <td class="px-6 py-4">{{ $order->client->name }}</td>
                <td class="px-6 py-4">{{ $order->items->count() }}</td>
                <td class="px-6 py-4 flex justify-center gap-2">
                    <a href="/orders/{{ $order->id }}" class="text-green-600 font-medium hover:underline">View</a>
                    <form action="/orders/{{ $order->id }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
