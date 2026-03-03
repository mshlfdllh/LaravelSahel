@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Book</h1>

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <div class="w-full max-w-3xl bg-white shadow-xl rounded-2xl p-8">

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-semibold">Judul buku</label>
                <input type="text" name="title"
                    value="{{ $book->title }}"
                    class="w-full rounded-lg p-3 border">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Sinopsis</label>
                <input type="text" name="sinopsis"
                    value="{{ $book->sinopsis }}"
                    class="w-full rounded-lg p-3 border">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Tahun terbit</label>
                <input type="number" name="tahun_terbit"
                    value="{{ $book->tahun_terbit }}"
                    class="w-full rounded-lg p-3 border">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Genre</label>
                <select name="genre_id" class="w-full rounded-lg p-3 border">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name_genres }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Author</label>
                <select name="author_id" class="w-full rounded-lg p-3 border">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ $book->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name_author }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Gambar Sekarang</label>
                <img src="{{ asset('storage/' . $book->image) }}" width="100" class="mb-3">

                <input type="file" name="image" class="w-full rounded-lg p-3 border">
            </div>

            <button type="submit"
                class="px-6 py-2 rounded-lg bg-blue-500 text-white mt-3">
                Update Book
            </button>

        </form>

    </div>
</div>

@endsection