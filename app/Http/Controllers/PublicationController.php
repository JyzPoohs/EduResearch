<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function home()
    {
        $datas = Publication::orderBy('created_at', 'desc')->get();
        return view('ManagePublication.home', compact('datas'));
    }

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $datas = Publication::orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->role == 'lecturer') {
            $datas = Publication::where('publisher_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        //dd($datas);
        return view('ManagePublication.index', compact('datas'));
    }

    public function view($id)
    {
        $data = Publication::find($id);
        return view('ManagePublication.view', compact('data'));
    }

    public function create()
    {
        return view('ManagePublication.create');
    }

    public function show($id)
    {
        $data = Publication::find($id);
        return view('ManagePublication.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Publication::find($id);
        return view('ManagePublication.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'date' => 'required',
            'keywords' => 'required',
            'doi' => 'required',
            'url' => 'required',
            'abstract' => 'required',
        ]);

        Publication::create($request->all());

        return redirect()->route('publications-list')
            ->with('success', 'Publication added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'date' => 'required',
            'keywords' => 'required',
            'doi' => 'required',
            'url' => 'required',
            'abstract' => 'required',
        ]);
        
        Publication::find($id)->update($request->all());

        return redirect()->route('publications-list')
            ->with('success', 'Publication updated successfully');
    }

    public function destroy($id)
    {
        Publication::find($id)->delete();

        return redirect()->route('publications-list')
            ->with('success', 'Publication deleted successfully');
    }
}
