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
            'grados_id.required' => 'Este campo no puede estar vacío',
            'secciones_id.required' => 'Este campo no puede estar vacío',
        );
        $rules = array(
            'grados_id'=>'required',
            'secciones_id'=>'required',
        );

        $validator = \Validator::make($data, $rules, $messages);
        return $validator;
    }
}