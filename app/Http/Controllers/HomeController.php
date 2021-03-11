<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $total_document_count = Document::where('user_id', $user_id)->count('id');
        return view('home', compact('total_document_count'));
    }
}
