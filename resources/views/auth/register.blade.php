<!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-900">
    <body class="h-full">
    ```
    -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (session('error'))
        <script>
                Swal.fire({
    title: "error",
    text: "{{session('error')}}",
    icon: "error",
    });
        </script>

        @endif
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8  bg-gray-400">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">register your account</h2>
    </div>

    

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="{{ route('action.register') }}" method="POST" class="space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-100">Name</label>
        <input type="text" name="name" required
            class="block w-full rounded-md bg-white px-3 py-2 text-black" />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-100">Email</label>
        <input type="email" name="email" required
            class="block w-full rounded-md bg-white px-3 py-2 text-black" />
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-100">Password</label>
        <input type="password" name="password" required
            class="block w-full rounded-md bg-white px-3 py-2 text-black" />
    </div>

    <button type="submit"
        class="w-full bg-indigo-500 text-white py-2 rounded-md">
        Register
    </button>
</form>

        <p class="mt-10 text-center text-sm/6 text-gray-400">
        sudah punya akun?
        <a href="{{route('login')}}" class="font-semibold text-indigo-400 hover:text-indigo-300">login</a>
        </p>
    </div>


    </div>