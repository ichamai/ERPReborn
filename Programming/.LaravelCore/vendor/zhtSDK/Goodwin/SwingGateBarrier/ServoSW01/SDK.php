<?php

namespace zhtSDK\Goodwin\SwingGateBarrier\ServoSW01
    {
    class zhtSDK
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Class Attributes                                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varSDKPath;
        private $varUserSession;
        private $varHostIP;
        private $varHostPort;
        private $varTimeOutInSeconds;
        private $ObjLib;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-12                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession, string $varHostIP, int $varHostPort)
            {
            $this->init($varUserSession, $varHostIP, $varHostPort);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-15                                                                                           |
        | ▪ Description     : System's Init                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function init($varUserSession, string $varHostIP, int $varHostPort)
            {
            $this->varUserSession = $varUserSession;
            $this->varSDKPath = getcwd().'/../vendor/zhtSDK/Goodwin/SwingGateBarrier/ServoSW01';
            $this->varHostIP = $varHostIP;
            $this->varHostPort = $varHostPort;
            $this->varTimeOutInSeconds = 3;
            
            require_once($this->varSDKPath.'/Compatible/GitHub_kamshory_ZKLibrary/zklibrary.php');
            $this->ObjLib = new \ZKLibrary($this->varHostIP, $this->varHostPort);
            $this->ObjLib->setTimeout($this->varTimeOutInSeconds);            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataAttendance                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-15                                                                                           |
        | ▪ Description     : Mendapatkan Seluruh Data                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varTimeZoneOffset ► Time Zone Offset                                                                     |
        |      ▪ (string) varCutOffStartDateTime ► CutOff Start Date Time                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataAttendance()
            {
            $varReturn = null;
            try {
                if($this->ObjLib->connect())
                    {
                    $varReturn = $this->ObjLib->getAttendance();
                    $this->ObjLib->disconnect();
                    }
                else
                    {
                    throw new \Exception("Connection Failed");
                    }
                return $varReturn;                
                } 
            catch (\Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDeviceSerialNumber                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-15                                                                                           |
        | ▪ Description     : Mendapatkan Nomor Seri Alat                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDeviceSerialNumber()
            {
            $varReturn = null;
            try {
                if($this->ObjLib->connect())
                    {
                    $varReturn = $this->ObjLib->getSerialNumber();
                    $this->ObjLib->disconnect();
                    }
                else
                    {
                    throw new \Exception("Connection Failed");
                    }
                return $varReturn;                
                } 
            catch (\Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDeviceTime                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-15                                                                                           |
        | ▪ Description     : Mendapatkan Waktu pada Alat                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDeviceTime()
            {
            $varReturn = null;
            try {
                if($this->ObjLib->connect())
                    {
                    $varReturn = $this->ObjLib->getTime();
                    $this->ObjLib->disconnect();
                    }
                else
                    {
                    throw new \Exception("Connection Failed");
                    }
                return $varReturn;                
                } 
            catch (\Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDeviceUser                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-15                                                                                           |
        | ▪ Description     : Mendapatkan Identitas Pengguna pada Alat                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDeviceUser()
            {
            $varReturn = null;
            try {
                if($this->ObjLib->connect())
                    {
                    $varReturn = $this->ObjLib->getUser();
                    $this->ObjLib->disconnect();
                    }
                else
                    {
                    throw new \Exception("Connection Failed");
                    }
                return $varReturn;                
                } 
            catch (\Exception $ex) {
                }
            }            
        }
    }