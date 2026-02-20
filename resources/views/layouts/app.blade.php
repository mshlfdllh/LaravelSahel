<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-900 text-white p-5">
            <h1 class="text-xl font-bold mb-6">Dashboard</h1>
            <ul class="space-y-3">
                <li> <a href="" class="block text-white ">Home</a> </li>
                <li> <a href="{{ route('genre.index')}}" class="block text-white ">Genre</a> </li>
                <li> <a href="{{route('penulis.index')}}" class="block text-white ">Author</a> </li>
                <li> <a href="" class="block text-white ">Books</a> </li>
            </ul>
        </aside>
        <div class="flex-1 flex flex-col">
            <nav class="bg-white shadow p-4 flex justify-between ">
            <p>Welcome, <span>User</span></p>
            <a href="" class="text-red-500">Logout</a>
        </nav>
        <main class="p-6 ">
            @yield('content')
        </main>
        </div>
    </div>
</body>
</html>