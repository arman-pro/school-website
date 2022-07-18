<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CelebrationController extends Controller
{
    public function __construct()
    {
        // set time zone 
        $timezone = "Asia/Dhaka";
        date_default_timezone_set($timezone);
    }
    public function index()
    {
        
        $fee = DB::table('settings')->selectRaw('value as fee')->where('title', 'registration_fee')->get();
        return view('100-celeb', compact('fee'));
    }

    public function store(Request $request)
    {
        // // set time zone 
        // $timezone = "Asia/Dhaka";
        // date_default_timezone_set($timezone);
        $request->validate([
            'registrationerName' => 'required|string|max:50|min:3',
            'mobile' => 'required|string|max:14|min:11',
            'currentProfession' => 'required|string|max:50|min:3',
            'image' => 'mimes:jpeg,jpg,png|max:400|min:30',
            'registrationFee' => 'required|max:4|min:2',
            'address' => 'required|min:10|max:150'
        ]);
        $image_name = null;
        if (!empty($request->files) && $request->hasFile('image')) {
            $image_name = '_ex_student_' . substr(rand(), 0, 5) . '_' . date('y_M_d') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs('public/img/ex_student/', $image_name);
        }

        $result = DB::table('celebrations')->insertGetId([
            'name' => $request->registrationerName,
            'phone' => $request->mobile,
            'profession' => $request->currentProfession,
            'image' => $image_name,
            'session' => $request->sessionYear,
            'fee' => $request->registrationFee,
            'address' => $request->address,
            'created_at' => date("Y-m-d H:i:s", strtotime('now'))
        ]);
        if ($result) {
            return back()->with([
                'message' => 'Registration Successfull!',
                'last_id' => $result
            ]);
        } else {
            return back()->with('error', 'Failed, Something went worng!');
        }
    }

    public function list()
    {
        $celebrationers = DB::table('celebrations')->select('id', 'name', 'profession', 'phone', 'session', 'created_at')->where('is_active', 1)->where('is_delete', 0)->get();
        $fee = DB::table('settings')->selectRaw('value as fee, id')->where('title', 'registration_fee')->get();
        return view('admin.menu.100.index', compact('celebrationers', 'fee'));
    }

    public function asset()
    {
        $amounts = DB::table('celebrations')->selectRaw('count(id) as persons, sum(fee) as amount')->where('is_active', 1)->where('is_delete', 0)->get();
        $expenses = DB::table('expenses')->selectRaw('count(id) as total, sum(amount) as amount')->where('is_active', 1)->get();
        return view('admin.menu.100.asset', compact('amounts', 'expenses'));
    }

    public function expense()
    {
        $expenses = DB::table('expenses')->select('id', 'title', 'amount', 'created_at')->get();
        return view('admin.menu.100.expense', compact('expenses'));
    }

    public function expense_store()
    {
        $this->validate(request(), [
            'expenseTitle'  => 'required|min:5|max:50|string',
            'expenseAmount' => 'required|integer|numeric',
            'note' => 'string'
        ]);
        $result = DB::table('expenses')->insert([
            'title' => request()->expenseTitle,
            'amount' => request()->expenseAmount,
            'notes' => request()->note,
            'created_at' => date('Y-m-d H:i:s', strtotime('now'))
        ]);
        return  $result == true ? back()->with('message', 'Successfully Created!') : back()->with('error', 'Something went worng!');
    }

    public function registration_fee($id)
    {
        $this->validate(request(), [
            'fee' => 'required'
        ]);
        
        $fee = DB::table('settings')->selectRaw('value as fee')->where('title', 'registration_fee')->get();
        if($fee->isEmpty()) {
            DB::table('settings')->insert(['title'=>'registration_fee', 'value'=>request()->fee]);
        } else {
            DB::table('settings')->where('id', $id)->update(['value' => request()->fee]);
        }
        return back();
    }

    /**
     * show registration person info.
     * @param int $id (Registration id)
     * @return void
     */
    public function show($id)
    {
        $celebrationer = DB::table('celebrations')->where('id', $id)->where('is_active', 1)->first();
        return view('100-view', compact('celebrationer'));
    }

    public function delete($id)
    {
        DB::table('celebrations')->where('id', $id)->update([
            'is_active' => 0
        ]);
        return back()->with('delete', 'Deleted Successfully!');
    }
}
