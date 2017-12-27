<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2017
 * Time: 13:46
 */

namespace engine\core\Auth;
use engine\Helper\Cookie;

class Auth implements AuthInterface {

    protected  $autorized =false;
    protected $hash_user;

    public function autorized()
        {
            return $this->autorized;
        }

    public function hashUser()
    {
        return Cookie::get('auth_user');
    }

    public function authorize($user)
    {
        Cookie::set('auth_authorized',true);
        Cookie::set('auth_user',$user);

        $this->autorized = true;
        $this->hash_user = $user;
    }

    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');

        $this->autorized = false;
        $this->hash_user = null;


    }

    /**
     * Generaters a new random password salt
     * @return string
     */

    public static function  salt()
    {
        return (string) rand(10000000,99999999);
    }


    public static function encryptPassword($password, $salt ='')
    {
        return hash('sha256',$password .$salt );
    }
}