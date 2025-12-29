@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
  <h2 class="text-2xl font-bold">Products</h2>
  <a href="/products/create" class="bg-green-600 text-white px-3 py-1 rounded">+ Add Product</a>
</div>

<table class="w-full bg-white shadow rounded">
<thead class="bg-gray-200">
<tr>
  <th class="p-2 text-left">Name</th>
  <th class="p-2 text-left">Price</th>
  <th class="p-2 text-left">Stock</th>
  <th class="p-2 text-left">Category</th>
  <th class="p-2 text-center">Actions</th>
</tr>
</thead>

<tbody>
@foreach($products as $product)
<tr class="border-b">
  <td class="p-2">{{ $product->name }}</td>
  <td class="p-2">{{ $product->price }} MAD</td>
  <td class="p-2">{{ $product->quantity }}</td>
  <td class="p-2">{{ $product->category->name }}</td>
  <td class="p-2 text-center flex gap-3 justify-center">
    <a href="/products/{{ $product->id }}" class="text-green-700 underline">View</a>
    <a href="/products/{{ $product->id }}/edit" class="text-blue-700 underline">Edit</a>
    <form action="/products/{{ $product->id }}" method="POST">
      @csrf @method('DELETE')
      <button class="text-red-600">Delete</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
