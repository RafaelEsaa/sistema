<?php
namespace App\Validations;
    /**
     * Class RentalAgencyValidations
     * @package App\Models\Validations
     */
/**
 * Class UserValidations
 * @package App\Validations
 */
class RepresentanteValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerRepresentanteValidation($data)
    {
        $messages = array(
            'primer_nombre.required' => 'Este campo no puede estar vacío',
            'primer_nombre.between' => 'Este campo debe tener un minimo de 3 y maximo 10 letras',
            'primer_nombre.alpha' => 'Este campo permite solo letra',
            'segundo_nombre.required' => 'Este campo no puede estar vacío',
            'segundo_nombre.between' => 'Este campo debe tener un minimo de 3 y maximo 10 letras',
            'segundo_nombre.alpha' => 'Este campo permite solo letra',
            'primer_apellido.required' => 'Este campo no puede estar vacío',
            'primer_apellido.between' => 'Este campo debe tener un minimo de 3 y maximo 10 letras',
            'primer_apellido.alpha' => 'Este campo permite solo letra',
            'segundo_apellido.between' => 'Este campo debe tener un minimo de 3 y maximo 10 letras',
            'segundo_apellido.alpha' => 'Este campo permite solo letra',
            'fecha_nacimiento.required' => 'Este campo no puede estar vacío',
            'fecha_nacimiento.date_format' => 'El aceptado es dd-mm-yyyy',
            'telefono.required' => 'Este campo no puede estar vacío',
            'telefono.regex' => 'Este formato no es aceptado',
            'direccion.required' => 'Este campo no puede estar vacío',
            'direccion.between' => 'Este campo debe tener un minimo de 10 y maximo de 45 caracteres',
            'sueldo_mensual.required' => 'Este campo no puede estar vacío',
        );
        $rules = array(
            'primer_nombre'=>'required|between:3,10|alpha',
            'segundo_nombre'=>'required|between:3,10',
            'primer_apellido'=>'required|between:3,10',
            'segundo_apellido'=>'between:3,10',
            'fecha_nacimiento'=>'date_format:"Y-m-d"|required',
            'telefono' => 'required|regex:/^\+?\d+$/|between:10,14',
            'sueldo_mensual' => 'required',
            'direccion' => 'required|between:5,45',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}