@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-700">Categories</h2>
    <a href="/categories/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">+ Add Category</a>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
<table class="min-w-full">
<thead class="bg-gray-100">
<tr>
    <th class="px-6 py-3 text-left font-medium uppercase text-gray-600">Name</th>
    <th class="px-6 py-3 text-center font-medium uppercase text-gray-600">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-gray-200">
@foreach($categories as $category)
<tr class="hover:bg-gray-50 transition">
    <td class="px-6 py-4">{{ $category->name }}</td>
    <td class="px-6 py-4 flex justify-center gap-2">
        <a href="/categories/{{ $category->id }}/edit" class="text-blue-600 font-medium hover:underline">Edit</a>
        <form action="/categories/{{ $category->id }}" method="POST">
            @csrf @method('DELETE')
            <button class="text-red-600 font-medium hover:underline">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
