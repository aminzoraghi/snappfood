@extends('admin.nav')
@section('content')
    <div class="container mx-auto px-4">
        {{ session()->get('error') }}
        <form action="{{ route('admin.food-categories.store') }}" method="POST" class="flex flex-col gap-4 mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Category Name</label>
                <input
                    type="text"
                    class="form-input w-full rounded-md border border-gray-300 px-3 py-2 text-gray-700 focus:border-indigo-500 focus:outline-none"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter Category Name"
                />
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description</label>
                <textarea
                    rows="3"
                    class="form-textarea w-full rounded-md border border-gray-300 px-3 py-2 text-gray-700 focus:border-indigo-500 focus:outline-none resize-none"
                    id="description"
                    name="description"
                    placeholder="Enter Description"
                >{{ old('description') }}</textarea>
                @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-indigo-600 text-black font-medium rounded-lg px-4 py-2 hover:bg-indigo-700 transition-colors">Submit</button>
            </div>
        </form>
    </div>
@endsection
