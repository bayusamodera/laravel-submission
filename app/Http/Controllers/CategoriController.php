<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CategoriController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $kategori = categori::orderBy('id', 'asc')->paginate(5);
        return view('categories.index')->with('categories', $kategori);
    }
       
    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Session::flash('name', $request->description);

        $request->validate([
            'name' => 'required'
        ]);

        categori::create($request->except([
            '_token',
            'submit'
        ]));
        return redirect('/categories')->with('success', 'Add Data Successfully!');
    }
    
    public function edit($id): View
    {
        $categories = categori::where('id', $id)->first();
        return view('categories.edit')->with('categories', $categories);
    }

    public function update($id,Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categories = [
            'name' => $request->input('name'),
        ];

        categori::where('id', $id)->update($categories);
        return redirect('categories')->with('success', 'Update Data Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $categories = categori::find($id);
        $categories->delete();
        return redirect('/categories')->with('success', 'Delete Categories Successfully!');
    }

}
