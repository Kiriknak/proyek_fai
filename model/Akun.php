<?php
class Akun{
    
    private $username;
    private $password;
    private $email;
    private $tgl_lahir;
    private $alamat;
    private $avatar;
    private $saldo;
    private $level;
    
    function __construct($username,$password,$email,$avatar,$telepon,$tgl_lahir,$alamat,$saldo,$level)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->telepon = $telepon;
        $this->tgl_lahir = $tgl_lahir;
        $this->alamat = $alamat;
        $this->saldo = $saldo;
        $this->level = $level;
    }
    
    public static function makeNonAvatar($username,$password,$email,$telepon,$tgl_lahir,$alamat,$saldo,$level)
    {
        $avatar = addslashes(file_get_contents('../src/default.png'));
        $obj=new Akun($username,$password,$avatar,$email,$telepon,$tgl_lahir,$alamat,$saldo,$level);
        return $obj;
    }
    

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of tgl_lahir
     */ 
    public function getTgl_lahir()
    {
        return $this->tgl_lahir;
    }

    /**
     * Set the value of tgl_lahir
     *
     * @return  self
     */ 
    public function setTgl_lahir($tgl_lahir)
    {
        $this->tgl_lahir = $tgl_lahir;

        return $this;
    }

    /**
     * Get the value of alamat
     */ 
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Set the value of alamat
     *
     * @return  self
     */ 
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of saldo
     */ 
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */ 
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }
}
