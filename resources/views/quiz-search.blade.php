<!DOCTYPE html>
<html lang="en">

<head>

    <title>Show Category Wise Quiz Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class=" bg-gray-100 flex flex-col items-center min-h-screen pt-5">

        <h2 class=" text-2xl text-center text-orange-400 mb-4 font--bold ">Search : {{ $quiz }}</h2>

        <div class=" w-200 pt-1">

            <ul class="border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-[80px] text-center">Quiz Id</li>
                        <li class="w-[300px] text-left">Name</li>
                        <li class="w-[150px] text-center">No. of Questions</li>
                        <li class="w-[100px] text-center">Action</li>
                    </ul>
                </li>

                @foreach($quizData as $item)
                <li class="even:bg-gray-200 p-3">
                    <ul class="flex justify-between">
                        <li class="w-[80px] text-center">{{ $item->id }}</li>
                        <li class="w-[300px] text-left">{{ $item->name }}</li>
                        <li class="w-[150px] text-center">{{ $item->mcq_count }}</li>
                        <li class="w-[100px] text-center">
                            <a href="/start-quiz/{{ $item->id }}/{{ $item->name }}" class="font-bold text-green-500">
                                Start Quiz
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
