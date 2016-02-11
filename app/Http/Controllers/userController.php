<?php

namespace App\Http\Controllers;

use App\status;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $rentedBooks = Auth::user()->rent()->latest()->get();
        $status=Auth::user()->writeStatus()->latest()->get();
        $user=Auth::user();
        return view('user.profile')->with(compact('rentedBooks','status','user'));
    }
    public function edit(){
        $user=Auth::user();
        return view('user.edit',compact('user'));
    }
    public function store(Requests\userrequest $r)
    {
        $data = $r->all();
        $user=Auth::user();
        $user['age']=$data['age'];
        $user['country']=$user['country'];
        $user['relationship']=$data['relationship'];
        $user['status']=$data['status'];
        $user['country']=$data['country'];
        $user->update();
        return redirect('/home');
    }
    public function postStatus(Requests\statusRequest $r){
        $data = $r->all();
        $data['typedOn']=Carbon::now();
        $data['user_id']=Auth::user()->id;
        status::create($data);
        return redirect('/home');
    }
}
