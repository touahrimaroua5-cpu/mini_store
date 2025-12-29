@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Client</h2>

<form action="/clients" method="POST" class="bg-white p-6 shadow rounded w-96">
@csrf

<input type="text" name="name" placeholder="Name" class="w-full border mb-3 p-2 rounded">
<input type="email" name="email" placeholder="Email" class="w-full border mb-3 p-2 rounded">
<input type="text" name="phone" placeholder="Phone (optional)" class="w-full border mb-3 p-2 rounded">

<button class="bg-green-600 text-white px-3 py-2 rounded">Save</button>
</form>
@endsection
