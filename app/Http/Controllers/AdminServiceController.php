<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->isAdmin();
        $services = Service::get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAdmin();
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAdmin();

        $data = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'picture'=>'required',
            'remarks'=>'required'
        ]);

        $data['picture'] = $data['picture']->store('public/photos');

        Service::create($data);

        toast('Service created!', 'success');
        return back();
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
        $this->isAdmin();
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
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
        $this->isAdmin();
        $service = Service::findOrFail($id);
        $data = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'picture'=>'required',
            'remarks'=>'required'
        ]);

        $data['picture'] = $data['picture']->store('public/photos');

        $service->update($data);

        toast('Service updated!', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        toast('Service removed!', 'success');
        return back();
    }
}
