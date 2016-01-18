<?php
    class ProgressLog {
        public static function logPage($page){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));
            $sql       = "INSERT INTO `logs`(ipAddr,page,date,timestamp) VALUES(?,?,?,?)";
            $validate  = new validate;

            //$page      = dbSanitize($page);
            $date      = Date('Y-m-d');
            $ip        = $_SERVER['REMOTE_ADDR'];
            $timeStamp = Date('U');

            $db->beginTransaction();

            try {
                $sqlResult = $db->query($sql, array($ip,$page,$date,$timeStamp));

                if($sqlResult->error()) {
                    print $sqlResult->errorMsg();
                    throw new Exception("ERROR SQL" . $sqlResult->errorMsg());
                }

                $db->commit();

                self::setSessionLog($page);
                return TRUE;

            } catch (Exception $e) {
                $db->rollback();
                errorHandle::errorMsg($e->getMessage());
                return FALSE;
            }
        }


        private static function setSessionLog($page){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();

            if(isset($_SESSION['data']['loggedPages'])){
                $loggedPages = session::get('loggedpages');
            } else{
                $loggedPages = array();
            }

            array_push($loggedPages, $page);
            session::set('loggedpages', $loggedPages);
        }


        public static function saveSession(){
            $engine    = EngineAPI::singleton();
            $localvars = localvars::getInstance();
            $db        = db::get($localvars->get('dbConnectionName'));

            $sql       = "INSERT INTO `session`(username,sessionPages,ipAddr) VALUES(?,?,?)";
            $validate  = new validate;

            $username  = session::get('username');
            $pages     = session::get('loggedPages');
            $pages     = dbSanitize(implode(',', $pages));
            $ip        = $_SERVER['REMOTE_ADDR'];
            $sqlArray  = array($username, $pages, $ip);

            $db->beginTransaction();
            try {
                $sqlResult = $db->query($sql, $sqlArray);

                if($sqlResult->error()) {
                    throw new Exception("ERROR SQL" . $sqlResult->errorMsg());
                }

                $db->commit();
            } catch (Exception $e) {
                $db->rollback();
                $localvars->set('feedback', $e->getMessage());
                errorHandle::errorMsg($e->getMessage());
            }

        }
    }

?>