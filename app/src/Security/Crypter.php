<?php
/**
 * Created by PhpStorm.
 * User: leetspeakv2
 * Date: 29/01/17
 * Time: 19:00
 */

namespace App\Security;


class Crypter
{
    /**
     * Verifie si le mot de passe $tocheck est le meme que $src
     * @param $src
     * @param $tocheck
     * @param $salt
     * @return bool
     */
    public function checkPassword($src, $tocheck, $salt){
        $options = [
            'cost' => 10,
            'salt' => $salt
        ];
        $encPass = password_hash($tocheck, PASSWORD_BCRYPT, $options);
        return $src === $encPass;
    }
}