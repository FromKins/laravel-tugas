<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_management = User::all();
        return view('managements.index', compact('data_management')); 
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

            User::create([
                'image' => $nama_file,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'name' => $request->name,
                'level' => $request->level,
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),

                
            ]);
            
        }
        else{
            User::create([
                'image' => 'default.png',
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'name' => $request->name,
                'level' => $request->level,
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
    
            ]);
            }
    
        return redirect('/managements');
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

        User::create($request,[
            'image'=> $filename,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>$request->level,
        ]);
        return redirect('/managements')->back();
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
        $data_management = User::findOrFail($id);
        return view('managements/edit',compact('data_management'));
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
        $data_management = User::findOrFail($id);
        if($request->avatar) {
            $file = $request->file('avatar');

            $filename = time()."_".$file->getClientOriginalName();
            
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$filename);
    
            $data_management->update([
                'image'=> $filename,
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'level'=>$request->level,
            ]);
        }else{
            $data_management->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' =>  Hash::make($request->password),
                'level'=>$request->level,
            ]);
        }
      
      return redirect('/managements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data_management = User::findOrFail($id);
        $data_management->delete();
        return redirect('/managements');
    }
}
