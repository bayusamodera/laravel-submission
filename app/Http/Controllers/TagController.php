<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $tag = tag::orderBy('id', 'asc')->paginate(5);
        return view('tag.index')->with('tags', $tag);
    }
        
    public function create(): View
    {
        return view('tag.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Session::flash('tags', $request->description);
        Session::flash('artikel_id', $request->description);

        $request->validate([
            'tags' => 'required',
            'artikel_id' => 'required'
        ]);

        tag::create($request->except([
            '_token',
            'submit'
        ]));
        return redirect('/tag')->with('success', 'Add Data Successfully!');
    }

    public function edit($id): View
    {
        $tag = tag::where('id', $id)->first();
        return view('tag.edit')->with('tags', $tag);
    }

    public function update($id,Request $request): RedirectResponse
    {
        $request->validate([
            'tags' => 'required'
        ]);

        $tag = [
            'tags' => $request->input('tags')
        ];

        tag::where('id', $id)->update($tag);
        return redirect('tag')->with('success', 'Update Data Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $tag = tag::find($id);
        $tag->delete();
        return redirect('/tag')->with('success', 'Delete Tags Successfully!');
    }

}
