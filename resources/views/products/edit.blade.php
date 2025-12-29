@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Product</h2>

<form action="/products/{{ $product->id }}" method="POST" class="bg-white p-6 shadow rounded w-96">
@csrf @method('PUT')

<input type="text" name="name" value="{{ $product->name }}" class="w-full border mb-3 p-2 rounded">
<input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border mb-3 p-2 rounded">
<input type="number" name="quantity" value="{{ $product->quantity }}" class="w-full border mb-3 p-2 rounded">

<select name="category_id" class="w-full border mb-3 p-2 rounded">
  @foreach($categories as $category)
    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
      {{ $category->name }}
    </option>
  @endforeach
</select>

<button class="bg-blue-600 text-white px-3 py-2 rounded">Update</button>
</form>
@endsection

