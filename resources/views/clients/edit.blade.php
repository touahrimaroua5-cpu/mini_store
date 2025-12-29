@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Client</h2>

<form action="/clients/{{ $client->id }}" method="POST" class="bg-white p-6 shadow rounded w-96">
@csrf @method('PUT')

<input type="text" name="name" value="{{ $client->name }}" class="w-full border mb-3 p-2 rounded">
<input type="email" name="email" value="{{ $client->email }}" class="w-full border mb-3 p-2 rounded">
<input type="text" name="phone" value="{{ $client->phone }}" class="w-full border mb-3 p-2 rounded">

<button class="bg-blue-600 text-white px-3 py-2 rounded">Update</button>
</form>
@endsection
