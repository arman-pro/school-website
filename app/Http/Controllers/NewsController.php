<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**-----front part--------*/
    public function newses()
    {
        $all_newses = News::orderBy('id', 'desc')->get();
        return view('menu.news.index', compact('all_newses'));
    }

    public function news_show($id)
    {
        $news = News::find($id);
        return view('menu.news.show', compact('news'));
    }

    /**--------------Admin Part------- */
    public function index()
    {
        $newses = News::select('id', 'title')->orderBy('id', 'desc')->get();
        return view('admin.menu.news.index', compact('newses'));
    }

    public function create()
    {
        return view('admin.menu.news.create');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        // dd($news);
        return view('admin.menu.news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.menu.news.edit', compact('news'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|string|min:6|max:60',
            'description' => 'required'
        ]);
        $news = new News();
        $news->title = request()->title;
        $news->description = htmlentities(request()->description);
        $news->save();
        return back()->with('message', 'Created Successfully!');
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|string|min:6|max:60',
            'description' => 'required'
        ]);
        $news = News::find($id);
        $news->title = request()->title;
        $news->description = htmlentities(request()->description);
        $news->save();
        return back()->with('message', 'Updated Successfully!');
    }

    public function delete($id)
    {
        News::destroy($id);
        return back()->with('delete', 'Deleted Successfully!');
    }
}
