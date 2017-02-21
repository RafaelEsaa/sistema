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
            'primer_nombre.required' => 'Este campo no puede estar vacío',
            'primer_nombre.size' => 'Este campo debe tener un minimo de 3 letras',
            'segundo_nombre.required' => 'Este campo no puede estar vacío',
            'primer_apellido.required' => 'Este campo no puede estar vacío',
            'segundo_apellido.required' => 'Este campo no puede estar vacío',
            'fecha_nacimiento.required' => 'Este campo no puede estar vacío',
            'fecha_nacimiento.date' => 'Este formato no es aceptado',
            'telefono.required' => 'Este campo no puede estar vacío',
            'telefono.regex' => 'Este formato no es aceptado',
        );
        $rules = array(
            'primer_nombre'=>'required',
            'primer_nombre'=>'size:2',
            'segundo_nombre'=>'required',
            'primer_apellido'=>'required',
            'segundo_apellido'=>'required',
            'fecha_nacimiento'=>'date_format:"d-m-Y"',
            'telefono' => 'required|regex:/^\+?\d+$/|between:10,14',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}