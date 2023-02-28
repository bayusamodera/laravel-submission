<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    public function index(): View
    {
        $artikel = artikel::with('tags', 'categories')->latest()->paginate(5);
        return view('artikel.index')->with('artikel', $artikel);
    }

    public function create(): View
    {
        $categories = categori::all();
        return view('artikel.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        Session::flash('title', $request->title);
        Session::flash('description', $request->description);
        Session::flash('id_categories', $request->description);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'id_categories' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . " . " .$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $artikel = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'id_categories' => $request->input('id_categories'),
            'foto' => $foto_nama
        ];
        artikel::create($artikel);
        return redirect('artikel')->with('success', 'Add Data Successfully!');
    }

    public function show($id): View
    {
        $artikel = artikel::where('id', $id)->first();
        return view('show')->with('artikel', $artikel);
    }

    public function edit($id): View
    {
        $artikel = artikel::where('id', $id)->first();
        return view('artikel.edit')->with('artikel', $artikel);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $artikel = [
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ];

        if($request->hasFile('foto')){
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ],[
                'foto' => 'Image can only have the extension JPEG, JPG, PNG, GIF'
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . " . " .$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = artikel::where('id', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            $artikel['foto'] = $foto_nama;
        }

        artikel::where('id', $id)->update($artikel);
        return redirect('artikel')->with('success', 'Update Data Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $data = artikel::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        artikel::where('id', $id)->delete();
        return redirect('artikel')->with('success', 'Success Delete Data!');
    }

    public function detail($id): View
    {
        $article = DB::table('artikel')->where('id', $id)->first();
        return view('detail', ['article'=>$article]);
    }

    public function home(): View
    {
        $artikel = artikel::with('categories')->latest()->get();
        return view('artikel.home',compact(['artikel']));
    }
}
