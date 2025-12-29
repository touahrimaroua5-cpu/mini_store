@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
  <h2 class="text-2xl font-bold">Clients</h2>
  <a href="/clients/create" class="bg-green-600 text-white px-3 py-1 rounded">+ Add Client</a>
</div>

<table class="w-full bg-white shadow rounded">
<thead class="bg-gray-200">
<tr>
  <th class="p-2 text-left">Name</th>
  <th class="p-2 text-left">Email</th>
  <th class="p-2 text-left">Phone</th>
  <th class="p-2 text-center">Actions</th>
</tr>
</thead>

<tbody>
@foreach($clients as $client)
<tr class="border-b">
  <td class="p-2">{{ $client->name }}</td>
  <td class="p-2">{{ $client->email }}</td>
  <td class="p-2">{{ $client->phone }}</td>
  <td class="p-2 flex gap-3 justify-center">
    <a href="/clients/{{ $client->id }}/edit" class="text-blue-700 underline">Edit</a>
    <form action="/clients/{{ $client->id }}" method="POST">
      @csrf @method('DELETE')
      <button class="text-red-600">Delete</button>
    </form>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
