@extends('admin.nav')
@section('content')
    {{ session()->get('success') }}
    {{ session()->get('error') }}
    <div class="relative mt-16 overflow-x-auto shadow-md sm:rounded-lg">
        <button><a href="{{ route('admin.food-categories.create')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">add new food category</a></button><br>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">
                    food category name
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
            @foreach($foodCategories as $foodCategory)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $foodCategory->name }}
                </th>
                <td class="px-6 py-4">
                    {{ Str::limit( $foodCategory->description, 20) }}
                </td>
                <td class="px-6 py-4">
                    {{ $foodCategory->created_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.food-categories.show', $foodCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">show</a>
                    <a href="{{ route('admin.food-categories.edit', $foodCategory->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.food-categories.destroy',$foodCategory)}}" method='POST'>
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
{{--<div class="container">--}}
{{--    @if(session()->has('success'))--}}
{{--        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"--}}
{{--             style="margin-top: 20px;">--}}
{{--            <strong>Success!</strong> {{ session()->get('success') }}--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--        </div>--}}

{{--        <script>--}}
{{--            setTimeout(function () {--}}
{{--                $('#success-alert').fadeOut('slow');--}}
{{--            }, 2000);--}}
{{--        </script>--}}
{{--    @endif--}}

{{--    <table class="table table-striped mt-5">--}}
{{--        <thead class="table-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">Food Category Name</th>--}}
{{--            <th scope="col">Description</th>--}}
{{--            <th scope="col">Create Time</th>--}}
{{--            --}}{{--                <th scope="col">Price</th>--}}
{{--            <th scope="col">Actions</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($foodCategories as $foodCategory)--}}
{{--            <tr>--}}
{{--                --}}{{-- max length of title is 20 characters --}}
{{--                <td>{{ Str::limit($foodCategory->name, 20) }}</td>--}}
{{--                <td>{{ $foodCategory->description }}</td>--}}
{{--                <td>{{ $foodCategory->created_at }}</td>--}}
{{--                <td>--}}
{{--                    <a href="{{ route('admin.food-categories.show', $foodCategory->id) }}" class="btn btn-success"><i--}}
{{--                            class="fas fa-eye"></i> Show</a>--}}
{{--                    <a href="{{ route('admin.food-categories.edit', $foodCategory->id) }}" class="btn btn-primary"><i--}}
{{--                            class="fas fa-edit"></i> Edit</a>--}}
{{--                    <form action="{{ route('admin.food-categories.destroy', $foodCategory->id) }}" method="POST" class="d-inline">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i--}}
{{--                                class="fas fa-trash"></i> Delete--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--<div class="table-responsive">--}}
{{--    --}}{{--        {{ $foodCategories->links() }}--}}
{{--</div>--}}
