<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AssignedBreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sheet)
    {
        $data['resturants']=DB::table('resturants')->get();
        $data['types']=DB::table('bread_type')->get();

        if(\Auth::user()->type=="admin"){
            return view("assigned_bread.create",$data);
        }
        else{
            return view("assigned_bread.baker_create",$data);
        }

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(isset($request->id))
        {
            
             DB::table('assigned_breads')->where('id',$request->id)->update([
                'resturant_id'=>$request->resturant_id,
                'qty'=>$request->quantity,
                'sheet'=>$request->sheet,
                'status'=>1,
            ]);
             
           if(isset($request->bread_type)){ 
            foreach ($request->bread_type as  $data)
            {
               DB::table('assigned_breads_type')->insert([
                'resturant_id'=>$request->resturant_id,
                   'type_id' => $data,
                   'sheet'=>$request->sheet,
               ]);
            }
           }
        } else 
        {
            $assignBreadId = DB::table('assigned_breads')->insertGetId([
                'resturant_id'=>$request->resturant_id,
                'qty'=>$request->quantity,
                'sheet'=>$request->sheet,
            ]);
    
            foreach ($request->bread_type as  $data)
            {
               DB::table('assigned_breads_type')->insert([
                   'resturant_id'=>$request->resturant_id,
                   'type_id'=>$data,
                   'sheet'=>$request->sheet,
               ]);
            }

        }
        
       
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAssignedType($id)
    {
        DB::table('assigned_breads_type')->where('id',$id)->delete();
        return redirect()->back();
    }
}
