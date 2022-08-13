<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data=DB::select('select * from products');
        return view('Master.index',['data' =>$data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'status' => 'required',
            'price' => 'required',
            'image' => 'required',
            'name'  => 'required',
            
        ]);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/storage/', $filename);
            $image= $filename;

        }

        $name=$request->input('name');
        
        
        $price=$request->input('price');
        $status= $request->input('status');
      
        $value=DB::table('products')->insert(['name'=>$name,'image'=>$image,'price'=>$price,'status'=>$status]);
       if($value =='True')
        {
        return redirect('deshbord/');
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
    public function edit($id)
    {   
        //$data = DB::find($id);
        $data=DB::select('select * from products where id=?',[$id]);
        
        return view('Master.edit',['data' =>$data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'status' => 'required',
            'price' => 'required',
            'image' => 'required',
            'name'  => 'required',
            
        ]);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/storage/', $filename);
            $image= $filename;

        }
        $name=$request->input('name');
       
        $price=$request->input('price');
        $status=$request->input('status');
        DB::update('update products set name = ?,image=?,price=?,status=? where id = ?',[$name,$image,$price,$status,$id]);
        return redirect('deshbord/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::select('select * from products where id=?',[$id]);
        DB::delete('delete from products where id=?',[$id] );
        return redirect('deshbord/'); 
    }
}
