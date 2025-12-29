@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h2>

<p><strong>Client:</strong> {{ $order->client->name }}</p>
<p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y') }}</p>

<h3 class="mt-4 font-semibold">Products</h3>
<table class="w-full bg-white shadow rounded mt-2">
<tr class="bg-gray-200">
    <th class="p-2">Name</th>
    <th class="p-2">Quantity</th>
    <th class="p-2">Price</th>
</tr>
@foreach($order->items as $item)
<tr class="border-b">
    <td class="p-2">{{ $item->product->name }}</td>
    <td class="p-2">{{ $item->quantity }}</td>
    <td class="p-2">{{ $item->price }} MAD</td>
</tr>
@endforeach
</table>

<a href="/orders" class="text-blue-600 mt-4 block">← Back to Orders</a>
@endsection
