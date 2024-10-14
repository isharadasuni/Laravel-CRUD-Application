<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    // Show item list and the home page
    public function index(Request $request)
    {
        $search = $request->get('search'); // Retrieve search query from request
    
        if ($search) {
            // Filter items by name if a search query is provided
            $items = Item::where('name', 'like', "%{$search}%")->get();
        } else {
            // Retrieve all items if no search query is provided
            $items = Item::all();
        }
    
        return view('home', compact('items', 'search'));
    }

    // Store a new item
    public function store(Request $request)
    {
        // Validate and store item logic
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'notes' => 'nullable|string',
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->code = $request->code;
        $item->quantity = $request->quantity;
        $item->price = $request->price;
        $item->notes = $request->notes;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $item->image = basename($imagePath);
        }

        $item->save();

        return redirect()->route('home')->with('success', 'Item added successfully!');

    }

    // Show a specific item
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    // Show the form to edit a specific item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // Update a specific item
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'notes' => 'nullable|string',
        ]);

        try {
            $item = Item::findOrFail($id);
            $item->name = $request->name;
            $item->code = $request->code;
            $item->quantity = $request->quantity;
            $item->price = $request->price;
            $item->notes = $request->notes;

            if ($request->hasFile('image')) {
                // Optionally delete old image if you want to replace it
                if ($item->image) {
                    Storage::disk('public')->delete('images/' . $item->image);
                }

                $imagePath = $request->file('image')->store('images', 'public');
                $item->image = basename($imagePath);
            }

            $item->save();

            return redirect()->route('home')->with('success', 'Item updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update item. Please try again.');
        }
    }


    // Delete a specific item
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('home')->with('success', 'Item deleted successfully!');
    }
}