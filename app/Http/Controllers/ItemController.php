<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::simplepaginate(5);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //menampilkan layouting html pada folder resources-views
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ], [
            'name.required' => 'Nama barang harus diisi!',
            'type.required' => 'Tipe barang harus diisi!',
            'price.required' => 'Harga barang harus diisi!',
            'stock.required' => 'Stok barang harus diisi!',
            'name.max' => 'Nama barang maksimal 100 karakter!',
            'type.min' => 'Tipe barang minimal 3 karakter!',
            'price.numeric' => 'Harga barang harus berupa angka!',
            'stock.numeric' => 'Stok barang harus berupa angka!',
        ]); //validasi data

        Item::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        //atau jika seluruh data input akan dimasukan langsunng ke db bisa dengan perintah Item:: create($request->all());

        return redirect()->back()->with('success', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::find($id);
        // atau $item =Item::where('id', $id)-first()

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required|',
            'price' => 'required|numeric',
        ]);

        Item::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price
        ]);

        return redirect()->route('item.home')->with('success', 'Data barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($item)
    {
        Item::where('id', $item)->delete();

        return redirect()->back()->with('deleted', 'Data barang berhasil dihapus!');
    }
}
