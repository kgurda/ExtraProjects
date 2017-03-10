<?php

class CMSystem
{
    public $host;
    public $username;
    public $password;
    public $table;

    public function displayPublic()
    {
        
    }
    
    public function displayAdmin()
    {
        
    }
    
    public function write()
    {
        
    }
    
    public function connect()
    {
        mysqli_connect($this->host, $this->username, $this->password) or die('Error connection: ' . mysqli_error());
        mysqli_select_db($this->table) or die('Error database' . mysqli_error());
        
        return $this->buildDB();
    }
    
    public function buildDB()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS testCMS (
            title VARCHAR(150),
            bodytext TEXT,
            created VARCHAR(100)
            )';
        
        return mysqli_query($sql);
    }
}
