<?php

/*
 *  Copyright (c) 2012  Rasmus Fuhse <fuhse@data-quest.de>
 * 
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License as
 *  published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 */

class AdminerAutologin {
    protected $server;
    protected $username;
    protected $database;
    protected $password;

    //disables normal login with loginform
    function login($login, $password) {
        return (bool) $_SESSION['STUDIP_LOGIN'];
    }
    
	function credentials() {
        // server, username and password for connecting to database 
        $this->fetchVars();
        return array(
            $this->server,
            $this->username,
            $this->password
        );
    }
    
    protected function fetchVars() {
        if (file_exists(dirname(__file__)."/../config.php")) {
            include dirname(__file__)."/../config.php";
            $_SESSION['STUDIP_DB_SERVER'] = $STUDIP_DB_SERVER;
            $_SESSION['STUDIP_DB_USER'] = $STUDIP_DB_USER;
            $_SESSION['STUDIP_DB_NAME'] = $STUDIP_DB_NAME;
            $_SESSION['STUDIP_DB_PASSWORD'] = $STUDIP_DB_PASSWORD;
            unlink(dirname(__file__)."/../config.php");
            $_SESSION['STUDIP_LOGIN'] = true;
        }
        $this->server = $_SESSION['STUDIP_DB_SERVER'];
        $this->username = $_SESSION['STUDIP_DB_USER'];
        $this->database = $_SESSION['STUDIP_DB_NAME'];
        $this->password = $_SESSION['STUDIP_DB_PASSWORD'];
    }
}

