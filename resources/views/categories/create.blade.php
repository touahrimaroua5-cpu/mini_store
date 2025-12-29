@extends('layouts.app')

@section('content')
<h2>Create Category</h2>

<form action="{{ route('categories.store') }}" method="POST">
@csrf
<input type="text" name="name" placeholder="Category name">
<button type="submit">Save</button>
</form>
@endsection
