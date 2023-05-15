<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ListingController extends Controller
{
    //show all listing
    public function index(Request $request){ 
        
        $res=Listing::latest()->filter(["tage"=>$request->tage,"search"=>$request->search])->paginate(4);
        return view('Listing.index',["list"=>$res ]);
    }

    //show a listing
    public function show(string $listing){
        $data=Cache::remember("listing_".$listing,10,function() use($listing){
            return Listing::findorfail($listing);
        });

        return view('Listing.show',["item"=> $data]);
    }
    
    public function create(){
        return view('Listing.create');
    }

    //store data 
    public function store(Request $request){ 
        $form=$request->validate(
            [
                'company'=>'required|unique:listings',
                'title'=>'required',
                'location'=>'required',
                'email'=>'required|email',
                'tags'=>'required',
                'website'=>'required|url',
                'description'=>'required',
              

            ]
        );
        if($request->file("logo")){
            $form["logo"]=$request->file("logo")->store("logos","public");
        }
        $form["user_id"]=Auth::id();
        Listing::create($form);
        return redirect("/")->with("message","Listing created successfully");
    }

    public function edit(Listing $listing){
        $this->authorize("view",$listing);

        return view('Listing.update',["data"=>$listing]);
    }

    public function update(Request $request,Listing $listing){
        $this->authorize("view",$listing);
        $form=$request->validate(
            [
                'company'=>'required',
                'title'=>'required',
                'location'=>'required',
                'email'=>'required|email',
                'tags'=>'required',
                'website'=>'required|url',
                'description'=>'required',
              

            ]
        );
        if($request->file("logo")){
            $form["logo"]=$request->file("logo")->store("logos","public");
        }
        $form["user_id"]=Auth::id();
        $listing->update($form);
        return back()->with("message","Listing updated successfully");
    }

    Public function destroy(Listing $listing){
        $this->authorize("view",$listing);
        if(isset($listing->logo)){
            if(file_exists(public_path('storage\\'.$listing->logo))){
                unlink(public_path('storage\\'.$listing->logo));
            }
        }
        $listing->delete();
        return redirect("/")->with("message","Listing deleted successfully");

    }
    public function manager(){
        return view("Listing.manager",["list"=>Auth::user()->listings()->get()]);
    }
}
