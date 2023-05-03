<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Attribute;
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
        $sort_info = $req->input('sort_info');
            if(!empty($keyword)){
                $items = Item::where('name', 'LIKE', "%$keyword%")
                ->orWhere('company_name', 'LIKE', "%$keyword%")
                ->orWhere('company_phone_number', 'LIKE', "%$keyword%")
                ->orWhere('order_week', 'LIKE', "%$keyword%")
                ->get();
            }

            elseif($sort_info === 'name'){
                $items = Item::orderBy('name','asc')->get();
            }
            elseif($sort_info === 'company_name'){
                $items = Item::orderBy('company_name','asc')->get();
            }
            elseif($sort_info === 'company_phone_number'){
                $items = Item::orderBy('company_phone_number','asc')->get();
            }
            elseif($sort_info === 'order_week'){
                $items = Item::orderByRaw("CASE
                    WHEN order_week = '日' THEN 1
                    WHEN order_week = '月' THEN 2
                    WHEN order_week = '火' THEN 3
                    WHEN order_week = '水' THEN 4
                    WHEN order_week = '木' THEN 5
                    WHEN order_week = '金' THEN 6
                    WHEN order_week = '土' THEN 7
                    ELSE 9999
                    END")->get();
            }
            
            else{
                $items = Item::all();
            }
            
        return view('home', compact('order_items','items','keyword','sort_info'));
    }
}
