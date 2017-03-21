<?php
namespace App\Validations;
    /**
     * @package App\Models\Validations
     */
/**
 * Class SeccionValidations
 * @package App\Validations
 */
class SeccionValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerSeccionValidation($data)
    {
        $messages = array(
            'nombre_seccion.required' => 'Este campo no puede estar vacío',
            'nombre_seccion.alpha' => 'Este campo solo permite letra',
            'nombre_seccion.between' => 'Este campo solo permite maximo una letra',
            'nombre_seccion.unique' => 'Esta sección ya esta registrada',
        );
        $rules = array(
            'nombre_seccion'=>'required|alpha|between:1,1|unique:secciones',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}