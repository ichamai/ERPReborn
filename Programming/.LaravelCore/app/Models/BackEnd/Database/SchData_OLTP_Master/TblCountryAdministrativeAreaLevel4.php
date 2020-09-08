<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCountryAdministrativeAreaLevel4                                                                           |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCountryAdministrativeAreaLevel4                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCountryAdministrativeAreaLevel4 extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            parent::__construct(__CLASS__);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varSysDataAnnotation ► System Data Annotation                                                           |
        |      ▪ (string)  varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Ref Type               |
        |      ▪ (int)     varSysBranchRefID ► System Branch Reference ID                                                          |
        |      ▪ (int)     varCountryAdministrativeAreaLevel3_RefID ► Country Reference ID                                         |
        |      ▪ (string)  varName ► Name                                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)   varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varCountryAdministrativeAreaLevel3_RefID = null, string $varName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [null, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranchRefID, 'bigint'],
                        [$varCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                        [$varName, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (int)     varUserSession ► User Session                                                                           |
        |      ▪ (int)     varSysID ► System Record ID                                                                             |
        |      ▪ (string)  varSysDataAnnotation ► System Data Annotation                                                           |
        |      ▪ (string)  varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Ref Type               |
        |      ▪ (int)     varSysBranchRefID ► System Branch Reference ID                                                          |
        |      ▪ (int)     varCountryAdministrativeAreaLevel3_RefID ► Country Reference ID                                         |
        |      ▪ (string)  varName ► Name                                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)   varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varCountryAdministrativeAreaLevel3_RefID = null, string $varName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [$varSysID, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranchRefID, 'bigint'],
                        [$varCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                        [$varName, 'varchar']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }