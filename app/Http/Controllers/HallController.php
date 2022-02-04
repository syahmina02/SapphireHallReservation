<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;


class HallController extends Controller
{
    public function index(){
        $halls = Hall::with('package')->get();
        $packages = Package::all();
        $role=Auth::user()->role;

        if($role=='1'){
            return view('halls.welcome', compact('halls','packages'));
        }else{
            return view('dashboard');
        }
        
    }

    public function create(){
        $packages = Package::all();
        $role=Auth::user()->role;
        
        if($role=='1'){
            return view('halls.create', compact('packages'));
        }else{
            return view('dashboard');
        }
    }

    public function store(Request $request)
    {
        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $hall = new Hall([
                "name" =>$request->name,
                "price" =>$request->price,
                "address1" =>$request->address1,
                "address2" =>$request->address2,
                "city" =>$request->city,
                "location" =>$request->location,
                "zip" =>$request->zip,
                "description" =>$request->description,
                "package_id" =>$request->package_id,
                "cover" =>$imageName,
            ]);
           $hall->save();
        }

            if($request->hasFile("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['post_id']=$hall->id;
                    $request['image'] = $imageName;
                    $file->move(\public_path("/images"),$imageName);
                    Image::create($request->all());
                }
            }

            return redirect()->back();
    }

    public function edit($id)
    {
       $hall=Hall::findOrFail($id);
       $packages = Package::all();
       $images=Image::where("post_id",$hall->id)->get();

       $role=Auth::user()->role;
        
        if($role=='1'){
            return view('halls.edit', compact('packages'))->with('hall',$hall)->with('images',$images);
        }else{
            return view('dashboard');
        }
       
    }

    public function update(Request $request,$id)
    {
     $hall=Hall::findOrFail($id);
     
     if($request->hasFile("cover")){
         if (File::exists("cover/".$hall->cover)) {
             File::delete("cover/".$hall->cover);
         }
         $file=$request->file("cover");
         $hall->cover=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/cover"),$hall->cover);
         $request['cover']=$hall->cover;
     }

     $hall->update([
            "name" =>$request->name,
            "price" =>$request->price,
            "location" =>$request->location,
            "address1" =>$request->address1,
            "address2" =>$request->address2,
            "city" =>$request->city,
            "zip" =>$request->zip,
            "description" =>$request->description,
            "cover"=>$hall->cover,
            "package_id"=>$request->package_id,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request["post_id"]=$id;
                $request["image"]=$imageName;
                $file->move(\public_path("images"),$imageName);
                Image::create($request->all());

            }
        }
        
        return redirect()->back();

    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/".$images->image)) {
           File::delete("images/".$images->image);
       }

       Image::find($id)->delete();
       return back();
   }

   public function deletecover($id){
        $cover=Hall::findOrFail($id)->cover;

        if (File::exists("cover/".$cover)) {
            File::delete("cover/".$cover);
        }
        return back();
    }

    public function delete($id)
    {
         $hall = Hall::findOrFail($id);

         if (File::exists("cover/".$hall->cover)) {
             File::delete("cover/".$hall->cover);
         }
         $images=Image::where("post_id",$hall->id)->get();
         foreach($images as $image){
         if (File::exists("images/".$image->image)) {
            File::delete("images/".$image->image);
        }
         }
         $hall->delete();
         return redirect()->back();
    }

    public function search(Request $request)
    {
        $search_price = $_GET['priceRange'];
        $search_location = $_GET['searchLocation'];

        $hall = Hall::query();

        if($request->filled('priceRange')){
            $hall = Hall::where('price', $request->$search_price);
        }
        if($request->filled('searchLocation')){
            $hall = Hall::where('location', $request->$search_location);
        }

        return view('halls.search', [
            'location' => $search_location,
            'price' => $search_price,
            'hall' => $hall->get(),
        ]);
        return $request->all();
       return view('halls.search');

    }

    public function show($id)
    {
        $hall = Hall::find($id);
        $package = Package::where("id",$hall->package_id)->get();
        $images=Image::where("post_id",$hall->id)->get();
        //$review = Review::all()->where('post_id', $id);
        return view('halls.display')->with('hall',$hall)->with('images',$images)->with('package',$package);
    }

}
