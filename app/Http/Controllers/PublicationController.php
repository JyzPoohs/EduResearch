<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Http;

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

    private function fetchAndReturnPdf(Publication $publication)
    {
        $response = Http::get($publication->file);

        if ($response->status() == 200) {
            return response($response->body(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $publication->file . '"',
            ]);
        } else {
            return back()->with('error', 'Failed to retrieve PDF. Please try again later');
        }
    }

    public function pdf($id)
    {
        $data = Publication::find($id);
        if (!$data || !$data->file) {
            return back()->with('error', 'PDF is Not Viewable/Available.');
        }

        if (File::exists(public_path('files/' . $data->file))) {
            return response()->file(public_path('files/' . $data->file), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $data->file . '"',
            ]);
        } elseif (strpos($data->file, 'https') === 0) {
            return $this->fetchAndReturnPdf($data);
        }
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

        $uploadedFileUrl = null;
        $directoryPath = public_path('files');

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        if ($request->hasFile('file')) {
            try {
                $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('file')->getRealPath(), ['public_id' => $fileName])->getSecurePath();
                //$request->file('file')->move($directoryPath, $fileName);
            } catch (\Exception $e) {
                Log::error('File move error: ' . $e->getMessage());
                return back()->with('error', $e->getMessage());
            }
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
            'file' => $uploadedFileUrl,
        ]);

        return redirect()->route('publications-list')
            ->with('success', 'Publication added successfully.');
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'type' => 'required',
            'date' => 'required',
            'keywords' => 'required|max:255',
            'doi' => 'required',
            'url' => 'required',
            'abstract' => 'required',
            'file' => 'nullable|mimes:pdf|max:30000',
        ]);

        $directoryPath = public_path('files');

        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $fileName = $publication->file; 

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            try {
                $uploadedFileUrl = Cloudinary::uploadFile($request->file('file')->getRealPath(), ['public_id' => $fileName])->getSecurePath();

                // Delete old file if it exists
                if ($publication->file && File::exists($directoryPath . '/' . $publication->file)) {
                    File::delete($directoryPath . '/' . $publication->file);
                }
            } catch (\Exception $e) {
                Log::error('File move error: ' . $e->getMessage());
                return back()->with('error', 'File upload failed. Please try again.');
            }
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
            'file' => $uploadedFileUrl,
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
