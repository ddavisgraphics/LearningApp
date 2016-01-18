<?php
    class LoginAuth{

        /**
        * =========================================================
        * Registers the users and puts them into the db
        * =========================================================
        **/
       public static function registerUser($username, $password, $email){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));
            $sql       = "INSERT INTO `users`(username,password,emailAddress,ipAddr) VALUES(?,?,?,?)";
            $validate  = new validate;
            $ip        = $_SERVER['REMOTE_ADDR'];

            $db->beginTransaction();

            try {
                // prep for database
                $email    = dbSanitize($email);
                $password = dbSanitize($password);
                $username = dbSanitize($username);
                $password = self::protectPassword($password);

                if(!$validate->emailAddr($email)){
                    throw new Exception('Email is invalid');
                }

                if(self::checkEmail($email)){
                    throw new Exception('Email is already being used please login instead');
                }

                if(!self::checkUsername($username)){
                    $sqlResult = $db->query($sql, array($username,$password,$email,$ip));

                    if($sqlResult->error()) {
                        throw new Exception("Error Getting Entries");
                    }

                    $db->commit();
                    return true;
                }
            } catch (Exception $e) {
                $db->rollback();
                errorHandle::errorMsg($e->getMessage());
                return false;
            }
        }

        /**
        * =========================================================
        * Checks to see if the session for the user exsists
        * then checks to se if the user name exsists
        * =========================================================
        **/

        public static function checkAuthorization(){
            if(isset($_SESSION['data']['username'])){
                $username = session::get('username');
                if(self::checkUsername($username)){
                    return true;
                } else {
                    return false;
                }
            } else{
                return  false;
            }
        }

        /**
        * =========================================================
        * Allows the user to login and compares the passwords.
        * =========================================================
        **/
        public static function loginUser($username, $password){
            if(self::checkUsername($username) && self::checkPassword($username,$password)){
                session::set("username", $username);
                return true;
            } else {
                return false;
            }
        }

        /**
        * =========================================================
        * Logs user out.
        * =========================================================
        **/

        public static function logout(){
            session::destroy("username");
        }

        /**
        * =========================================================
        *  Checks the password to see if it matches the stored password
        * =========================================================
        **/

        private static function checkPassword($username, $password){
            // sanitized credentials
            $username       = dbSanitize($username);
            $password       = dbSanitize($password);
            $storedPassword = self::getStoredPassword($username);

            if(hash_equals($storedPassword, crypt($password, $storedPassword))){
                return true;
            } else {
                return false;
            }
        }

        private static function getStoredPassword($username){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));
            $sql       = "SELECT `password` FROM `users` WHERE `username`=? LIMIT 1";

            $username = dbSanitize($username);
            $sqlResult = $db->query($sql, array($username));

            try {
                if($sqlResult->error()) {
                    throw new Exception("Error Getting Entries");
                }

                if($sqlResult->rowCount() < 1) {
                    throw new Exception('No Users match case');
                } else {
                    $row = $sqlResult->fetch();
                    return $row['password'];
                }
            } catch (Exception $e) {
                errorHandle::errorMsg($e->getMessage());
            }
       }


        /**
        * =========================================================
        * Protects the users password for the database
        * =========================================================
        **/
        public static function protectPassword($password){
            $cost = 10;
            $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $salt = sprintf("$2a$%02d$", $cost) . $salt;
            $hash = crypt($password, $salt);
            return $hash;
        }

        /**
        * =========================================================
        * Provides logic for all the username checks to make sure
        * that the usernames are either in the database, or not in
        * the database depending upon the application.
        * =========================================================
        **/
        public static function checkUsername($username){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));
            $sql       = "SELECT `username` FROM `users` WHERE `username`=? LIMIT 1";

            $username = dbSanitize($username);
            $sqlResult = $db->query($sql, array($username));

            try {
                if($sqlResult->error()) {
                    throw new Exception("Error Getting Entries");
                }

                if($sqlResult->rowCount() < 1) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                errorHandle::errorMsg($e->getMessage());
            }
       }

       /**
        * =========================================================
        * Checks logic for searching if user email is in the system
        * this will help to provide a way to make sure that users
        * are not duplicated in the system.
        * =========================================================
        **/
        public static function checkEmail($email){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));
            $sql       = "SELECT `email` FROM `users` WHERE `email`=? LIMIT=1";

            $email = dbSanitize($email);
            $sqlResult = $db->query($sql, array($email));

            try {
                if($sqlResult->error()) {
                    throw new Exception("Error Getting Entries");
                }

                if($sqlResult->rowCount() < 1) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                errorHandle::errorMsg($e->getMessage());
            }
        }
    }
?>