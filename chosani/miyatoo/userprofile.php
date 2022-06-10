<?php
    class profile{
        function get_profile($id){

            // add slashes ti the id to protcet your users from sql injection
            $id = addslashes($id);
            $DB = new Database();
            $query = "SELECT * from user where userid = '$id' limit 1";
            //echo $query;
            return $DB->read($query);
        }
    }