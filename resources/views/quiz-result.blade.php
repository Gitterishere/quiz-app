<!DOCTYPE html>
<html lang="en">

<head>

    <title>Results Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>

<body>
    <x-user-navbar />
    <div class=" flex flex-col min-h-screen items-center bg-gray-100">
        <h2 class=" text-4xl font-bold text-orange-400 p-5">Quiz Result</h2>

        <div class=" w-200 pt-6">
            <h1 class=" text-green-500  text-center  text-2xl">{{$correctAns}} out of {{count($resultData)}} Correct</h1>
            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-30">Sr.No</li>
                        <li class="w-70">Question</li>
                        <li class="w-70">Results</li>

                    </ul>
                </li>
                @foreach ($resultData as $key=>$item)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-30">{{$key+1}}</li>
                        <li class="w-70">{{$item->question}}</li>
                        @if ($item->is_correct)
                        <li class="w-70 text-green-500">Correct</li>
                        @else
                        <li class="w-70 text-red-500">Incorrect</li>
                        @endif

                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <x-foooter-user />
</body>

