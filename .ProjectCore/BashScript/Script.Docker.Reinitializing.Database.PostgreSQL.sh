#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.PostgreSQL.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-postgresql) pada Container
#                        PostgreSQL
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;
#sudo docker exec -it postgresql /bin/bash -c "apt update; apt list --upgradable; apt install sudo; ";

varCmd='sudo docker exec -it postgresql /bin/bash -c';

varCmdContainer='psql -U postgres -d postgres -c';
varRoleName='SysEngine';
varRolePassword='748159263';
echo "---> Initializing Role : "$varRoleName" With Password "$varRolePassword;
$varCmd "$varCmdContainer \"REASSIGN OWNED BY \\\""$varRoleName"\\\" TO postgres; DROP OWNED BY \\\""$varRoleName"\\\";\"";
$varCmd "$varCmdContainer \"DROP ROLE IF EXISTS \\\""$varRoleName"\\\";\"";
$varCmd "$varCmdContainer \"CREATE ROLE \\\""$varRoleName"\\\" LOGIN SUPERUSER CREATEROLE CREATEDB PASSWORD '"$varRolePassword"';\"";
varRoleName='SysAdmin';
varRolePassword='748159263';
echo "---> Initializing Role : "$varRoleName" With Password "$varRolePassword;
$varCmd "$varCmdContainer \"REASSIGN OWNED BY \\\""$varRoleName"\\\" TO postgres; DROP OWNED BY \\\""$varRoleName"\\\";\"";
$varCmd "$varCmdContainer \"DROP ROLE IF EXISTS \\\""$varRoleName"\\\";\"";
$varCmd "$varCmdContainer \"CREATE ROLE \\\""$varRoleName"\\\" LOGIN SUPERUSER CREATEROLE CREATEDB PASSWORD '"$varRolePassword"';\"";
echo "";


varDBName='dbERPReborn-SysConfig';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
#echo "---> Reinitializing Database : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
#echo "   ---> Database Cloning : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "---> Reinitializing Environment Parameter on Database";
varCmdContainer='psql -U "SysEngine" -d "'$varDBName'" -c';
$varCmd "$varCmdContainer \"UPDATE \\\"SchSysConfig\\\".\\\"TblDBObject_Parameter\\\" SET \\\"Value\\\" = '172.28.0.2' WHERE \\\"Key\\\" = 'DB.BackEnd.DataOLAP.Host' OR \\\"Key\\\" = 'DB.BackEnd.DataBinaryObject.Host' OR \\\"Key\\\" = 'DB.BackEnd.DataOLTP.Host' OR \\\"Key\\\" = 'DB.BackEnd.SysConfig.Host' OR \\\"Key\\\" = 'DB.FrontEnd.Host';\"";
#echo "";


varDBName='dbERPReborn-Data-OLTP';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
#echo "---> Reinitializing Database : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
#echo "   ---> Database Cloning : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
#echo "";


varDBName='dbERPReborn-Data-OLAP';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
#echo "---> Reinitializing Database : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
#echo "   ---> Database Cloning : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
#echo "";


varDBName='dbERPReborn-Data-BinaryObject';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
#echo "---> Reinitializing Database : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
#echo "   ---> Database Cloning : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
#echo "";


varDBName='dbERPReborn';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';

#echo "---> Reinitializing Database : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
#sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
#echo "   ---> Create Extension : MySQL_FDW";
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" -c \"CREATE EXTENSION mysql_fdw;\"";
#echo "   ---> Database Cloning : "$varDBName;
#sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
#sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "---> Initializing Database Link";
varCmdContainer='psql -U postgres -d "'$varDBName'" -c';
$varCmd "$varCmdContainer \"CREATE EXTENSION mysql_fdw SCHEMA public;\"";
$varCmd "$varCmdContainer \"DROP SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" CASCADE;\"";
$varCmd "$varCmdContainer \"CREATE SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" FOREIGN DATA WRAPPER mysql_fdw OPTIONS (host '127.0.0.1', port '3306');\"";
$varCmd "$varCmdContainer \"DROP USER MAPPING FOR \\\"SysEngine\\\" SERVER \\\"dbExtern-MySQL-ERP-QDC\\\";\"";
$varCmd "$varCmdContainer \"CREATE USER MAPPING FOR \\\"SysEngine\\\" SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" OPTIONS (password '748159263', username 'SysEngine');\"";
varCmdContainer='psql -U "SysEngine" -d "'$varDBName'" -c';
$varCmd "$varCmdContainer \"SELECT * FROM \\\"SchSysConfig\\\".\\\"FuncSys_KickStart1_ForeignSchema1\\\"('172.28.0.2', '5432');\"";
