<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
        //pasing data user, dll
        $d['categories'] = Category::count();
        $d['products'] = Product::count();
        $d['users'] = User::count();
        return view('home', $d);
    }
    public function adminPage()
    {
        return view('layout.adminHome');
    }
}