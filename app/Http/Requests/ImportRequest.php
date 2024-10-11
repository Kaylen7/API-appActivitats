<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'arxiu' => 'required|file|mimes:json|max:2048',
            'tipus' => 'required|in:usuaris,activitats'
        ];
    }

    public function validateResolved(){
        parent::validateResolved();

        $path = $this->file('arxiu');
        $data = json_decode(file_get_contents($path), true);

        if (is_null($data)){
            throw ValidationException::withMessages(['arxiu' => 'Invalid JSON format.']);
        }

        if ($this->input('tipus') === 'usuaris'){
            foreach($data['usuaris'] as $dataUsuaris){
                $validarUsuari = Validator::make($dataUsuaris, (new StoreUsuariRequest())->rules());

                if($validarUsuari->fails()){
                    throw ValidationException::withMessages($validarUsuari->errors()->toArray());
                }
            }
        }elseif($this->input('tipus') === 'activitats'){
            foreach($data['activitats'] as $dataActivitats){
                $validarActivitat = Validator::make($dataActivitats, (new StoreActivitatRequest())->rules());
                if($validarActivitat->fails()){
                    throw ValidationException::withMessages($validarActivitat->errors()->toArray());
                }
            }
        }
    }
}
