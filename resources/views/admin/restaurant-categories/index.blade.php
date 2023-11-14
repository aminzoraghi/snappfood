@extends('admin.nav')
@section('content')
    {{ session()->get('success') }}
    {{ session()->get('error') }}
    <div class="relative mt-16 overflow-x-auto shadow-md sm:rounded-lg">
        <button><a href="{{ route('admin.restaurant-categories.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">add new restaurant category</a></button><br>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">
                    restaurant category name
                </th>
                <th scope="col" class="px-6 py-4">
                    description
                </th>
                <th scope="col" class="px-6 py-4">
                    created time
                </th>
                <th scope="col" class="px-6 py-4">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurantCategories as $restaurantCategory)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $restaurantCategory->name }}
                </th>
                <td class="px-6 py-4">
                    {{ Str::limit( $restaurantCategory->description, 20) }}
                </td>
                <td class="px-6 py-4">
                    {{ $restaurantCategory->created_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.restaurant-categories.show', $restaurantCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    <a href="{{ route('admin.restaurant-categories.edit', $restaurantCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.restaurant-categories.destroy',$restaurantCategory)}}" method='POST'>
                        @csrf
                    @method('DELETE')
                        <button type="submit" >delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
