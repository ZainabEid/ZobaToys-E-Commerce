<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index(Request $request )
    {
        $clients = Client::when($request->search,function($q) use($request){

            return $q->where('name','like','%'.$request->search.'%')
            ->orWhere('phone','like','%' . $request->search . '%')
            ->orWhere('address', 'like' , '%' . $request->search . '%');

        })->latest()->paginate(5);
       return view('adminDashboard.clients.index', compact('clients'));
    }

   
    public function create()
    {
        return view('adminDashboard.clients.create');

    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'phone' =>'required|array|min:1',
            'phone.0' =>'required',
            'address' =>'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Client::create($request_data);
        session()->flash('success',__('site.added-successfuly'));
        return redirect()->route('adminDashboard.clients.index');
    }

    
    public function edit(Client $client)
    {
        return view('adminDashboard.clients.edit',compact('client'));

    }

   
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' =>'required',
            'phone' =>'required|array|min:1',
            'phone.0' =>'required',
            'address' =>'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        $client->update($request_data);
        session()->flash('success',__('site.updated-successfuly'));
        return redirect()->route('adminDashboard.clients.index');
    }

   
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success',__('site.deleted-successfuly'));
        return redirect()->route('adminDashboard.clients.index');
    }
}
