@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>

<form action="{{ route('categories.update', $category) }}" method="POST">
@csrf @method('PUT')
<input type="text" name="name" value="{{ $category->name }}">
<button type="submit">Update</button>
</form>
@endsection
