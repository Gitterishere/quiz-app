<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin Categories Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body>
    <x-navbar ></x-navbar>
    @if (session('category'))
    <div class=" bg-green-500 text-white pl-5">{{session('category')}}</div>
    @endif
    <div class="flex flex-col items-center min-h-screen pt-5">
        <div class=" bg-white p-8 rounded-2xl max-w-sm shadow-lg w-full">
            <h2 class=" text-2xl text-center text-gray-800 mb-6  ">Add Category </h2>

            <form action="add-categories" method="post" class=" space-y-4">
                @csrf
                <div class="">

                    <input type="text" name="category" id="" placeholder="Enter Category Name"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                    @error('category')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit"
                    class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add</button>
            </form>
        </div>
        <div class=" w-200 pt-10">
            <h1 class=" text-blue-500  text-center  text-2xl">Category List</h1>
            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-30">Sr.No</li>
                        <li class="w-70">Name</li>
                        <li class="w-70">Creator</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
                @foreach ($categories as $category)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-30">{{$category->id}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->creator}}</li>
                        <li class="w-30">
                            <a href="category/delete/{{ $category->id }}" ><i class="fa-solid fa-trash text-red-600 text-xl mr-3"></i></a>
                            <a href="/quiz-list/{{ $category->id }}/{{ $category->name }}" ><i class="fa-solid fa-eye"></i></a>
                        </li>
                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>


</body>
</html>
