<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    use Illuminate\Http\Request;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Session                                                                                                      |
    | ▪ Description : Menangani Session                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Session
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            }
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : delete                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Menghapus session berdasarkan kata kunci (varKey)                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function delete($varKey)
            {
            session()->forget($varKey);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : get                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Menampilkan data (varReturn) dari session berdasarkan kata kunci (varKey)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn ► Nilai                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function get($varKey)
            {
            $varReturn = session($varKey);
            return $varReturn;
            }
 
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isExist                                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mengecek apakah Session sudah ada berdasarkan kata kunci (varKey)                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn ► Nilai                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isExist($varKey)
            {
            $varReturn = false;
            if((self::get($varKey)!=null))
                {
                $varReturn = true;
                }
            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : set                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Menyimpan data (varValue) kedalam session berdasarkan kata kunci (varKey)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        |      ▪ (string) varValue ► Nilai                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function set($varKey, $varValue)
            {
            session([$varKey => $varValue]);
            }
        }
    }