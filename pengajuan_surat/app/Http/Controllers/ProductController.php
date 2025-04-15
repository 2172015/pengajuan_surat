<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model product
use App\Models\Product; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create(): View
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'tanggal_pengajuan' => 'required',
            'waktu_pengajuan'   => 'required',
            'status'            => 'required|numeric',
            'tujuan'            => 'required|min:10',
        ]);

        //create product
        Product::create([
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'waktu_pengajuan'   => $request->waktu_pengajuan,
            'status'            => $request->status,
            'tujuan'            => $request->tujuan,
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    
    /*
    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.show', compact('product'));
    } */

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.edit', compact('product'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'tanggal_pengajuan' => 'required',
            'waktu_pengajuan'   => 'required',
            'status'            => 'required|numeric',
            'tujuan'            => 'required|min:10',
        ]);

        //get product by ID
        $product = Product::findOrFail($id);
        
        //update product
        $product->update([
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'waktu_pengajuan'   => $request->waktu_pengajuan,
            'status'            => $request->status,
            'tujuan'            => $request->tujuan,
        ]);
        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
