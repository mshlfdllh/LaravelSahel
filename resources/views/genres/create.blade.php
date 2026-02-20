@extends('layouts.app')

@section('content')
    <h1>Welcome to create genre</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>  
            @endif

<form class="max-w-md mx-auto" action="{{ route('genre.store')}}" method="POST">
    @csrf
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="name_genres" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required />
      <label for="name_genres" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Name Genre</label>
      <button type="submit" class="mt-2 bg-brand text-red-700 underline text-sm hover:text-red-950 cursor-grab" >Submit</button>
  </div>
</form>

@endsection