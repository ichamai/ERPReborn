<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_API                                                                                                   |
    | ▪ Description : Menangani segala parameter yang terkait API                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_API
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPIIdentityFromClassFullName                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan API Identity (Key and Version) dari ClassFullName (varFullClassName)                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFullClassName ► Full Class Name (include namespace)                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPIIdentityFromClassFullName($varUserSession, string $varFullClassName)
            {
            $APIData = explode('\\', explode('\Engines', explode('App\\Http\\Controllers\\Application\\BackEnd\\System\\', $varFullClassName)[1])[0].explode('\Engines', explode('App\\Http\\Controllers\\Application\\BackEnd\\System\\', $varFullClassName)[1])[1]);
            array_pop($APIData);
            $varReturn['Version'] = str_replace('v', '', array_pop($APIData));
            $varReturn['Key'] = \App\Helpers\ZhtHelper\General\Helper_String::getLowerCaseFirstCharacter($varUserSession, implode('.', $APIData));
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPILatestVersion                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan API Latest Version berdasarkan API Key (varAPIKey)                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPILatestVersion($varUserSession, $varAPIKey)
            {
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);
            
            $varFileVersionHeader = 'v';
            $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.$varAPIService.'/Engines/'.str_replace('.', '/', $varAPIStructure));
            $varLastVersion = 0;
            for($i=0; $i!=count($varFolderArray); $i++)
                {
                $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                if($varLastVersion < $varCheckVersion)
                    {
                    $varLastVersion = $varCheckVersion;
                    }
                }
            $varReturn=$varLastVersion;
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataCreate                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-06                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Create                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataCreate($varUserSession, array $varDataSend)
            {
            if($varDataSend['SignRecordID'])
                {
                $varReturn = [
                    'message' => 'Data Insertion Was Successful (New Record ID : '.$varDataSend['SignRecordID'].')',
                    'recordID' => $varDataSend['SignRecordID']
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Insertion Failed');
                }            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataDelete                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Delete                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataDelete($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['Data'][0]['FuncSys_General_SetRecordDelete']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Data Deletion Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Deletion Failed');
                }
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataInitialize                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Initialize                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataInitialize($varUserSession, array $varDataSend)
            {
            if( 1 == 1 )
                {
                $varReturn = [
                    'message' => 'Data Initialization Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Initialization Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataRead                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-09                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Read                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataRead($varUserSession, array $varDataSend)
            {
            if($varDataSend)
                {
                $varReturn = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase($varUserSession, $varDataSend);
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Read Failed');
                }            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataSynchronize                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-16                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Synchronize                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataSynchronize($varUserSession, array $varDataSend)
            {
            if( 1 == 1 )
                {
                $varReturn = [
                    'message' => 'Data Synchronization Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Synchronization Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUndelete                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Undelete                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUndelete($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['Data'][0]['FuncSys_General_UnsetRecordDelete']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Cancellation of Data Delete Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Undelete Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUpdate                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-06                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Update                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUpdate($varUserSession, array $varDataSend)
            {
            if($varDataSend['SignRecordID'])
                {
                $varReturn = [
                    'message' => 'Data Update Was Successful (Record ID : '.$varDataSend['SignRecordID'].')',
                    'recordID' => $varDataSend['SignRecordID']
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Update Failed');
                }            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIEngine                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Description     : Memanggil API Engine                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varAPIKey ► API Key                                                                                      |
        |      ▪ (array)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data yang akan diproses                                                                        |
        |      ▪ (string) varFunctionName ► Nama Fungsi yang akan dipanggil                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, array $varData, string $varFunctionName=null, array $varRealDataRequest=null)
            {
            $varErrorMessage = null;
            
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);

            //---> Cek Nama Fungsi yang akan dieksekusi
            if(!$varFunctionName)
                {
                //---> Bila Null, maka disamakan dengan nama fungsi parent yang menginisiasi objek ini
                $varFunctionName = debug_backtrace()[1]['function'];
                }

            //---> Latest Version Translation
            if(strcmp($varAPIVersion, 'latest') == 0)
                {
                $varAPIVersion=self::getAPILatestVersion($varUserSession, $varAPIKey);
                }

            //---> Main Process
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.$varAPIService.'\\Engines\\'.str_replace('.', '\\', $varAPIStructure).'\\v'.$varAPIVersion.'\\'.$varAPIKeyData[count($varAPIKeyData)-1];
            
            $varMainPath = explode('\\', $varClass);
            array_pop($varMainPath);
            $varMainPath = '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', implode('\\', $varMainPath)));            
            
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                //throw new \Exception('API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found');
                $varErrorMessage = 'API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found';
                $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $varErrorMessage);
                }
            else
                {    
                if($varRealDataRequest)
                    {
                    $varFilePathJSONValidation = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), $varMainPath.'/JSONRequestSchema.json');
                    if(!$varFilePathJSONValidation)
                        {
                        $varErrorMessage = 'JSON Request Contract for API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found';
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $varErrorMessage);
                        }
                    $varJSONSchemaValidationStatus = \App\Helpers\ZhtHelper\General\Helper_JSON::getSchemaValidationFromFile($varUserSession, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest), $varFilePathJSONValidation);
                    if($varJSONSchemaValidationStatus==false)
                        {
                        $varErrorMessage = 'JSON Request incompatible with API\'s Contract ('.$varAPIKey.' version '.$varAPIVersion.')';
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 400, $varErrorMessage);
                        }                
                    }
                
/*
if(strcmp($varAPIKey, 'environment.general.session.getData')==0)
    {
    //$varErrorMessage = 'test'.json_encode($varRealDataRequest);
    //$varErrorMessage = 'test'.\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest);
    //$varErrorMessage = 'test'.$varFilePathJSONValidation;
//    $varJSONSchemaValidationStatus = \App\Helpers\ZhtHelper\General\Helper_JSON::getSchemaValidationFromFile($varUserSession, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest), $varFilePathJSONValidation);
    $varErrorMessage = 'test '.($varJSONSchemaValidationStatus==true ? 'Udah OK' : 'Engga OK Banget');

/*                    $varJSONRequestSchema = new \Swaggest\JsonSchema\Schema();
                    $varJSONRequestSchema->import($varFilePathJSONValidation);
                    $varJSONRequestSchema->in(json_decode(\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest)));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->import($varFilePathJSONValidation));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->in(json_decode(\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest))));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->validate());
    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $varErrorMessage);
    }
*/
                

                if(!$varErrorMessage)
                    {
                    require_once($varFilePath);
                    $varReturn = (new $varClass())->{$varFunctionName}($varUserSession, $varData);
                    }
                }
                
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Fail                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Fail Engine Return HTTP Response                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varHTTPErrorCode ► Error Code HTTP Response                                                              |
        |      ▪ (string) varHTTPErrorMessage ► Error Message HTTP Response                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Fail($varUserSession, int $varHTTPErrorCode, string $varHTTPErrorMessage = null)
            {
            if(!$varHTTPErrorMessage)
                {
                $varHTTPErrorMessage = '';
                }
            $varReturn = [
                "metadata" => [
                    "successStatus" => false
                    ],
                "data" => [
                    "code" => $varHTTPErrorCode,
                    "message" => $varHTTPErrorMessage
                    ]
                ];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Success                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan Success Engine Return HTTP Response                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data yang akan dikirim oleh HTTP Response                                                      |
        |      ▪ (array)  varAPIIdentity ► API Identity (Key & Version)                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Success($varUserSession, array $varData, array $varAPIIdentity = null)
            {
            if(!$varAPIIdentity)
                {
                $APIKey = null;
                $APIVersion = null;
                }
            else
                {
                $APIKey = $varAPIIdentity['Key'];
                $APIVersion = $varAPIIdentity['Version'];
                }
            
            $varReturn = [
                "metadata" => [
                    "APIResponse" =>
                        [
                        'key' => $APIKey,
                        'version' => $APIVersion,
                        ],
                    "successStatus" => true
                    ],
                "data" => $varData
                ];
            return $varReturn;
            }


         /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserLoginSessionEntityByAPIWebToken                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-06                                                                                           |
        | ▪ Description     : Mendapatkan API User Login Identity berdasarkan APIWebToken                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserLoginSessionEntityByAPIWebToken($varUserSession, string $varAPIWebToken = null)
            {
            if(!$varAPIWebToken)
                {
                $varDataHeader = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader($varUserSession);
                $varAPIWebToken = str_replace('Bearer ', '', $varDataHeader['authorization'][0]);                
                }

            $varReturn = [
                'APIWebToken' => $varAPIWebToken,
                'userLoginSessionID' => null,
                'userID' => null,
                'userRoleID' => null,
                'branchID' => null,
                'sessionStartDateTimeTZ' => null,
                'sessionAutoStartDateTimeTZ' => null,
                'sessionAutoFinishDateTimeTZ' => null
                ];
            
            if((new \App\Models\Database\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken) == true)
                {
                $varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken));
            
                $varReturn['userLoginSessionID'] = $varData['userLoginSession_RefID'];
                $varReturn['userID'] = $varData['user_RefID'];
                $varReturn['userRoleID'] = $varData['userRole_RefID'];
                $varReturn['branchID'] = $varData['branch_RefID'];
                $varReturn['sessionStartDateTimeTZ'] = $varData['sessionStartDateTimeTZ'];
                $varReturn['sessionAutoStartDateTimeTZ'] = $varData['sessionAutoStartDateTimeTZ'];
                $varReturn['sessionAutoFinishDateTimeTZ'] = $varData['sessionAutoFinishDateTimeTZ'];
                }

            return $varReturn;
            }
        }
    }