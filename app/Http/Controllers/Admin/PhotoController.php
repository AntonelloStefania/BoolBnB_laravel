<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\ApartmentController;

use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($apartmentId)
    {
        $apartment = Apartment::findOrFail($apartmentId);

        if($apartment->user_id === Auth::id()){
            $apartment = Apartment::findOrFail($apartmentId);
            return view('admin.photos.create', compact('apartment'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.apartments.index', compact('message'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $apartmentId)
    {   

        $form_data = $request->all();
        $apartment = Apartment::findOrFail($apartmentId);
        
        foreach($form_data['url'] as $file){
        $photo = new Photo();

        if ($request->hasFile('url')) {
            // $path = Storage::put('apartment_photos', $request->url);
            $path = $file->store('apartment_photos');
            $form_data['url'] = $path;
        }
        
        $photo->fill($form_data);
        $apartment->photos()->save($photo);
    }
        return redirect()->route('admin.apartments.show', $apartment->id);
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
    public function edit($id, $id_2)
    {
        $apartment = Apartment::findOrFail($id);

        if($apartment->user_id === Auth::id()){
            return view('admin.photos.edit', compact('id','id_2'));
        } else {
            $message='NON TI PERMETTERE DI TOCCARE GLI APPARTAMENTI ALTRUI';
            return redirect()->route('admin.apartments.index', compact('message'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Photo $photo)
    {
       $form_data=$request->all();
       if ($request->hasFile('url')) {
        $path = Storage::put('apartment_photos', $request->url);
        $form_data['url'] = $path;
        }

        $photo->update($form_data);

        return redirect()->route('admin.apartments.show',$id);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Photo $photo)
    {
        Storage::delete($photo->url);
        $photo->delete();

        return redirect()->route('admin.apartments.show',$id);
    }
}
