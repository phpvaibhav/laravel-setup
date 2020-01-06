<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use View,Redirect,Response;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::orderBy('id','desc')->paginate(8);
        $data['front_scripts'] = array('login/customer.js');
        return View::make('pages.customers',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $userId =   $request->user_id;
        //print_r( $userId );die;
        $user   =   Customer::updateOrCreate(['id' => $userId],
        ['name' => $request->name, 'email' => $request->email]);
        return Response::json($user);
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
                $where = array('id' => $id);
        $user  = User::where($where)->first();
 
        return Response::json($user);
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
    public function destroy($id)
    {
         $user = User::where('id',$id)->delete();
   
        return Response::json($user);
    }
}
