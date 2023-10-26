<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Assuming your model is named Item
        return view('items.index', compact('items'));
    }
    
    public function edit($id)
    {
        $item = Item::find($id); // Assuming your model is named Item
        return view('items.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Item::find($id); // Assuming your model is named Item

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // If the validation fails, Laravel will automatically redirect back with validation errors.

        // If the validation passes, update the item
        $item->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect('/items'); // Redirect back to the list of items or any other page
    }

    public function destroy($id)
    {
        $item = Item::find($id); // Assuming your model is named Item
        $item->delete();
        
        return redirect('/items'); // Redirect back to the list of items or any other page
    }



}
