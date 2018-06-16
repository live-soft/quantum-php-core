<?php

/**
 * Quantum PHP Framework
 * 
 * An open source software development framework for PHP
 * 
 * @package Quantum
 * @author Arman Ag. <arman.ag@softberg.org>
 * @copyright Copyright (c) 2018 Softberg LLC (https://softberg.org)
 * @link http://quantum.softberg.org/
 * @since 1.0.0
 */

namespace Quantum\Libraries\Csrf;


/**
 * Cross-Site Request Forgery class
 * 
 * @package Quantum
 * @subpackage Libraries.Csrf
 * @category Libraries
 */
class Csrf {

    public static function generateToken() {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        session()->set('token', $token);

        return $token;
    }

    public static function checkToken($token) { 
        if (session()->has('token') && session()->get('token') === $token) {
            session()->delete('token');
            return true;
        }

        return false;
    }

}