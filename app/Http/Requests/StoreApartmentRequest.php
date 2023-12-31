<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'address'=> 'required|max:255',
            // 'lat'=> 'nullable|max:255',
            // 'lon'=> 'nullable|max:255',
            'cover'=> 'required',
            'price'=> ['required', 'regex:/^\d{1,7}(\.\d{1,2})?$/'],
            'visibility' => 'required|integer',
            'description' => 'nullable',
            'n_rooms' => 'required|integer|between:1,127',
            'n_wc' => 'required|integer|between:1,127',
            'mq' => 'required|integer|between:1,127',
            'type_id'=> 'required|exists:types,id',
            'name' => [
                'required',
                'array',
                'min:1',
            ],
            
             
        ];
    }
    public function messages(){
        return[
            'title.required' => 'il titolo è obbligatorio',
            'title.max' => 'il titolo deve essere di max:max caratteri',
            'address.required' => 'un indirizzo è obbligatorio',
            'address.max' => 'indirizzo deve essere max:max caratteri',
            'lat.max' => 'la latitudine deve essere max:max caratteri',
            'lon.max' => 'la longitudine deve essere max:max caratteri',
            'cover.required' =>'un immagine di copertina è obbligatoria',
            'cover.url' => 'un immagine deve essere un url http o https',
            'price.required' => 'il prezzo è obbligatorio',
            'price.regex' => 'il prezzo deve avere 7 cifre totali con massimo 2 decimali',
            'visibility.required' => 'la visibilità è obbligatoria',
            'visibility.integer' => 'il numero deve essere 0 o 1',
            'n_rooms.required' => 'il numero di stanze è obbligatorio',
            'n_rooms.integer' => 'il numero di stanze è massimo 127',
            'n_rooms.between' =>'il numero deve essere compreso tra 1 e 127',
            'n_wc.required' => 'il numero di bagni è obbligatorio',
            'n_wc.between' =>'il numero deve essere compreso tra 1 e 127',
            'n_wc.integer' => 'il numero di wc è massimo 127',
            'mq.required' => 'il numero di mq è obbligatorio',
            'mq.integer' => 'il numero di mq è massimo 127',
            'mq.between' =>'il numero deve essere compreso tra 1 e 127',
            'type_id.required' => 'è obbligatorio selezionare una tipologia',
            'type_id.exists' => 'devi scegliere una tipologia esistente',          
            'name.required' => 'Devi selezionare almeno un servizio',
            
        ];
    }
}
