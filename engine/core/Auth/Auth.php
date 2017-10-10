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
    protected $user;

    public function autorized()
        {
            return $this->autorized;
        }

    public function user()
    {
        return $this->user;
    }

    public function authorize($user)
    {
        Cookie::set('auth.authorized',true);
        Cookie::set('auth.user',$user);

        $this->autorized = true;
        $this->user = $user;
    }

    public function unAuthorize()
    {
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');

        $this->autorized = false;
        $this->user = null;


    }

    public static function  salt()
    {
        return (string) rand(10000000,99999999);
    }

    public static function encryptPassword($password, $salt ='')
    {
        return hash('sha256',$password .$salt );
    }
}