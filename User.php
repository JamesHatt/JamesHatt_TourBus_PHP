<?php
class User {
    private $username;
    private $password;
      /* This is the visability of my private method. It is declared as private,
       meaning can only be accessed by myself and CANNOT  be altered by somebody else*/
    
    // Constructor that saves/stores the user input
    public function __construct($u, $p) {
        $this->username = $u;
        $this->password = $p;
    }
    
        /* Methods/Functions that are meant to retrieve and output
    the username and password */
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }    
}
