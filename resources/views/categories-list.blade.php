<!DOCTYPE html>
<html lang="en">

<head>

    <title>Quiz System Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>

<body>
    <x-user-navbar class=" sticky"/>
    <div class=" flex flex-col min-h-screen items-center bg-gray-100">

        <div class=" w-200 pt-10">
            <h1 class=" text-green-500  text-center  text-2xl">Top Categories</h1>
            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-30">Sr.No</li>
                        <li class="w-70">Name</li>
                        <li class="w-70">Quiz Count</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
                @foreach ($categories as $key=>$category)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-30">{{$key+1}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->quizzes_count}}</li>

                        <li class="w-30">

                            <a href="/user-quiz-list/{{ $category->id }}/{{ str_replace(' ','-',$category->name) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                        </li>
                    </ul>
                </li>
                @endforeach

            </ul>
            <div class=" mb-10 mt-5">
                {{ $categories->links() }}
            </div>
        </div>

    </div>
    <x-foooter-user />
</body>
