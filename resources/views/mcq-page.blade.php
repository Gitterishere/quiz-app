<!DOCTYPE html>
<html lang="en">
<head>

    <title>MCQ Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body class="bg-gray-100">

<x-user-navbar />

<div class="max-w-4xl mx-auto mt-10">

    <!-- Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-green-800">{{ $quizName }}</h1>
        <h2 class="text-2xl font-bold text-green-700 mt-2">Question No. {{ session('currentQuiz')['totalMCQ'] }}</h2>
        <h2 class="text-xl font-bold text-green-700 mt-2">{{ session('currentQuiz')['currentMcq'] }} of {{ session('currentQuiz')['totalMCQ'] }}</h2>
    </div>

    <!-- Question Box -->
    <div class="bg-white shadow-xl rounded-xl p-6">

        <h3 class="text-xl font-bold text-center text-green-900 mb-4">
            {{$mcqData->question}}
        </h3>

        <form method="post" class=" space-y-4" action="/select-next/{{ $mcqData->id }}">
            @csrf
            <input type="hidden" name="id" value="{{ $mcqData->id }}">
            <label class="block rounded-xl border p-4 cursor-pointer hover:bg-blue-50 shadow-xl" for="option_1">
                <div class="flex items-center gap-3">
                    <input type="radio" id="option_1" name="option" value="a" class="form-radio text-green-600">
                    <span class="text-lg">{{$mcqData->a}}</span>
                </div>
            </label>
            <label class="block rounded-xl border p-4 cursor-pointer hover:bg-blue-50 shadow-xl" for="option_2">
                <div class="flex items-center gap-3">
                    <input type="radio" id="option_2" name="option" value="b" class="form-radio text-green-600">
                    <span class="text-lg">{{$mcqData->b}}</span>
                </div>
            </label>
            <label class="block rounded-xl border p-4 cursor-pointer hover:bg-blue-50 shadow-xl" for="option_3">
                <div class="flex items-center gap-3">
                    <input type="radio" id="option_3" name="option" value="c" class="form-radio text-green-600">
                    <span class="text-lg">{{$mcqData->c}}</span>
                </div>
            </label>
            <label class="block rounded-xl border p-4 cursor-pointer hover:bg-blue-50 shadow-xl" for="option_4">
                <div class="flex items-center gap-3">
                    <input type="radio" id="option_4" name="option" value="d" class="form-radio text-green-600">
                    <span class="text-lg">{{$mcqData->d}}</span>
                </div>
            </label>
            <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 mt-2 text-white text-lg hover:cursor-pointer">Submit And Next</button>
        </form>

    </div>

</div>

</body>
</html>

