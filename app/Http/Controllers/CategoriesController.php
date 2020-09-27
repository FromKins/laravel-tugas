<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_categories = Categories::where('nama_categories','LIKE','%'.$request->cari.'%')->get();    
        }else{
            $data_categories = Categories::all();

        }
        return view('categories/index', compact('data_categories'));
    }

    public function create(Request $request)
    {
        \App\Categories::create($request->all());
        return redirect('/categories');
    }

    public function store(Request $request)
    {
        $categories = Categories::create($request->all());
        return redirect('/categories');
    }

    public function edit($id)
    {
        $data_categories = Categories::findOrFail($id);
        return view('categories/edit',compact('data_categories'));
    }

    public function update(Request $request, $id)
    {
      $data_categories = Categories::findOrFail($id);
      $data_categories->update($request->all());
      return redirect('/categories');
    }

    public function delete($id)
    {
      $data_categories = Categories::findOrFail($id);
      $data_categories->delete();
      return redirect('/categories');
    }
}
