<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
	    return view('books.all', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'title' => 'required|max:255|min:8',
            'author' => 'required|max:255|min:8',
            'isbn' => 'nullable|max:255|min:16',
            'description' => 'nullable|max:255|min:8',
        ], [
            'title.required' => 'Please, Enter The Book Title.',
            'author.required' => 'Please, Enter The Author Name.',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->save();

        return redirect()->route('books.create')->with('success', 'New Book Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $books = Book::findOrFail($id);

        return response()->view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Book::findOrFail($id);

        return response()->view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required|max:255|min:8',
            'author' => 'required|max:255|min:8',
            'isbn' => 'nullable|max:255|min:16',
            'description' => 'nullable|max:255|min:8',
        ], [
            'title.required' => 'Please, Enter The Book Title.',
            'author.required' => 'Please, Enter The Author Name.',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $isSave = $book->save();

        if ($isSave) {
            return redirect()->route('books.edit', $id)->with('success', 'Book Edited Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {

        $book = Book::findOrFail($id);

        $book->delete();

        $page = $request->query('page', 1);

        return redirect()->route('books.index', ['page' => $page])->with('success', 'The Book Deleted Successfully!');
    }
}
