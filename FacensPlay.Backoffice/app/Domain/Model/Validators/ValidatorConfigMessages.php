<?php

namespace App\Domain\Model\Validators;

class ValidatorConfigMessages
{
    public static $messages = [
        'required' => 'O atributo :attribute não pode ser branco.',
        'unique' => 'O valor inserido já existe no cadastro.',
        'min' => 'O comprimento não pode ser menor que :min caracteres.',
        'max' => 'O campo não deve ultrapassar :max caracteres.',
        'same' => 'Os campos digitados nao conferem'
    ];
}