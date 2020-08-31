<?php

namespace App\Http\Middleware\Application\BackEnd\API\Gateway
    {
    class RequestHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            return $this->CheckAllStage($varObjRequest, $next);
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varDataSeparatorTag = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR');

            try {
                //---> HTTP Header Check
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);
                
                //--->---> Check Authorization on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'HTTP Authorization Request not found in HTTP Header']));
                    }
                //--->---> Check Authorization Mode on HTTP Header  
                if(strcmp(strtolower(substr($varHTTPHeader['authorization'], 0, 6)), 'bearer')!=0)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'HTTP Authorization Requests must be in Bearer Mode']));
                    }
                //--->---> Check API Web Token Existence
                if((new \App\Models\Redis\General\APIWebToken())->isDataExist($varUserSession, (explode(' ', $varHTTPHeader['authorization']))[1]) == false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'API Web Token is not exist']));
                    }
                //--->---> Check API Web Token Expiry
                else
                    {
                    if((new \App\Models\Redis\General\APIWebToken())->isDataExpired($varUserSession, (explode(' ', $varHTTPHeader['authorization']))[1]) == true)
                        {
                        throw new \Exception(implode($varDataSeparatorTag, 
                            [403, 'API Web Token has been expired']));
                        }
                    }
                    
                    
                    
/*
throw new \Exception(implode($varDataSeparatorTag, 
    [403, ((new \App\Models\Redis\General\APIWebToken())->getDataTTL($varUserSession, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5ODg1NTQzOH0.DFZ1Qodt1ivT2PEY-0l9I1Am7Clh5EP_eZEMXcyA4Cw'))                 ]));
*/                    
//                ;
/*                    
throw new \Exception(implode($varDataSeparatorTag, 
    [403, (new \App\Models\Redis\General\APIWebToken())->getDataTTL($varUserSession, (explode(' ', $varHTTPHeader['authorization']))[1])                 ]));
*/                
                
                $varReturn = $varObjNext($varObjRequest);
                } 
            catch (\Exception $ex) {
                $varDataMessage = explode($varDataSeparatorTag, $ex->getMessage());
                $varReturn = \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $varDataMessage[0], $varDataMessage[1]);
                }
            return $varReturn;
            }
        }
    }