<?php

class ourDBH {
        
    private $serverName;
    private $userName;
    private $passWord;
    private $dbName;

    protected function connect(){
        $this->serverName = '122.00.0.1';
        $this->userName = 'a1min';
        $this->passwordName = 'P@sswOrd';
        $this->dbName = 'travelexperts';

        $link = new myqli( $this->serverName, $this->userName, $this->passwordName, $this->dbName);
        if (!$link){
            print("There was an error connecting:". mysqli_errno($link) . " -- " . mysqli_error($link));
            exit;
        }
        return $link;
    }

}

?>