<!DOCTYPE html>
<html lang="en">
<head>

    <title>Show Category Wise Quiz Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body>
    <x-navbar ></x-navbar>

    <div class=" bg-gray-100 flex flex-col items-center min-h-screen pt-5">

        <h2 class=" text-2xl text-center text-gray-800 mb-6  ">Category Name : {{ $category}}
            <a class=" text-yellow-500 text-sm font-bold" href="/admin-categories">Back</a>
        </h2>



        <div class=" w-200 pt-10">

            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-[80px]">Quiz Id</li>
                        <li class="w-[300px]">Name</li>
                        <li class="w-[100px] text-center">Action</li>

                    </ul>
                </li>
                @foreach($quizData as $item)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-[80px]">{{ $item->id }}</li>
                        <li class="w-[300px]">{{ $item->name }}</li>
                        <li class="w-[100px] text-center">
                            <a href="/show-quiz/{{ $item->id }}/{{ $item->name }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>


</body>
</html>
