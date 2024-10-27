<?php
/**
 * AmazonSimpleAdmin - Wordpress Plugin
 * 
 * @author Timo Reith
 * @copyright Copyright (c) 2007-2011 Timo Reith (http://www.wp-amazon-plugin.com)
 * 
 * 
 */

require_once ASA_LIB_DIR . 'Asa/Service/Exception.php';
require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Exception.php';
require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Interface.php';
require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Request.php';
require_once ASA_LIB_DIR . 'Asa/Service/PaApi5.php';

class Asa_Service_Amazon implements Asa_Service_Amazon_Interface 
{
    /**
     * Webservice URLs sorted by locale
     * @deprecated
     * @var array
     */
    protected static $_endpoints = array(
        'AE' => 'http://webservices.amazon.ae/onca/xml',
        'AU' => 'http://webservices.amazon.com.au/onca/xml',
        'BR' => 'http://webservices.amazon.com.br/onca/xml',
        'CA' => 'http://ecs.amazonaws.ca/onca/xml',
        'DE' => 'http://ecs.amazonaws.de/onca/xml',
        'ES' => 'http://webservices.amazon.es/onca/xml',
        'FR' => 'http://ecs.amazonaws.fr/onca/xml',
        'IN' => 'http://webservices.amazon.in/onca/xml',
        'IT' => 'http://webservices.amazon.it/onca/xml',
        'JP' => 'http://ecs.amazonaws.jp/onca/xml',
        'MX' => 'http://webservices.amazon.com.mx/onca/xml',
        'NL' => 'http://webservices.amazon.nl/onca/xml',
        'PL' => 'http://webservices.amazon.pl/onca/xml',
        'SG' => 'http://webservices.amazon.sg/onca/xml',
        'SE' => 'http://webservices.amazon.se/onca/xml',
        'TR' => 'http://ecs.amazonaws.com.tr/onca/xml',
        'UK' => 'http://ecs.amazonaws.co.uk/onca/xml',
        'US' => 'http://webservices.amazon.com/onca/xml'
    );

    /**
     * Webservice URLs sorted by locale
     * @var array
     */
    protected static $_endpoints_ssl = array(
        'AE' => 'https://webservices.amazon.ae/onca/xml',
        'AU' => 'https://webservices.amazon.com.au/onca/xml',
        'BE' => 'https://webservices.amazon.com.be/onca/xml',
        'BR' => 'https://webservices.amazon.com.br/onca/xml',
        'CA' => 'https://webservices.amazon.ca/onca/xml',
        'DE' => 'https://webservices.amazon.de/onca/xml',
        'EG' => 'https://webservices.amazon.eg/onca/xml',
        'ES' => 'https://webservices.amazon.es/onca/xml',
        'FR' => 'https://webservices.amazon.fr/onca/xml',
        'IN' => 'https://webservices.amazon.in/onca/xml',
        'IT' => 'https://webservices.amazon.it/onca/xml',
        'JP' => 'https://webservices.amazon.co.jp/onca/xml',
        'MX' => 'https://webservices.amazon.com.mx/onca/xml',
        'NL' => 'https://webservices.amazon.nl/onca/xml',
        'PL' => 'https://webservices.amazon.nl/onca/xml',
        'SA' => 'https://webservices.amazon.sa/onca/xml',
        'SG' => 'https://webservices.amazon.sg/onca/xml',
        'SE' => 'https://webservices.amazon.se/onca/xml',
        'TR' => 'https://webservices.amazon.com.tr/onca/xml',
        'UK' => 'https://webservices.amazon.co.uk/onca/xml',
        'US' => 'https://webservices.amazon.com/onca/xml'
    );
    
    /**
     * Amazon associate tag
     * @var unknown_type
     */
    protected $_associate_tag;
    
    /**
     * Amazon webservice access key id
     * @var string
     */
    protected $_access_key_id;
    
    /**
     * Amazon webservice secret access key
     * @var string
     */
    protected $_secret_access_key;
    
    /**
     * The api locale
     * @var string
     */
    protected $_locale;

    /**
     * @var string
     */
    protected $_connection_type = 'https';
    
    /**
     * The api version to use
     * @var string
     */
    public static $api_version = '2013-08-01';
    
    /**
     * The Asa request object
     * @var Asa_Service_Amazon_Request_Abstract
     */
    protected $_request;


    /**
     * Asa Constructor
     * @param string $access_key
     * @param string $secret
     * @param string $tag
     * @param string $locale
     * @param null $connection_type
     * @throws Asa_Service_Amazon_Exception
     */
    public function __construct($access_key, $secret, $tag, $locale, $connection_type = null)
    {
        if (empty($access_key)) {
            throw new Asa_Service_Amazon_Exception('Missing access key');
        }
        if (empty($secret)) {
            throw new Asa_Service_Amazon_Exception('Missing secret access key');
        }
        if (empty($tag)) {
            throw new Asa_Service_Amazon_Exception('Missing associate tag');
        }
        if (empty($locale)) {
            throw new Asa_Service_Amazon_Exception('Missing locale');
        }
        
        $this->setAccessKeyId($access_key);
        $this->setAccessKeySecret($secret);
        $this->setAssociateTag($tag);
        $this->setLocale($locale);
        if ($connection_type !== null) {
            $this->setConnectionType($connection_type);
        }
        
        // init the request object
        $this->_request = Asa_Service_Amazon_Request::factory($this);
    }

    /**
     * Factory
     *
     * @param string $access_key
     * @param string $secret
     * @param string $tag
     * @param string $locale
     * @param null $connection_type
     * @return Asa_Service_Amazon
     * @throws Asa_Service_Amazon_Exception
     */
    public static function factory($access_key, $secret, $tag, $locale, $connection_type = null)
    {
        if (asa_is_pa_api_5()) {
            $Asa = new Asa_Service_PaApi5($access_key, $secret, $tag, $locale, $connection_type);
        } else {
            $Asa = new Asa_Service_Amazon($access_key, $secret, $tag, $locale, $connection_type);

            if (getenv('ASA_APPLICATION_ENV') == 'development' || get_option('_asa_debug') == true) {
                require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Debug.php';
                $AsaDebug = new Asa_Service_Amazon_Debug($Asa);
                return $AsaDebug;
            }
        }
        
        return $Asa;
    }    

    /**
     * (non-PHPdoc)
     * @see Asa_Service_Amazon_Interface::itemLookup()
     */
    public function itemLookup($asin, array $options=array()) 
    {
        if (empty($asin)) {
            throw new Asa_Service_Amazon_Exception('Missing ASIN');
        }

        if (!empty($options['ResponseGroup']) && is_array($options['ResponseGroup'])) {
            $response_group = implode(',', $options['ResponseGroup']);
        } else {
            $response_group = 'ItemAttributes,Images,Offers,OfferListings,Reviews,EditorialReview,Tracks';
        }
        
        $url_params = array(
            'Operation'     => 'ItemLookup',
            'ItemId'        => $asin,
            'ResponseGroup' => $response_group
        );

        $requestToken = md5(implode('', $url_params));
        //Asa_Util_Buffer::$debug = true;
        if (Asa_Util_Buffer::exists($requestToken, 'item-lookup')) {
            $response = Asa_Util_Buffer::get($requestToken, 'item-lookup');
        } else {
            // get the response
            $response = $this->_request->send($url_params);
            Asa_Util_Buffer::set($requestToken, $response, 'item-lookup');
        }

        if (!$response) {
            return false;
        }

        // init and return the ZF object
        $dom = new DOMDocument();
        $xml_response = $response;

        $dom->loadXML($xml_response);
        $xpath = new DOMXPath($dom);
        $xpath->registerNamespace('az', 'http://webservices.amazon.com/AWSECommerceService/'. self::$api_version);

        // check for errors
        $errors = $xpath->query('//az:Items/az:Request/az:Errors/az:Error');

        if ($errors->length > 0) {

            // errors found in response
            require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Error.php';
            return new Asa_Service_Amazon_Error($errors, $asin);

        } else {

            $items = $xpath->query('//az:Items/az:Item');

            if ($items->length == 1) {
                /**
                 * @see AsaZend_Service_Amazon_Item
                 */
                require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Item.php';
                return new AsaZend_Service_Amazon_Item($items->item(0), $xml_response);
            }

            /**
             * @see AsaZend_Service_Amazon_ResultSet
             */
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/ResultSet.php';
            return new AsaZend_Service_Amazon_ResultSet($dom);
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see Asa_Service_Amazon_Interface::itemSearch()
     */
    public function itemSearch(array $options)
    {
        if (empty($options) || !is_array($options)) {
            throw new Asa_Service_Amazon_Exception('Invalid ItemSearch options');
        }
        
        $url_params = array(
            'Operation'     => 'ItemSearch',
            'ResponseGroup' => 'Small'
        );
        
        $url_params = array_merge($url_params, $options);
        
        // get the response
        $response = $this->_request->send($url_params);

        if (!$response) {
            return false;
        }        
        
        // init and return the ZF object
        $dom = new DOMDocument();
        $dom->loadXML($response);

        /**
         * @see AsaZend_Service_Amazon_ResultSet
         */
        require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/ResultSet.php';
        return new AsaZend_Service_Amazon_ResultSet($dom);
    }    

    /**
     * (non-PHPdoc)
     * @see Asa_Service_Amazon_Interface::testConnection()
     */
    public function testConnection()
    {
        $this->itemSearch(array('SearchIndex' => 'Books', 'Keywords' => 'php'));
    }
    
    /**
     * Sets the associate tag
     * @param string $id
     */    
    public function setAssociateTag($tag)
    {
        $this->_associate_tag = $tag;
    }
    
    /**
     * Retrieves the access key id
     * @return string
     */    
    public function getAssociateTag()
    {
        return $this->_associate_tag;
    }
    
    /**
     * Sets the access key id
     * @param string $id
     */
    public function setAccessKeyId($id)
    {
        $this->_access_key_id = $id;
    }
    
    /**
     * Retrieves the access key id
     * @return string
     */
    public function getAccessKeyId()
    {
        return $this->_access_key_id;
    }
    
    /**
     * Sets the secret access key
     * @param string $secret
     */
    public function setAccessKeySecret($secret)
    {
        $this->_secret_access_key = $secret;
    }
    
    /**
     * Retrieves the secret access key
     * @return string
     */
    public function getAccessKeySecret()
    {
        return $this->_secret_access_key;
    }

    /**
     * Sets the locale
     * @param string $locale
     */
    public function setLocale($locale)
    {
        if (!in_array($locale, array_keys(self::$_endpoints))) {
            throw new Asa_Service_Amazon_Exception('Invalid locale: '. $locale);
        }
        $this->_locale = $locale;
    }

    /**
     * Retrieves the locale
     * @return string
     */
    public function getLocale()
    {
        return $this->_locale;
    }

    /**
     * Sets the api version
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->_version = $version;
    }

    /**
     * Retrieves the api version
     * @param string $version
     */
    public function getVersion()
    {
        return $this->_version;
    }
    
    /**
     * 
     * Enter description here ...
     * @return Asa_Service_Amazon_Request_Abstract
     */
    public function getRequest()
    {
        return $this->_request;
    }
    

    /**
     * Retrieves all endpoint URLs
     * @return array
     */
    public static function getEndpoints()
    {
        return self::$_endpoints;
    }

    /**
     * Retrieve the endpoint URL of the given locale
     * @return string
     */
    public function getEndpoint()
    {
        $locale = $this->getLocale();

        if (!self::isSupportedCountryCode($locale)) {
            return null;
        }

        if ($this->getConnectionType() == 'https') {
            return self::$_endpoints_ssl[$locale];
        }

        return self::$_endpoints[$locale];
    }

    /**
     * Retrieves all supported country codes
     * @return array
     */
    public static function getCountryCodes()
    {
        return array_keys(self::$_endpoints_ssl);
    }

    /**
     * @return string
     */
    public function getConnectionType()
    {
        return $this->_connection_type;
    }

    /**
     * @param string $connection_type
     */
    public function setConnectionType($connection_type)
    {
        $this->_connection_type = $connection_type;
    }

    /**
     * Checks if a country code is supported
     * @return bool
     */
    public static function isSupportedCountryCode($country_code)
    {
        return in_array($country_code, self::getCountryCodes());
    }

    public static function resetCredentials()
    {
        delete_option('_asa_amazon_api_key');
        delete_option('_asa_amazon_api_secret_key');
        delete_option('_asa_amazon_tracking_id');
        delete_option('_asa_api_connection_type');
        delete_option('_asa_pa_api_version');
        delete_option('_asa_amazon_country_code');
    }
}
