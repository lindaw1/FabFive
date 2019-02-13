<?php

class ourDBH {
        
    private $serverName;
    private $userName;
    private $passWord;
    private $dbName;

    protected function connect(){
        $this->serverName = '127.0.0.1';
        $this->userName = 'admin';
        $this->passwordName = 'P@ssw0rd';
        $this->dbName = 'travelexperts';

        $link = new mysqli( $this->serverName, $this->userName, $this->passwordName, $this->dbName);
        if (!$link){
            print("There was an error connecting:". mysqli_errno($link) . " -- " . mysqli_error($link));
            exit;
        }
        return $link;
    }

}

?>