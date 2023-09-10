<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);

        return view('books.index', compact('books'))->with('i', (request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', compact('publishers', $publishers));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Berhasil menyimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        return view('books.edit', compact('book','publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Berhasil dihapus!');
    }
}
