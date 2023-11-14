@extends('admin.nav')
@section('content')
    <div class="mt-16 ml-4">
    <p>name={{ $foodCategory->name }}</p>
    <p>description={{ $foodCategory->description }}</p>
    <p> created time={{ $foodCategory->created_at}}</p>
    <button><a href="{{ route('admin.food-categories.index')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show all</a></button><br>
    <button><a href="{{ route('admin.food-categories.edit', $foodCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></button><br>
        <form action="{{ route('admin.food-categories.destroy',$foodCategory)}}" method='POST'>
            @csrf
            @method('DELETE')
            <button type="submit" >delete</button>
        </form>        <button><a href="{{ route('admin.food-categories.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">add new food category</a></button><br>
    </div>
@endsection
