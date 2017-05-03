<?php
namespace App\Validations;

class GradoValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerGradoValidation($data)
    {
        $messages = array(
            'nombre_grado.required' => 'Este campo no puede estar vacío',
            'nombre_grado.unique' => 'Este campo ya esta registrado',
        );
        $rules = array(
            'nombre_grado'=>'required|unique:grados',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}