<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AdminPackagesController extends Controller
{
    public function listOfPackages(){
        $packages = Package::get();
        return view('admin.packages.index', compact('packages'));
    }

    public function createPackage(){
        return view('admin.packages.create');
    }

    public function showPackage($id){
        $package = Package::findOrFail($id);
        $ids = $package->services->pluck('id')->all();
        $services = Service::whereNotIn('id',  $ids)->get();
        return view('admin.packages.show', compact('package', 'services'));
    }

    public function savePackage(){
        $data = request()->validate([
            'name'=>'required|unique:packages,name',
            'remarks'=>'',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount_rate'=>'required'
        ]);

        Package::create($data);
        toast('Package created!', 'success');
        return back();
    }

    public function updateServicePacakge(){
        request()->validate([
            'package_id'=>'required',
            'id'=>'required'
        ]);

        $package = Package::findOrFail(request()->package_id);
        $package->services()->toggle(request()->id);
        toast('Done!', 'success');

        return back();
    }
}
