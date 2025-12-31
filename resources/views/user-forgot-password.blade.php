<!DOCTYPE html>
<html lang="en">
<head>

    <title>Forgot Pasword</title>
    @vite("resources/css/app.css")
</head>
<body>
<x-user-navbar />
<div class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class=" bg-white p-8 rounded-2xl max-w-sm shadow-lg w-full">
        <h2 class=" text-2xl text-center text-gray-800 mb-6 font-bold ">Forgot Password</h2>
        @error('user')
        <div class=" text-red-500">{{$message}}</div>
        @enderror
        <form action="/user-forgot-password" method="post" class=" space-y-4">
            @csrf

            <div class="">

                <input type="text" name="email" id="" placeholder="Enter User Email"
                class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none"
                >
                @error('email')
                <div class=" text-red-500">{{$message}}</div>
                @enderror
            </div>



            <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 mt-2 text-white text-lg hover:cursor-pointer">Submit</button>

        </form>
    </div>

</div>
</body>
</html>
