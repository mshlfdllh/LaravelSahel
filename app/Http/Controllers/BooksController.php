<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //function index

    public function index ()
    {
        $books= Books::all();
        $no = 1;
        return view('books.index', compact('books', 'no'));
    }

    // function create

    public function create (){
        $genres = Genres::all();
        $authors = Authors::all();
        return view ('books.create', compact('genres', 'authors'));
    }



    // function store

    public function store (request $request){
        $books = $request->validate([
            "title" => "required|max:255",
            "sinopsis"=> "required",
            "tahun_terbit" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "genre_id" => "required",
            "author_id" => "required"
        ]);

        $imagePath = $request->file('image')->store('books', 'public');

        if(!$books) {
            return redirect()->route('books.index')->with('error', 'Data Gagal Disimpan');
        }

        books::create([
            'title' => $request->title,
            'sinopsis' => $request->sinopsis,
            'tahun_terbit' => $request->tahun_terbit,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
            'image' => $imagePath
        ]);

        return redirect()->route('books.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function detail($id)
    {
        $detail = Books::find($id);
        return view('books.detail', compact('detail'));
    }

    public function edit($id)
{
    $book = Books::findOrFail($id);
    $genres = Genres::all();
    $authors = Authors::all();

    return view('books.edit', compact('book','genres','authors'));
}

    public function update(Request $request, $id)
{
    $book = Books::findOrFail($id);

    $request->validate([
        "title" => "required|max:255",
        "sinopsis"=> "required",
        "tahun_terbit" => "required",
        "genre_id" => "required",
        "author_id" => "required",
        "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('books', 'public');
        $book->image = $imagePath;
    }

    $book->title = $request->title;
    $book->sinopsis = $request->sinopsis;
    $book->tahun_terbit = $request->tahun_terbit;
    $book->genre_id = $request->genre_id;
    $book->author_id = $request->author_id;

    $book->save();

    return redirect()->route('books.index')
        ->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
{
    $book = Books::findOrFail($id);

    // optional: hapus file gambar juga
    if ($book->image && file_exists(public_path('storage/' . $book->image))) {
        unlink(public_path('storage/' . $book->image));
    }

    $book->delete();

    return redirect()->route('books.index')
        ->with('success', 'Data berhasil dihapus');
}


}