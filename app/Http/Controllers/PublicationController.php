<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function pdf($id)
    {
        $data = Publication::find($id);
        $path = public_path('files/' . $data->file);
        if (!file_exists($path) || !is_readable($path) || $data->file == null) {
            return back()->with('error', 'PDF is Not Viewable/Available.');
        }
        return response()->file($path);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'author' => 'required',
                'type' => 'required',
                'date' => 'required|date',
                'keywords' => 'required|max:255',
                'doi' => 'required',
                'url' => 'required',
                'abstract' => 'required',
                'file' => 'nullable|mimes:pdf|max:30000',
            ],
            [
                'type.required' => 'The publication type must be selected',
                'file.max' => 'The file may not be greater than 30MB.',
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
        } else {
            $fileName = null;
        }

        Publication::create([
            'publisher_id' => Auth::user()->id,
            'title' => $request->title,
            'author' => $request->author,
            'type' => $request->type,
            'date' => $request->date,
            'keywords' => $request->keywords,
            'doi' => $request->doi,
            'url' => $request->url,
            'abstract' => $request->abstract,
            'file' => $fileName,
        ]);

        return redirect()->route('publications-list')
            ->with('success', 'Publication added successfully.');
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::find($id);
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'type' => 'required',
            'date' => 'required',
            'keywords' => 'required|max:255',
            'doi' => 'required',
            'url' => 'required',
            'abstract' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);

            if (File::exists($publication->file)) {
                File::delete(public_path('files/' . $publication->file));
            }
        } else {
            $fileName = null;
        }

        $publication->update([
            'title' => $request->title,
            'author' => $request->author,
            'type' => $request->type,
            'date' => $request->date,
            'keywords' => $request->keywords,
            'doi' => $request->doi,
            'url' => $request->url,
            'abstract' => $request->abstract,
            'file' => $fileName,

        ]);

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
