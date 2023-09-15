<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Photo;
use App\Models\Type;
use App\Models\User;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        if (Auth::check()){
            $userId = Auth::id();
            $apartments= Apartment::where('user_id', $userId)->get();

            if(!$apartments->isEmpty()){
                return view('admin.apartments.index', compact('apartments'));
            }else{
                return view('home');
            }
        }
            $apartments= Apartment::all();
            return view('admin.apartments.index', compact('apartments','types'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        $services= Service::all();
        $sponsors=Sponsor::all();
        $user=Auth::user();
       

        return view('admin.apartments.create', compact('types','services','sponsors','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request, User $user)
    {
        $form_data = $request->all();
        $apartment = new Apartment();
        

        if($request->hasFile('cover')){
            $path=Storage::put('apartment_photos',$request->cover);
            $form_data['cover']=$path;
        }
       
        $visibility = $request->has('visibility') ? 1 : 0;
        $form_data['slug'] = Str::slug($form_data['title'],'-'); 
        $apartment->fill($form_data);
       
        $apartment->save();
        
        if($request->has('name')){
            $apartment->services()->attach($request->name);
        }
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {   
        $photos=Photo::all();
        
       
        return view('admin.apartments.show', compact('apartment','photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $types=Type::all();
        $services= Service::all();
        $sponsors=Sponsor::all();
        $user=Auth::user();
        return view('admin.apartments.edit', compact('apartment','types','services','sponsors','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $form_data = $request->all(); 

        if($request->hasFile('cover')){
            if($apartment->cover){
                Storage::delete($apartment->cover);
            }

            $path = Storage::put('apartment_photos', $request->cover);

            $form_data['cover'] = $path;
        }else {
            // Mantieni il valore esistente del campo "cover"
            $form_data['cover'] = $apartment->cover;
        }

        $form_data['slug'] = Str::slug($form_data['title'],'-'); 
        $apartment->update($form_data);
        $apartment->save();

        if($request->has('name')){
            $apartment->services()->sync($request->name);
        }

        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        Storage::delete($apartment->cover);
        $apartment->services()->detach();
        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }


}
