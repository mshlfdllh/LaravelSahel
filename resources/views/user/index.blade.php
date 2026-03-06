<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1e1f24] text-gray-200">

<x-navbar></x-navbar>

@if (session('success'))
<script>
Swal.fire({
    title: "Success",
    text: "{{ session('success') }}",
    icon: "success",
    background: "#2a2d35",
    color: "#ffffff",
});
</script>
@endif

<div class="container mx-auto p-6">
    <div class="grid md:grid-cols-3 gap-6">

@foreach ($books as $book)

<a href="#" class="block rounded-lg p-4 bg-[#2a2d35] shadow-lg shadow-black/30">

  <img alt="" 
       src="{{asset('storage/' . $book->image)}}" 
       class="h-135 w-full rounded-md object-cover">

  <div class="mt-2">
    <dl>
      <div>
        <dt class="sr-only">{{$book->tahun_terbit}}</dt>

        <dd class="text-sm text-gray-400">
            Release Year : {{$book->tahun_terbit}}
        </dd>
      </div>

      <div>
        <h2 class="font-semibold text-white text-lg">
            {{$book->title}}
        </h2>

        <p class="text-sm text-gray-400 mt-2 leading-relaxed line-clamp-3 overflow-scroll">
            {{$book->sinopsis}}
        </p>
      </div>
    </dl>

    <div class="mt-6 grid grid-cols-2 gap-6 text-sm">

            <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
            </svg>

            <div>
                <p class="text-gray-500 text-xs">Author</p>
                <p class="font-medium text-gray-200">
                    {{$book->author->name_author}}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
            </svg>

            <div>
                <p class="text-gray-500 text-xs">Genre</p>
                <p class="font-medium text-gray-200">
                    {{$book->genre->name_genres}}
                </p>
            </div>
        </div>

    </div>
  </div>
</a>

@endforeach

    </div>
</div>

</body>
</html>

