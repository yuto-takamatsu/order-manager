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
        
        return redirect('company_list');
    }

    
    public function store_item(Request $req)
    {
       
        $this->validate($req,Item::$rules);

        $b = new Item();
        $b->name = $req->name;
        $b->order_week = $req->order_week;
        $b->company_id = $req->company_id;
        $company_name = Company::find($req->get('company_id'))->name;
        $b->company_name = $company_name;
        $company_phone_number = Company::find($req->get('company_id'))->phone_number;
        $b->company_phone_number = $company_phone_number;
        $b->save();
        
        return redirect('home');
    }

    public function edit_item($id)
    {
        $companies = Company::all();
        $b = Item::findOrFail($id);
        return view('save.edit_item',compact('companies', 'b'));

    }

    public function update_item(Request $req, $id)
    {
        $this->validate($req,Item::$rules);

        $b = Item::findOrFail($id);

        $b->name = $req->name;
        $b->order_week = $req->order_week;
        $b->company_id = $req->company_id;
        $company_name = Company::find($req->get('company_id'))->name;
        $b->company_name = $company_name;
        $company_phone_number = Company::find($req->get('company_id'))->phone_number;
        $b->company_phone_number = $company_phone_number;

        $b->save();

        return redirect('home');
    }

    public function show_item($id)
    {
        $b = Item::findOrFail($id);
        return view('save.show_item', compact('b'));
    }

    public function destroy_item($id)
    {
        $b = Item::findOrFail($id);
        $b->delete();
        return redirect('home');
    }

    public function company_list()
    {
        $companies = Company::all();
        return view('company_list', compact('companies'));
    }

    public function edit_company($id)
    {
        $b = Company::findOrFail($id);
        return view('save.edit_company',compact('b'));

    }

    public function update_company(Request $req, $id)
    {
        $this->validate($req,Company::$rules);

        $b = Company::findOrFail($id);
        $b->fill($req->except('_token','_method'))->save();
        return redirect('company_list');
    }

    public function show_company($id)
    {
        $b = Company::findOrFail($id);
        return view('save.show_company', compact('b'));
    }

    public function destroy_company($id)
    {
        $b = Company::findOrFail($id);
        $b->delete();
        return redirect('company_list');
    }


}
