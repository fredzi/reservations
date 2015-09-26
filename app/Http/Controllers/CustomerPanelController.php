<?php

namespace App\Http\Controllers;

use Request;

use App\Hall;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerPanelController extends Controller
{
    public function show_halls()
    {
        $halls = Hall::all();
        
        return view('halls.index')->with('halls', $halls);
    }
    
    public function show_hall($id)
    {
        $hall = Hall::findOrFail($id);
        
        return view('halls.show')->with('hall', $hall);
    }
    
    public function create_hall() 
    {
        return view('halls.create');
    }
    
    public function store_hall()
    {
        Hall::create(Request::all());
        return redirect('panel/halls');
    }
    
    
    public function update_hall() {}
    
    public function delete_hall() {}
    
    public function form_edit_hall() {}
    
}
