<?php

namespace App\Controller;
use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;

use phpCAS;

class Auth
{
    /**
     * @var array
     */
    public static $directory_url = 'https://directory.unl.edu/';
    public static $cas_cert_path = '/etc/pki/tls/cert.pem';
    public static $current_user = NULL;
    
    /**
     * Authenticate the user
     */
    public static function authenticate()
    {
        phpCAS::forceAuthentication();
        
        if (!phpCAS::getUser()) {
            echo "handle error";
        }
        
        self::setUser();
    }

    public static function setUser() {
        if (self::isLoggedIn()) {
            $user = self::getUser($username = phpCAS::getUser());
            self::$current_user = $user;
        }
    }

    public static function isLoggedIn()
    {
        if (phpCAS::isAuthenticated()) {
            return true;
        }
        return false;
    }

    public static function autoLogin()
    {
        if (!array_key_exists('unl_sso', $_COOKIE)) {
            //No unl_sso cookie was found, no need to auto-login.
            return;
        }
        if (self::$current_user != NULL) {
            //We are already logged in, no need to auto-login
            return;
        }
        
        //Everything looks good.  Log in!
        $result = phpCAS::checkAuthentication();
    }

    public static function singleLogOut()
    {
        phpCAS::handleLogoutRequests(false);
    }

    public static function logout()
    {
        phpCAS::logoutWithRedirectService("redirect url");
    }

    
    public static function getUser()
    {
        return phpCAS::getUser();
    }


    public static function getUserInfo() {
        $info = array();
        
        if (!$json = @file_get_contents(self::$directory_url . '?uid=' . $uid . '&format=json')) {
            return $info;
        }
        
        if (!$json = json_decode($json, true)) {
            return $info;
        }
        
        $map = array(
            'givenName' => 'first_name',
            'sn' => 'last_name',
            'mail' => 'email'
        );
        
        foreach ($map as $from => $to) {
            if (isset($json[$from][0])) {
                $info[$to] = $json[$from][0];
            }
        }
        
        return $info;
    }
    
    /**
     * Set up the SimpleCAS client
     */
    public static function setUpClient()
    {
        if (!phpCAS::isInitialized()) {
            phpCAS::client(CAS_VERSION_2_0, 'shib.unl.edu', 443, 'idp/profile/cas');
            //phpCAS::setCasServerCACert(self::$cas_cert_path);
            phpCAS::setNoCasServerValidation();
        }
    }
}
