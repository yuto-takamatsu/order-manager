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
    public function index(Request $req)
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
        date_default_timezone_set('Japan');
        $date = date('w');
        $today = $week[$date];
        $order_items = Item::where('order_week', $today)->get();
        
        $keyword = $req->input('keyword');
            if(!empty($keyword)){
                $items = Item::where('name', 'LIKE', "%$keyword%")
                ->orWhere('company_name', 'LIKE', "%$keyword%")
                ->orWhere('company_phone_number', 'LIKE', "%$keyword%")
                ->orWhere('order_week', 'LIKE', "%$keyword%")
                ->get();
            }
            
            else{
                $items = Item::all();
            }
            
        return view('home', compact('order_items','items','keyword'));
    }
}
