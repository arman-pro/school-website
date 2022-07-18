<?php

namespace App\Http\Controllers;

use App\Models\Notice;

class NoticeController extends Controller
{
    /**** View / Frontend Template */
    public function show()
    {
        $notices = Notice::orderBy('id', 'DESC')->paginate(10);
        return view('menu.notice', compact('notices'));
    }

    public function details($id)
    {
        $notice = Notice::findOrFail($id);
        return view('menu.notice-view', compact('notice'));
    }




    /***--------------------Admin templage  */
    /**
     * show all notice data
     */
    public function index()
    {
        $notices = Notice::all();
        return view('admin.menu.notice.index', compact('notices'));
    }

    /**
     * Edit the notice by id
     * @param int $id
     * @return 
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.menu.notice.edit', compact('notice'));
    }

    /**
     * store notice data in db
     * @return string|mixed url
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:250',
            'pdf' => 'required_unless:notPdf,on|mimes:pdf',
            'description' => 'required_unless:descriptionNotApplicable,on'
        ]);
        $notice = new Notice();
        if (request()->hasFile('pdf')) {
            $temp_name = 'notice_' . substr(rand(), 0, 5) . '_publish_' . date('d_M_Y', time()) . '.' . request()->file('pdf')->getClientOriginalExtension();
            request()->pdf->storeAs('/public/file/', $temp_name);
            $notice->file_name = $temp_name;
        }
        $notice->title = request()->title;
        $notice->content = request()->description;
        $notice->save();
        return back()->with('message', 'Created Successfully!');
    }

    /**
     * @param int $id
     */
    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:250',
            'pdf' => 'required_unless:pdfNot,on|mimes:pdf',
            'description' => 'required_unless:descriptionNotApplicable,on'
        ]);
        $notice = Notice::findOrFail($id);
        $notice->title = request()->title;
        if (request()->hasFile('pdf')) {
            if (file_exists(public_path('storage/file') . '/' . $notice->file_name)) {
                unlink(public_path('storage/file' . '/' . $notice->file_name));
            }
            $temp_name = 'notice_' . substr(rand(), 0, 5) . '_publish_' . date('d_M_y', time()) . '.' . request()->file('pdf')->getClientOriginalExtension();
            request()->pdf->storeAs('public/file/', $temp_name);
            $notice->file_name = $temp_name;
        }
        $notice->content = request()->description;
        return $notice->save() ? back()->with('message', 'Updated Succesfully') : back()->with('invalid', 'Something went worng');
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        if (!is_null($notice->file_name) && file_exists(public_path('/storage/file') . '/' . $notice->file_name)) {
            unlink(public_path('/storage/file') . '/' . $notice->file_name);
        }
        return $notice->delete() ? back()->with('message', 'Deleted Successfully') : back()->with('invalid', 'Something went worng');
    }
}
