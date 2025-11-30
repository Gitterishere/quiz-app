<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin Categories Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body>
    <x-navbar ></x-navbar>

    <div class=" bg-gray-100 flex flex-col items-center min-h-screen pt-5">

        <h2 class=" text-2xl text-center text-gray-800 mb-6  ">All Current MCQs
            <a class=" text-yellow-500 text-sm font-bold" href="/add-quiz">Back</a>
        </h2>



        <div class=" w-200 pt-10">

            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-30">MCQ Id</li>
                        <li class="w-100">Question</li>

                    </ul>
                </li>
                @foreach ($mcqs as $mcq)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-30">{{$mcq->id}}</li>
                        <li class="w-170">{{$mcq->question}}</li>

                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>


</body>
</html>
