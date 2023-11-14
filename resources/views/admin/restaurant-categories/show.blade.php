@extends('admin.nav')
@section('content')
    <div class="mt-16 ml-4">
    <p>name={{ $restaurantCategory->name }}</p>
    <p>description={{ $restaurantCategory->description }}</p>
    <p> created time={{ $restaurantCategory->created_at}}</p>
    <button><a href="{{ route('admin.restaurant-categories.index')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show all</a></button><br>
    <button><a href="{{ route('admin.restaurant-categories.edit', $restaurantCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></button><br>
        <form action="{{ route('admin.restaurant-categories.destroy',$restaurantCategory)}}" method='POST'>
            @csrf
            @method('DELETE')
            <button type="submit" >delete</button>
        </form>
        <button><a href="{{ route('admin.restaurant-categories.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">add new restaurant category</a></button><br>
    </div>
@endsection
