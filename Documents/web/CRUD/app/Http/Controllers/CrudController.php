<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function create()
    {
        return view('crud.create');
    }

    public function read()
    {
        return view('crud.read');
    }

    public function update()
    {
        return view('crud.update');
    }

    public function delete()
    {
        return view('crud.delete');
    }
}
