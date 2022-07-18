<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /*------------------------Web Site Panel/FrontEnd---------------**/
    public function governingBody()
    {
        $officers = Officer::where('page', 'governing-body')->get();
        return view('menu.administration.governing', compact('officers'));
    }

    public function facultyMember()
    {
        $officers = Officer::where('page', 'faculty-member')->get();
        return view('menu.administration.faculty', compact('officers'));
    }

    public function officeStuff()
    {
        $officers = Officer::where('page', 'office-stuff')->get();
        return view('menu.administration.office', compact('officers'));
    }


    /*---------------------End Web Site/ FrontEnd------------------*/

    /*----------------------------------------Admin <Panel-----------------------*/
    // create officer
    public function index(Request $request)
    {
        $page = $request->page;
        return view('admin.menu.administration.officer', compact('page'));
    }
    /***----Governing Body------***/
    public function governingBodyAdmin()
    {
        $officers = Officer::where('page', 'governing-body')->get();
        return view('admin.menu.administration.governing', compact('officers'));
    }

    /***---Faculty Member ****/
    public function facultyMemberAdmin()
    {
        $officers = Officer::where('page', 'faculty-member')->get();
        return view('admin.menu.administration.faculty', compact('officers'));
    }

    /***---Office Stuff ****/
    public function officeStuffAdmin()
    {
        $officers = Officer::where('page', 'office-stuff')->get();
        return view('admin.menu.administration.stuff', compact('officers'));
    }

    /*---------End Panel-----------------------*/

    public function store(Request $request)
    {
        $this->validate($request, [
            'page' => 'required|string|max:30',
            'name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'image' => 'required|mimes:jpg,png,JPEG,PNG|max:520',
            'description' => 'required_unless:descriptionNotApplicable,yes'
        ]);

        $officer = new Officer();
        $officer->page = $request->page;
        $officer->name = $request->name;
        $officer->job = $request->position;
        if ($request->hasFile('image')) {
            $temp_name = 'adminTe_' . substr(rand(), 0, 5) . '_' . date('m-d-y', time()) . '.' . $request->file('image')->getClientOriginalExtension();
            if ($request->image->storeAs('public/img/teacher', $temp_name)) {
                $officer->image = $temp_name;
            }
        }
        $officer->description = $request->description;
        $officer->save();
        return back()->with('message', 'Created Successfully!');
    }

    public function edit(Request $request)
    {
        $officer = Officer::find($request->id);
        $page = $request->page ?? false;
        return view('admin.menu.administration.edit-officer', compact('officer', 'page'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'page' => 'required|string|max:30',
            'name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'description' => 'required_unless:descriptionNotApplicable,yes'
        ]);

        $officer = Officer::find($request->id);
        $officer->page = $request->page;
        $officer->name = $request->name;
        $officer->job = $request->position;

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,JPEG,PNG|max:520'
            ]);
            // set image new name
            // admin teacher update
            $temp_name = 'adminTeU' . substr(rand(), 0, 5) . '_' . date('y-m-d', time()) . '.' . $request->file('image')->getClientOriginalExtension();
            if ($request->image->storeAs('public/img/teacher', $temp_name)) {
                // remove old existing file
                if (file_exists(public_path('storage/img/teacher' . '/' . $officer->image))) {
                    unlink(public_path('storage/img/teacher' . '/' . $officer->image));
                }
                $officer->image = $temp_name;
            }
        }
        $officer->description = $request->description;
        $officer->save();
        return back()->with('message', 'Updated Successfully!');
    }

    public function delete(Request $request)
    {
        $officer = Officer::find($request->id);
        // remove image file
        if (file_exists(public_path('storage/img/teacher') . '/' . $officer->image)) {
            unlink(public_path('/storage/img/teacher') . '/' . $officer->image);
        }
        $officer->delete();
        return back()->with('delete', 'Deleted Successfully!');
    }
}
