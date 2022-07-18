<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // for template
    public function president()
    {
        $message = Message::where('page', 'president')->get();
        return view('menu.administration.president', compact('message'));
    }

    public function principal()
    {
        $message = Message::where('page', 'principal')->get();
        return view('menu.administration.principal', compact('message'));
    }

    public function vice()
    {
        $message = Message::where('page', 'vice')->get();
        return view('menu.administration.vprincipal', compact('message'));
    }

    // for admin panel
    public function show()
    {
        $messages = Message::all();
        return view('admin.menu.administration.message', compact('messages'));
    }

    public function edit(Request $request)
    {
        $message = Message::find($request->id);
        return view('admin.menu.administration.edit-message', compact('message'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'teacher'   => 'required|string|max:50',
            'position'  => 'required|string|max:20',
            'message'   => 'required'
        ]);
        $message = Message::find($request->id);

        if (!empty($request->files) && $request->hasFile('image')) {

            $this->validate($request, [
                'image' => 'required|mimes:jpg,png,jpeg,JPG,PNG|max:520',
            ]);

            $temp_name = 'teacher_' . substr(rand(), 0, 5) . '_.' . $request->file('image')->getClientOriginalExtension();
            if ($request->image->storeAs('/public/img/teacher', $temp_name)) {
                // unlink previous file
                if (file_exists(public_path('/storage/img/teacher' . '/' . $message->messengerImage))) {
                    unlink(public_path('/storage/img/teacher' . '/' . $message->messengerImage));
                }
                // update uploded file name;
                $message->messengerImage = $temp_name;
            }
        }

        $message->messengerName = $request->teacher;
        $message->position = $request->position;
        $message->messages = $request->message;
        $message->save();
        return back()->with('message', 'Updated Successfully!');
    }
}
