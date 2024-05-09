<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        return view('ManagePublication.index');
    }

    public function view(){
        return view('ManagePublication.view');
    }

    public function create()
    {
        return view('ManagePublication.create');
    }

    public function show(Publication $publication)
    {
        return view('ManagePublication.show', compact('publication'));
    }

    public function edit(Publication $publication)
    {
        return view('ManagePublication.edit', compact('publication'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Publication::create($request->all());

        return redirect()->route('publications-list')
            ->with('success', 'Publication created successfully.');
    }

    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $publication->update($request->all());

        return redirect()->route('publications-list')
            ->with('success', 'Publication updated successfully');
    }

    public function destroy()
    {
        // $publication->delete();

        return redirect()->route('publications-list')
            ->with('success', 'Publication deleted successfully');
    }

    
}
