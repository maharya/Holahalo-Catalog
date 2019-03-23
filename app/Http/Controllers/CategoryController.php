<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $page = [
            'pageTitle' => 'Daftar Kategori',
        ];

        return view('category.index', ['categories' => $categories], compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

    	if ($category) {
            Session::flash('message', 'Kategori Berhasil Ditambah');
            Session::flash('alert-class', 'alert-success');
    		return redirect()->route('category.index');
        }
        else
        {
            Session::flash('message', 'Kategori Gagal Ditambah');
            Session::flash('alert-class', 'alert-danger');
    		return redirect()->route('category.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->get();

        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::find($request->id)->update($request->all());

        if ($category) {
            Session::flash('message', 'Kategori Berhasil Diubah');
            Session::flash('alert-class', 'alert-success');
    		return redirect()->route('category.index');
        }
        else
        {
            Session::flash('message', 'Kategori Gagal Diubah');
            Session::flash('alert-class', 'alert-danger');
    		return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->delete();

        if ($category) {
            Session::flash('message', 'Kategori Berhasil Dihapus');
            Session::flash('alert-class', 'alert-success');
    		return redirect()->route('category.index');
        }
        else
        {
            Session::flash('message', 'Kategori Gagal Dihapus');
            Session::flash('alert-class', 'alert-danger');
    		return redirect()->route('category.index');
        }
    }
}
