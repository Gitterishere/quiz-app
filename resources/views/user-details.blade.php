
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Details Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>

<body>
    <x-user-navbar />
    <div class=" flex flex-col min-h-screen items-center bg-gray-100">
        <h2 class=" text-4xl font-bold text-orange-400 p-5">Attempted Quiz</h2>

        <div class=" w-200 pt-10">

            <ul class=" border border-gray-200 mt-5">
                <li class="p-2 font-bold">
                    <ul class=" flex justify-between">
                        <li class="w-50">Sr.No</li>
                        <li class="w-100">Name</li>
                        <li class="w-50">Status</li>

                    </ul>
                </li>
                @foreach ($quizRecord as $key=>$record)
                <li class=" even:bg-gray-200 p-3">
                    <ul class=" flex justify-between">
                        <li class="w-50">{{$key+1}}</li>
                        <li class="w-100">{{$record->name}}</li>
                        <li class="w-50">
                            @if ($record->status==2)
                            <span class=" text-green-500">Completed</span>
                            @else
                            <span class=" text-red-500">Not Completed</span>
                            @endif
                        </li>


                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <x-foooter-user />
</body>
