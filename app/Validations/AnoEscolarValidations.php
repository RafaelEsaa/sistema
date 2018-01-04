<?php
namespace App\Validations;

class AnoEscolarValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerAnoEscolar($data)
    {
        $messages = array(
            'nombre_ano.required' => 'Este campo no puede estar vacío',
            'nombre_ano.regex' => 'Este formato no es aceptado.',
            'nombre_ano.unique' => 'Este Año Escolar ya esta registrado',
        );
        $rules = array(
            'nombre_ano'=>'required|regex:/^\d{4}-\d{4}$/|unique:ano_escolares',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}