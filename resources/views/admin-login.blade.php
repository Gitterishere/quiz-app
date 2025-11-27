<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin Login</title>
    @vite("resources/css/app.css")
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class=" bg-white p-8 rounded-2xl max-w-sm shadow-lg w-full">
        <h2 class=" text-2xl text-center text-gray-800 mb-6  ">Admin Login </h2>
        @error('user')
        <div class=" text-red-500">{{$message}}</div>
        @enderror
        <form action="/admin-login" method="post" class=" space-y-4">
            @csrf
            <div class="">
                <label for="" class=" text-gray-600 mb-1">Admin Name</label>
                <input type="text" name="name" id="" placeholder="Enter Admin Name"
                class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none"
                >
                @error('name')
                <div class=" text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div class="">
                <label for="" class=" text-gray-600 mb-1" >Password</label>
                <input type="password" name="password" id="" placeholder="Enter Admin Password" class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                @error('password')
                <div class=" text-red-500">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Login</button>
        </form>
    </div>
</body>
</html>
