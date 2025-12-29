@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold mb-6 text-gray-700">Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <!-- Total Categories -->
    <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white rounded-lg p-6 shadow hover:scale-105 transition block">
        <h3 class="text-xl font-bold">Categories</h3>
        <p class="text-3xl font-extrabold">{{ $totalCategories }}</p>
    </a>

    <!-- Total Products -->
    <a href="{{ route('products.index') }}" class="bg-blue-500 text-white rounded-lg p-6 shadow hover:scale-105 transition block">
        <h3 class="text-xl font-bold">Products</h3>
        <p class="text-3xl font-extrabold">{{ $totalProducts }}</p>
    </a>

    <!-- Total Clients -->
    <a href="{{ route('clients.index') }}" class="bg-blue-500 text-white rounded-lg p-6 shadow hover:scale-105 transition block">
        <h3 class="text-xl font-bold">Clients</h3>
        <p class="text-3xl font-extrabold">{{ $totalClients }}</p>
    </a>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Total Orders -->
    <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white rounded-lg p-6 shadow hover:scale-105 transition block">
        <h3 class="text-xl font-bold">Orders</h3>
        <p class="text-3xl font-extrabold">{{ $totalOrders }}</p>
    </a>

    <!-- Low Stock Products -->
    <a href="{{ route('products.index') }}" class="bg-blue-500 text-white rounded-lg p-6 shadow hover:scale-105 transition block">
        <h3 class="text-xl font-bold mb-2">Low Stock Products</h3>
        <ul class="list-disc pl-5">
            @forelse($lowStockProducts as $product)
                <li>{{ $product->name }} ({{ $product->quantity }})</li>
            @empty
                <li>All products in stock</li>
            @endforelse
        </ul>
    </a>

</div>
@endsection
