<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($category, $name)
    {
        $content = Content::where('category_id', $category)->first();
        return view('menu.single', compact('content', 'name'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'page' => 'required|string|max:40|unique:pages,name'
        ]);
        $page = new Page();
        $page->name = $request->page;
        $page->save();
        return back()->with('message', 'Page Created Successfully!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'page' => 'required|string|max:40'
        ]);
        $page = Page::find($request->id);
        $page->name = $request->page;
        $page->save();
        return redirect('admin/category')->with('message', 'Page Updated Successfully!');
    }

    public function delete(Request $request)
    {
        if (Page::destroy($request->id)) {
            return back()->with('delete', 'Deleted Succesfully');
        }
    }
}
