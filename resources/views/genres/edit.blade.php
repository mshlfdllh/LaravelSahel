@extends('layouts.app')
    @section('content')
        <h1>Welcome to update genre {{$update->name_genres}}</h1>


    <form class="max-w-md mx-auto" action="{{ route('genre.update', $update->id)}}" method="POST">
        @method("PUT")
        @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" value="{{$update->name_genres}}" name="name_genres" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required />
        <label for="name_genre" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Masukkan Genre</label>
    </div>
    <button type="submit" class="mt-2 bg-brand text-red-700 underline text-sm hover:text-red-950 cursor-grab" >Submit</button>
    </form>

    @endsection