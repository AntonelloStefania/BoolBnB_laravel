<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $apartments= Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
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
        if($request->hasFile('photo')){
            $path=Storage::put('apartment_photos',$request->photo);
            $form_data['photo']=$path;
        }
        $apartment->fill($form_data);
        $apartment->save();

        return redirect()->route('admin.dashboard');
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

        if($request->hasFile('photo')){
            if($apartment->photo){
                Storage::delete($apartment->photo);
            }

            $path = Storage::put('apartment_photos', $request->photo);

            $form_data['photo'] = $path;
        }

        
        $apartment->update($form_data);
        $apartment->save();

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
        Storage::delete($apartment->photo);

        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }
}
