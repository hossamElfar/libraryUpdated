<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books= Book::latest()->NotRented()->get();
        return view('home',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\BooksRequest $r)
    {
        $book = $r->all();
        $book['addedDate']=Carbon::now();
        $book['userAdd']=Auth::user()->id;
        Book::create($book);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function rent($id){
        $book= Book::findOrFail($id);
        $book['rented']=1;
        $book['user_id']=Auth::user()->id;
        $book->update();
        return redirect('/');
    }
    public function rented(){
        $user = Auth::user();
        $books = $user->rent()->get();
        return view('rented',compact('books'));
    }
    public function returnBook($id){
        $book= Book::findOrFail($id);
        $book['rented']=0;
        $book['user_id']=-0;
        $book->update();
        return redirect('Books/rentedBooks');
    }
}
