<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $this->authorize('create', Author::class);

        return view('authors.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Author::class);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        $this->authorize('update', $author);

        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $this->authorize('update', $author);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $this->authorize('delete', $author);
        
        $author->delete();
        
        return redirect()->route('authors.index');
    }
}