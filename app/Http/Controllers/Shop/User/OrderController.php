<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index()
    {
        //
    }// end of index

   
    public function store(OrderRequest $request)
    {
        //auth_user()->client()->order->create([$request]);

    }// end of store

    
    public function show($id)
    {
        //
    }// end of show

   
    public function edit($id)
    {
        //
    }// end of edit

   
    public function update(Request $request, $id)
    {
        //
    }// end of update

   
    public function destroy($id)
    {
        //
    }//end of destroy

}// end of order controller
