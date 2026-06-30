<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        return view('publishers.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index');
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher->update($request->all());

        return redirect()->route('publishers.index');
    }

    public function destroy(Publisher $publisher)
    {
        if (auth()->user()->isCliente()) {
            abort(403);
        }
        
        $publisher->delete();
        return redirect()->route('publishers.index');
    }
}