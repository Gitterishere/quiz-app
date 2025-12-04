<!DOCTYPE html>
<html lang="en">
<head>

    <title>Show Category Wise Quiz Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body>
    <x-user-navbar ></x-user-navbar>

    <div class=" bg-gray-100 flex flex-col items-center min-h-screen pt-5">

        <h1 class=" text-4xl text-center text-orange-400 mb-4 font-bold ">{{ $quizName }}

        </h1>
        <h2 class=" text-2xl text-center text-orange-400 mb-4 font-bold pt-2 ">This Quiz Contains {{$quizCount}} Questions and has no Limit to attempt.</h2>
        <h1 class=" text-4xl text-center text-orange-400 mb-4 font-bold pt-2 ">Good Luck</h1>

        @if(session('user'))
        <a type="submit" href="/user-signup" class="  bg-blue-500 rounded-md px-4 py-2 my-5 text-white text-lg hover:cursor-pointer">Start Quiz</a>
        @else
        <a type="submit" href="/user-signup-quiz" class="  bg-blue-500 rounded-md px-4 py-2 my-5 text-white text-lg hover:cursor-pointer">SignUp</a>
        <a type="submit" href="/user-login-quiz" class="  bg-blue-500 rounded-md px-4 py-2 my-5 text-white text-lg hover:cursor-pointer">Login</a>
        @endif

    </div>


</body>
</html>

