<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
        public function index()
    {
        $items = Item::all(); // Replace 'Item' with your actual model name
        return view('registered_items', compact('items'));
    }

}
