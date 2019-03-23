<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use File;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('show', 'all');
    }

    public function all()
    {
        $products = Product::all();
        $categories = Category::all();

        $page = [
            'pageTitle' => 'Daftar Produk',
        ];

        return view('product.all', ['products' => $products, 'categories' => $categories], compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $page = [
            'pageTitle' => 'Daftar Produk',
        ];

        return view('product.index', ['products' => $products], compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $kodeFotos = Product::select(DB::raw('substr(url_pict, -9, 5) AS randString'))->get();
        $randStrings = array();
        foreach($kodeFotos as $kode)
        {
            array_push($randStrings, $kode->randString);
        }

        $newRandString = str_random(5);
        while (in_array($newRandString, $randStrings))
        {
            $newRandString = str_random(5);
        }

        $page = [
            'pageTitle' => 'Tambah Produk',
        ];

        return view('product.create', ['categories' => $categories, 'randString' => $newRandString], compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $uploadedFile = $request->file('file');
        
        $upload = $uploadedFile->move(public_path('img\product'), $request->url_pict);

        if($upload)
        {
            $product = Product::create($request->all());
            
            $category = Category::find($request->category_id);

            $product->category()->attach($category);

            if($product)
            {
                Session::flash('message', 'Produk Berhasil Ditambah');
                Session::flash('alert-class', 'alert-success');

                return redirect()->route('product.index');
            }
            else
            {
                $hapus = File::delete($upload->getPathname());

                Session::flash('message', 'Kategori Gagal Ditambah');
                Session::flash('alert-class', 'alert-danger');

                return redirect()->route('product.index');
            }
        }
        else
        {
            Session::flash('message', 'Gagal Upload Foto, Kategori Gagal Ditambah');
            Session::flash('alert-class', 'alert-danger');

            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->get();

        $page = [
            'pageTitle' => 'Detail Produk',
        ];

        return view('product.detail', ['product' => $product[0]], compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->get();

        $page = [
            'pageTitle' => 'Ubah Produk',
        ];

        return view('product.edit', ['product' => $product[0], 'categories' => $categories], compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset($request->file))
        {
            $uploadedFile = $request->file('file');
            $upload = $uploadedFile->move(public_path('img\product'), $request->url_pict);
        }

        $product = Product::find($request->id);
        $update = $product->update($request->all());
        
        foreach($request->category_id as $id)
        {
            if(!in_array($id, $request->list_kategori))
            {
                $product->category()->attach($id);
            }
        }
        
        foreach($request->list_kategori as $id)
        {
            if(!in_array($id, $request->category_id))
            {
                $product->category()->detach($id);
            }
        }
        
        if ($product) {
            Session::flash('message', 'Produk Berhasil Diubah');
            Session::flash('alert-class', 'alert-success');
    		return redirect()->route('product.index');
        }
        else
        {
            Session::flash('message', 'Produk Gagal Diubah');
            Session::flash('alert-class', 'alert-danger');
    		return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $fileName)
    {
        $hapus = File::delete(public_path('img\product').DIRECTORY_SEPARATOR.$fileName);

        $product = Product::where('id', $id)->delete();

        if ($product) {
            Session::flash('message', 'Produk Berhasil Dihapus');
            Session::flash('alert-class', 'alert-success');
    		return redirect()->route('product.index');
        }
        else
        {
            Session::flash('message', 'Produk Gagal Dihapus');
            Session::flash('alert-class', 'alert-danger');
    		return redirect()->route('product.index');
        }
    }
}
