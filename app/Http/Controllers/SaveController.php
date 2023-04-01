<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Item;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create_company()
    {
        return view('save.create_company');
    }

    public function create_item()
    {
        $companies = Company::all();
        return view('save.create_item',compact('companies'));

    }


    public function store_company(Request $req)
    {
        $this->validate($req,Company::$rules);

        $b = new Company();
        $b->fill($req->except('_token'))->save();
        
        return redirect('save/create_company');
    }

    
    public function store_item(Request $req)
    {
       
        $this->validate($req,Item::$rules);

        $b = new Item();
        $b->fill($req->except('_token'))->save();
        
        return redirect('save/create_item');
    }

    public function edit_item($id)
    {
        $companies = Company::all();
        $b = Item::findOrFail($id);
        return view('save.edit_item',compact('companies', 'b'));

    }

    public function update_item(Request $req, $id)
    {
        $b = Item::findOrFail($id);
        $b->fill($req->except('_token','method'))->save();
        return redirect('home');
    }

}
