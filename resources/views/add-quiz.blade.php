<!DOCTYPE html>
<html lang="en">
<head>

    <title>Add Quiz Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body>
    <x-navbar ></x-navbar>
    <div class="flex flex-col items-center min-h-screen pt-5">
        <div class=" bg-white p-8 rounded-2xl max-w-sm shadow-lg w-full">
            @if (!session('quizDetails'))


            <h2 class=" text-2xl text-center text-gray-800 mb-6  ">Add Quiz</h2>

            <form action="add-quiz" method="get" class=" space-y-4">

                <div class="">

                    <input type="text" name="quiz" id="" placeholder="Enter Quiz Name"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">

                </div>
                <div class="">

                        <select name="category_id" id=""
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                        </select>
                </div>

                <button type="submit"
                    class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add</button>
            </form>
            @else
            <span class=" font-bold text-green-400">{{session('quizDetails')->name}}</span>
            <h2 class=" text-2xl text-center text-gray-800 mb-6  ">Add MCQ's</h2>
            <form action="" method="get" class=" space-y-4">
                <div class="">

                    <textarea type="text" name="quiz" id="" placeholder="Enter Quiz Question"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none"></textarea>

                </div>
                <div class="">

                    <input type="text" name="quiz" id="" placeholder="Enter First Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">

                </div>
                <div class="">

                    <input type="text" name="quiz" id="" placeholder="Enter Second Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">

                </div>
                <div class="">

                    <input type="text" name="quiz" id="" placeholder="Enter Third Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">

                </div>
                <div class="">

                    <input type="text" name="quiz" id="" placeholder="Enter Fourth Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">

                </div>
                <div class="">

                    <select type="text" name="right-answer" id=""
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                        <option value="">Select Correct Option</option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                        <option value="">D</option>
                    </select>

                </div>
                <button type="submit" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add More</button>
                <button type="submit" class=" w-full bg-green-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add and Submit</button>
            </form>
            @endif
        </div>
    </div>
</body>
