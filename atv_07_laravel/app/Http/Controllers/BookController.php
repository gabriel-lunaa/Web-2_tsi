<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'publisher', 'category'])->get();
        return view('books.index', compact('books'));
    }

    public function createWithId()
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }
        return view('books.create-id');
    }

    public function storeWithId(Request $request)
{
        if (auth()->user()->isCliente()) {
            abort(403);
        }
        
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'publisher_id' => 'required|exists:publishers,id',
        'author_id' => 'required|exists:authors,id',
        'category_id' => 'required|exists:categories,id',
        'pages' => 'required|integer',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('covers', 'public');
        $validated['cover_image'] = $path;
    }

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
}

    public function createWithSelect()
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        return view('books.create-select', [
            'publishers' => Publisher::all(),
            'authors' => Author::all(),
            'categories' => Category::all()
        ]);
    }

    public function storeWithSelect(Request $request)
{
    if (auth()->user()->isCliente()) {
            abort(403);
        }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'publisher_id' => 'required|exists:publishers,id',
        'author_id' => 'required|exists:authors,id',
        'category_id' => 'required|exists:categories,id',
        'pages' => 'required|integer',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('covers', 'public');
        $validated['cover_image'] = $path;
    }

    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
}

    public function edit(Book $book)
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        return view('books.edit', [
            'book' => $book,
            'publishers' => Publisher::all(),
            'authors' => Author::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Book $book)
{
    if (auth()->user()->isCliente()) {
            abort(403);
        }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'publisher_id' => 'required|exists:publishers,id',
        'author_id' => 'required|exists:authors,id',
        'category_id' => 'required|exists:categories,id',
        'pages' => 'required|integer',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('cover_image')) {

        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $path = $request->file('cover_image')->store('covers', 'public');
        $validated['cover_image'] = $path;
    }

    $book->update($validated);

    return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
}

    public function show(Book $book)
    {
        $book->load(['author', 'publisher', 'category']);

        $users = User::all();

        return view('books.show', compact('book', 'users'));
    }

    public function destroy(Book $book)
{
    if (auth()->user()->isCliente()) {
            abort(403);
        }

    if ($book->cover_image) {
        Storage::disk('public')->delete($book->cover_image);
    }

    $book->delete();

    return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
}
}