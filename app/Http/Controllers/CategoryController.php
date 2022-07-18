<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // retrive all category and  page data
        $categories = Category::all();
        $pages = Page::all();
        $pageUp = null;
        $cate = null;
        if ($request->has('id') && $request->has('sub')) {
            $id = $request->id;
            $sub = $request->sub;
            if ($sub == 'page') {
                $pageUp = Page::find($id);
            }
            if ($sub == 'category') {
                $cate = Category::find($id);
            }
            return view('admin.menu.category.index', compact('categories', 'pages', 'pageUp', 'cate'));
        }
        // dd($cate, $page);
        return view('admin.menu.category.index', compact('categories', 'pages', 'pageUp', 'cate'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'pageId' => 'required',
            'category' => 'required|string|max:40|unique:categories,name'
        ]);
        $category = new Category();
        $category->page_id = $request->pageId;
        $category->name = $request->category;
        $category->save();
        return redirect('admin/category')->with('message', 'Category Created Successfully!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'pageId' => 'required',
            'category' => 'required|string|max:40'
        ]);
        $category = Category::find($request->id);
        $category->page_id = $request->pageId;
        $category->name = $request->category;
        $category->save();
        return redirect('/admin/category')->with('message', 'Category Updated Successfully!');
    }

    public function delete($id)
    {
        if (Category::destroy(($id))) {
            return back()->with('delete', 'Category Deleted Successfully!');
        }
    }
}
