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

                    <input type="text" name="quiz" id="" placeholder="Enter Quiz Name" required
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
            <form action="add-mcq" method="post" class=" space-y-4">
                @csrf
                <div class="">

                    <textarea type="text" name="question" id="" placeholder="Enter Quiz Question"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none"></textarea>
                    @error('question')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="">

                    <input type="text" name="a" id="" placeholder="Enter First Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                    @error('a')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="">

                    <input type="text" name="b" id="" placeholder="Enter Second Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                    @error('b')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="">

                    <input type="text" name="c" id="" placeholder="Enter Third Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                    @error('c')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="">

                    <input type="text" name="d" id="" placeholder="Enter Fourth Option"
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                    @error('d')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="">

                    <select type="text" name="correct_ans" id=""
                        class=" w-full border border-gray-300 px-4 py-2 rounded-xl focus:outline-none">
                        <option value="">Select Correct Option</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('correct_ans')
                    <div class=" text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" name="submit" value="add-more" class=" w-full bg-blue-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add More</button>
                <button type="submit" name="submit" value="done" class=" w-full bg-green-500 rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Add and Submit</button>
                <a href="end-quiz" class="w-full bg-red-500 block text-center rounded-xl px-4 py-2 text-white text-lg hover:cursor-pointer">Finish Quiz</a>
            </form>
            @endif
        </div>
    </div>
</body>
