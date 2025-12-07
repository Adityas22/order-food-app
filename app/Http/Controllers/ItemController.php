<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    //
    public function index(){
        $items = Item::all();
        return response(['items' => $items]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Buat nama file dengan timestamp + original name
            $imageName = time() . '_' . $file->getClientOriginalName();

            // Simpan ke folder public/uploads/items
            $file->move(public_path('uploads/items'), $imageName);
        }

        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return response(['item' => $item], 201);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data lain dulu
        $item->update($request->only('name', 'price'));

        // Jika image dikirim, upload baru dan hapus yang lama
        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($item->image && file_exists(public_path('uploads/items/' . $item->image))) {
                unlink(public_path('uploads/items/' . $item->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/items'), $imageName);

            $item->image = $imageName;
            $item->save();
        }

        return response(['item' => $item], 200);
    }



}