<?php
/**
 * Created by PhpStorm.
 * User: rafaelesaa
 * Date: 2/21/17
 * Time: 01:21 PN
 */
namespace App\Validations;
    /**
     * Class RentalAgencyValidations
     * @package App\Models\Validations
     */
/**
 * Class UserValidations
 * @package App\Validations
 */
class UserValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerValidation($data)
    {
        $messages = array(
            'cedula.required' => 'Este campo no puede estar vacío',
            'cedula.regex' => 'Este formato no es aceptado. Solo números sin puntos o letras',
            'cedula.unique' => 'Ya este usuario se encuentra registrado con esta cedula',
            'cedula.between' => 'Este campo debe tener entre 7 y 8 números.',
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
            'telefono.regex' => 'Este formato no es aceptado. Ejm: 04141234567 / 4141234567',
            'telefono.between' => 'Este campo debe tener entre 10 y 11 números. Ejm: 04141234567 / 4141234567',
            'direccion.required' => 'Este campo no puede estar vacío',
            'email.required' => 'Este campo no puede estar vacío',
            'email.email' => 'Este no es un formato correcto de correo',
            'representante_id.required' => 'Este campo no puede estar vacío',
        );
        $rules = array(
            'cedula'=>'required|regex:/^\+?\d+$/|between:7,8|unique:users|unique:representantes',
            'primer_nombre'=>'required|between:3,10|alpha',
            'segundo_nombre'=>'required|between:3,10|alpha',
            'primer_apellido'=>'required|between:3,10|alpha',
            'segundo_apellido'=>'between:3,10|alpha',
            'fecha_nacimiento'=>'date_format:"Y-m-d"|required',
            'telefono' => 'required|regex:/^\+?\d+$/|between:10,11',
            'email' => 'required|email',
            'representante_id' => 'required',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}