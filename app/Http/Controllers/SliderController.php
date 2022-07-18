<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view("admin.menu.slider.sliders", compact(('sliders')));
    }

    /**
     * ceate form for new slider
     */
    public function create()
    {
        return view('admin.menu.slider.create');
    }

    public function show(Request $request)
    {
        $slider = Slider::find($request->id);
        $nextSql = "SELECT MIN(id) as nextId from sliders where id > $slider->id";
        $nextId = DB::select($nextSql)[0]->nextId;
        $preSql = "SELECT MAX(id) as previousId from sliders where id < $slider->id";
        $previousId = DB::select($preSql)[0]->previousId;
        return view('admin.menu.slider.show', compact('slider', 'nextId', 'previousId'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|string|max:150',
            'subtitle'      => 'required|max:200',
            'thumbnail'     => 'mimes:jpeg,jpg,png|required|max:500',
            'description'   => 'required|string'
        ]);

        if (!empty($request->files) && $request->hasFile('thumbnail')) {
            $slider = new Slider();

            // image temporary name
            $file_temp_name = 'slider_' . substr(rand(), 0, 5) . '_' . date('d-m-y', time()) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            // upload file
            $request->thumbnail->storeAs('public/img/slider', $file_temp_name);

            $slider->title          = $request->title;
            $slider->subTitle       = $request->subtitle;
            $slider->thumbnail      = $file_temp_name;
            $slider->description    = $request->description;
            $slider->save();
            return back()->with('message', 'Slider Created Successfully!');
        }
    }


    public function edit(Request $request)
    {
        $slider = Slider::find($request->id);
        return view('admin.menu.slider.edit', compact("slider"));
    }

    public function update(Request $request)
    {
        $slider = Slider::find($request->id);

        $this->validate($request, [
            'title'  => 'required|string|max:150',
            'subtitle' => 'required|string|max:200',
            'description' => 'required|string'
        ]);

        $slider->title = $request->title;
        $slider->subTitle = $request->subtitle;

        if ($request->hasFile('thumbnail')) {
            $this->validate($request, [
                'thumbnail' => 'mimes:jpg,jpeg,png|max:500'
            ]);
            if (file_exists(public_path('/storage/img/slider/' . $slider->thumbnail))) {
                unlink(public_path('/storage/img/slider/') . $slider->thumbnail);
            }
            // set new file name
            $temp_name = 'sliders_' . substr(rand(), 0, 4) . '_' . date('m-d-y', time()) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->thumbnail->storeAs('public/img/slider', $temp_name);

            // update data
            $slider->thumbnail = $temp_name;
        }

        $slider->description = $slider->description;
        $slider->save();
        return back()->with('message', 'Slider Updated Successfully!');
    }

    public function trash(Request $request)
    {
        $slider = Slider::find($request->id);
        if (file_exists(public_path('/storage/img/slider/' . $slider->thumbnail))) {
            unlink(public_path('/storage/img/slider/' . $slider->thumbnail));
        }
        $slider->delete();
        return back()->with('message', 'Slider Deleted Successfully!');
    }
}
