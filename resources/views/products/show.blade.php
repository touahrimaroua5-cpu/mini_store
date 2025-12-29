@extends('layouts.app')

@section('content')
<div class="bg-white p-6 shadow rounded w-96">

  <h2 class="text-2xl font-bold mb-3">{{ $product->name }}</h2>
  <p><strong>Price:</strong> {{ $product->price }} MAD</p>
  <p><strong>Stock:</strong> {{ $product->quantity }}</p>
  <p><strong>Category:</strong> {{ $product->category->name }}</p>

  <a href="/products" class="block mt-4 text-blue-600 underline">← Back</a>
</div>
@endsection
