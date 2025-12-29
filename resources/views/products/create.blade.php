@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Product</h2>

<form action="/products" method="POST" class="bg-white p-6 shadow rounded w-96">
@csrf

<input type="text" name="name" placeholder="Name" class="w-full border mb-3 p-2 rounded">
<input type="number" step="0.01" name="price" placeholder="Price" class="w-full border mb-3 p-2 rounded">
<input type="number" name="quantity" placeholder="Quantity" class="w-full border mb-3 p-2 rounded">

<select name="category_id" class="w-full border mb-3 p-2 rounded">
  <option value="">Select Category</option>
  @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
  @endforeach
</select>

<button class="bg-green-600 text-white px-3 py-2 rounded">Save</button>
</form>
@endsection
