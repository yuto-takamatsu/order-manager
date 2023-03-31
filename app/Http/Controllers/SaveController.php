<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function create_company()
    {
        return view('save.create_company');
    }

    public function store(Request $req)
    {
        $this->validate($req,Company::$rules);

        $b = new Company();
        $b->fill($req->except('_token'))->save();
        
        return redirect('save/create_company');
    }
}
