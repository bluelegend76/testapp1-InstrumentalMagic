<?php

class LoginService
{
    private $username = "";
    private $password = "";
    private $user_id = null;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }




    public function login() //maybe make this public?
    {
        $con = new Connection();
        $userDAO = new UserDAO($con);
        $user = $userDAO->getUserByUsername($this->username);
        if (is_null($user))
        {
            return false;
        }
        $actualPassword = $user->UserPassword;
        if ($this->password == $actualPassword && $this->password != "")
        {   
            $this->user_id = $user->UserProfile_ID;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUserProfileID()
    {
        return $this->user_id;
    }
}

?>