<nav class=" bg-white shadow-md px-4 py-3">
    <div class=" flex justify-between items-center">
        <div class=" text-2xl text-orange-400 hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>
        <div class=" space-x-4">
            <a href="/" class=" text-orange-400 hover:text-blue-500">Home</a>
            <a href="/categories-list" class=" text-orange-400 hover:text-blue-500">Categories</a>

            @if (session('user'))
            <a href="/user-details" class=" text-orange-400 hover:text-blue-500">Welcome {{session('user')->name}}</a>
            <a href="/user-logout" class=" text-orange-400 hover:text-blue-500">Logout</a>
            @else
            <a href="/user-login" class=" text-orange-400 hover:text-blue-500">Login</a>
            <a href="/user-signup" class=" text-orange-400 hover:text-blue-500">Signup</a>
            @endif

            <a href="/admin-logout" class=" text-orange-400 hover:text-blue-500">Blog</a>
        </div>
    </div>
</nav>
