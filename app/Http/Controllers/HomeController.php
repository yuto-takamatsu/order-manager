<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
        $week = [
            '日',
            '月',
            '火',
            '水',
            '木',
            '金',
            '土'
        ];
        $date = date('w');
        $today = $week[$date];
        $order_items = Item::where('order_week', $today)->get();

        $items = Item::all();
        return view('home', compact('order_items','items'));
    }
}
