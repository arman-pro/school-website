<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Page;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('admin.menu.content.index', compact('contents'));
    }

    public function view($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.menu.content.view', compact('content'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('admin.menu.content.create', compact('pages'));
    }

    public function edit($id)
    {
        $pages = Page::all();
        $content = Content::findOrFail($id);
        return view('admin.menu.content.edit', compact('content', 'pages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'page' => 'required',
            'category' => 'required|unique:contents,category_id',
            'title' => 'required|string|max:120',
            'pdfFile' => 'required_unless:fileNotApplicable,on|mimes:pdf|max:1000',
            'content' => 'required_unless:contentNotApplicable,on'
        ]);
        $content = new Content();
        $content->page_id = $request->page;
        $content->category_id = $request->category;
        $content->title = $request->title;

        if ($request->hasFile('pdfFile')) {
            $temp_name = 'content_' . substr(rand(), 0, 5) . '-publish-' . date('d-M-y', time()) . '.' . $request->file('pdfFile')->getClientOriginalExtension();

            if ($request->pdfFile->storeAs('/public/file/', $temp_name)) {
                $content->file = $temp_name;
            }
        }
        $content->content = str_replace('>', '&rt;', str_replace('<', '&lt;', $request->content));
        $content->save();
        return back()->with('message', 'Content Created Successfully!');
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:120',
            'pdfFile' => 'required_unless:fileNotApplicable,on|mimes:pdf|max:1000',
            'content' => 'required_unless:contentNotApplicable,on'
        ]);
        $content = Content::find($id);

        $content->title = request()->title;

        if (request()->hasFile('pdfFile')) {
            // create tempoary name for pdf file
            $temp_name = 'content_' . substr(rand(), 0, 5) . '-publish-' . date('d-M-y', time()) . '.' . request()->file('pdfFile')->getClientOriginalExtension();
            // unlink uploaded file
            if (file_exists(public_path('/storage/file') . '/' . $content->file)) {
                unlink(public_path('/storage/file') . '/' . $content->file);
            }

            // upload new file and save name in db
            if (request()->pdfFile->storeAs('/public/file/', $temp_name)) {
                $content->file = $temp_name;
            }
        }
        $content->content = str_replace('>', '&rt;', str_replace('<', '&lt;', request()->content));
        $content->save();
        return back()->with('message', 'Updated Successfully!');
    }


    public function destroy($id)
    {
        $content = Content::find($id);
        if (file_exists(public_path('/storage/file') . '/' . $content->file)) {
            unlink(public_path('/storage/file') . '/' . $content->file);
        }

        if ($content->delete()) {
            return back()->with('delete', 'Deleted Successfully!');
        }
    }
}
