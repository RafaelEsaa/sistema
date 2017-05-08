<?php
namespace App\Validations;

class GradoSeccionValidations
{
    /**
     * @param $data
     * @return mixed
     */
    static function registerGradoSeccion($data)
    {
        $messages = array(
            'grado_id.required' => 'Este campo no puede estar vacío',
            'seccion_id.required' => 'Este campo no puede estar vacío',
        );
        $rules = array(
            'grado_id'=>'required',
            'seccion_id'=>'required',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}