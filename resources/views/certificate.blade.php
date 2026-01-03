<!DOCTYPE html>
<html lang="en">
<head>

    <title>Certificate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">

    @vite("resources/css/app.css")

</head>
<body class=" pt-10 text-center">
    <div class=" flex justify-between w-200 ml-10">
        <a href="/download-certificate" class=" text-green-500 font-bold">Download Certificate</a>
        <a href="/" class=" text-green-500 font-bold">Back</a>

    </div>
    <div class=" m-10 bg-gray-100 border-indigo-500 border-4 p-10 text-center w-200">
        <h1 class=" text-5xl flex">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#1f1f1f"><path d="m385-412 36-115-95-74h116l38-119 37 119h117l-95 74 35 115-94-71-95 71ZM244-40v-304q-45-47-64.5-103T160-560q0-136 92-228t228-92q136 0 228 92t92 228q0 57-19.5 113T716-344v304l-236-79-236 79Zm236-260q109 0 184.5-75.5T740-560q0-109-75.5-184.5T480-820q-109 0-184.5 75.5T220-560q0 109 75.5 184.5T480-300ZM304-124l176-55 176 55v-171q-40 29-86 42t-90 13q-44 0-90-13t-86-42v171Zm176-86Z"/></svg>
            <span> Certificate Of Completion</span></h1>
        <p class=" mt-5 text-2xl ">This is to clarify that</p>
        <h2 class=" text-4xl">{{ $data['userName'] }}</h2>
        <p class=" mt-3 text-2xl ">has successfully completed the</p>
        <h1 class=" text-3xl">{{ $data['quizName'] }}</h1>
        <p class=" mt-5  text-2xl ">{{ date('y-m-d')}}</p>
    </div>
</body>
</html>

