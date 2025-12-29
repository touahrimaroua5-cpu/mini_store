@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Order</h2>

<form action="/orders" method="POST" class="bg-white p-6 shadow rounded w-96">
@csrf

<label class="block mb-2 font-semibold">Select Client</label>
<select name="client_id" class="w-full border mb-4 p-2 rounded">
    <option value="">-- Select Client --</option>
    @foreach($clients as $client)
        <option value="{{ $client->id }}">{{ $client->name }}</option>
    @endforeach
</select>

<label class="block mb-2 font-semibold">Products</label>
@foreach($products as $product)
<div class="flex justify-between mb-2">
    <span>{{ $product->name }} (Stock: {{ $product->quantity }})</span>
    <input type="number" name="products[{{ $product->id }}]" min="0" max="{{ $product->quantity }}" value="0" class="w-16 border p-1 rounded">
</div>
@endforeach

<button class="bg-green-600 text-white px-3 py-2 rounded mt-4">Create Order</button>
</form>
@endsection
