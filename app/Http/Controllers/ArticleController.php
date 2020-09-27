<?php

namespace App\Http\Controllers;
use App\Article;
use App\Categories;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_categories = Categories::get();
        $data_article = Article::all();
        return view('articles.index', compact('data_article','data_categories')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    if($request->avatar) {
            // menyimpan data file yang diupload ke variabel $file
    $file = $request->file('avatar');

    $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'image';
    $file->move($tujuan_upload,$nama_file);

    Article::create([
        'image' => $nama_file,
        'title' => $request->title,
        'description' => $request->description,
        'release_date' => $request->release_date,
        'tags' => $request->tags,
        
    ]);
    
    }
    else{
        Article::create([
            'image' => 'default.png',
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'tags' => $request->tags,

        ]);
    }

        return redirect('/articles');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $file = $request->file('image');

        $filename = time()."_".$file->getClientOriginalName();
        
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$filename);

        Article::create($request,[
            'image'=> $filename,
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'tags' => $request->tags,
        ]);
        return redirect('/articles')->back();
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
    public function edit($id)
    {
        $data_categories = Categories::findOrFail($id);
        $data_article = Article::findOrFail($id);
        return view('articles/edit',compact('data_article','data_categories'));
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
        $data_categories = Categories::finOrFail($id);
        $data_article = Article::findOrFail($id);
        if($request->avatar) {
            $file = $request->file('avatar');

            $filename = time()."_".$file->getClientOriginalName();
            
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$filename);
    
            $data_article->update([
                'image'=> $filename,
                'title' => $request->title,
                'description' => $request->description,
                'release_date' => $request->release_date,
                'tags' => $request->tags,
            ]);
        }else{
            $data_article->update([
                'title' => $request->title,
                'description' => $request->description,
                'release_date' => $request->release_date,
                'tags' => $request->tags,
            ]);
        }
      
      return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data_article = Article::findOrFail($id);
        $data_article->delete();
        return redirect('/articles');
    }
}
