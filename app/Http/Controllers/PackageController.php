<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        $role=Auth::user()->role;
        
        if($role=='1'){
            return view('packages.display', compact('packages'));
        }else{
            return view('dashboard');
        }
        
    }

    public function create(){
        $role=Auth::user()->role;
        
        if($role=='1'){
            return view('packages.create');
        }else{
            return view('dashboard');
        }
    }

    //untuk add data to database
    public function store(Request $request){
        $packages = new Package;

        $packages->name = $request->input('name');
        $packages->price = $request->input('price');
        $packages->pax = $request->input('pax');
        $packages->service = $request->input('service');
        

        $packages->save();
        return redirect('/package');
    }

    //untuk delete action button
    public function delete($package){
        Package::find($package)->delete();
        return redirect()->back();
    }

    //untuk edit action button
    public function edit($packages){
        $package = Package::find($packages);
        return view('packages.edit', compact('package'));
    }

    //untuk edit action button save into db
    public function update(Request $request, $id){
        $packages = Package::find($id);

        $packages->name = $request->input('name');
        $packages->price = $request->input('price');
        $packages->pax = $request->input('pax');
        $packages->service = $request->input('service');

        $packages->update();
        return redirect('/package');
    }
}