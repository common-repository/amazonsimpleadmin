<?php
/**
 * AmazonSimpleAdmin - Wordpress Plugin
 * 
 * @author Timo Reith
 * @copyright Copyright (c) 2007-2011 Timo Reith (http://www.wp-amazon-plugin.com)
 * 
 * 
 */

require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Request/Abstract.php';

class Asa_Service_Amazon_Request_Curl extends Asa_Service_Amazon_Request_Abstract 
{
    
    public function _send($request_url)
    {		
		$config = array(
            'adapter' => 'AsaZend_Http_Client_Adapter_Curl',
        );

        $client = new AsaZend_Http_Client($request_url, $config);

        return $client->request('GET');
    }
}
?>
