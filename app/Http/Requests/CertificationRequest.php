<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
             'nom' => 'required|string',
             'prenom' => 'required|string', 
             'sexe' => 'required|string',
             'categorie' => 'required|string',
             'club' => 'required|string', 
             'assurance' => 'required|string',
             'sang' => 'required|string',
             'medical' => 'required|string', 
             'tel' => 'required|integer',
             'licence' => 'required|integer|unique:certifications',
             'photo' => 'required', 
             'date_valide' => 'required',
        ];
    }
}
