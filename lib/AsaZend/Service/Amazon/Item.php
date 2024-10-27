<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    AsaZend_Service
 * @subpackage Amazon
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Item.php 21883 2010-04-16 14:57:07Z dragonbe $
 */

require_once ASA_LIB_DIR . 'Asa/Service/Amazon/Item.php';

/**
 * @category   Zend
 * @package    AsaZend_Service
 * @subpackage Amazon
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class AsaZend_Service_Amazon_Item extends Asa_Service_Amazon_Item
{
    /**
     * @var string
     */
    public $ASIN;

    /**
     * @var string
     */
    public $DetailPageURL;

    /**
     * @var int
     */
    public $SalesRank;

    /**
     * @var int
     */
    public $TotalReviews;

    /**
     * @var int
     */
    public $AverageRating;

    /**
     * @var string
     */
    public $SmallImage;

    /**
     * @var string
     */
    public $MediumImage;

    /**
     * @var string
     */
    public $LargeImage;

    /**
     * @var string
     */
    public $Subjects;

    /**
     * @var string
     */
    public $Features;

    /**
     * @var AsaZend_Service_Amazon_OfferSet
     */
    public $Offers;

    /**
     * @var AsaZend_Service_Amazon_CustomerReview[]
     */
    public $CustomerReviews = array();
    
    /**
     * @var AsaZend_Service_Amazon_EditorialReview[]
     */
    public $EditorialReviews = array();

    /**
     * @var AsaZend_Service_Amazon_SimilarProducts[]
     */
    public $SimilarProducts = array();

    /**
     * @var AsaZend_Service_Amazon_Accessories[]
     */
    public $Accessories = array();

    /**
     * @var array
     */
    public $Tracks = array();

    /**
     * @var AsaZend_Service_Amazon_ListmaniaLists[]
     */
    public $ListmaniaLists = array();
    
    protected $_dom;
    protected $_xpath;
    protected $_xml;


    /**
     * Parse the given <Item> element
     *
     * @param  null|DOMElement $dom
     * @return void
     * @throws    AsaZend_Service_Amazon_Exception
     *
     * @group ZF-9547
     */
    public function __construct($dom, $xml_response)
    {
        if (null === $dom) {
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Exception.php';
            throw new AsaZend_Service_Amazon_Exception('Item element is empty');
        }
        if (!$dom instanceof DOMElement) {
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Exception.php';
            throw new AsaZend_Service_Amazon_Exception('Item is not a valid DOM element');
        }

        $this->_xml = str_replace('xmlns=', 'ns=', $xml_response);

        $xpath = new DOMXPath($dom->ownerDocument);
//        $xpath->registerNamespace('az', 'http://webservices.amazon.com/AWSECommerceService/'. AsaZend_Service_Amazon::$api_version);
        $xpath->registerNamespace('az', 'http://webservices.amazon.com/AWSECommerceService/'. Asa_Service_Amazon::$api_version);
        $this->_xpath = $xpath;
        $this->_dom   = $dom;

        $this->ASIN = $xpath->query('./az:ASIN/text()', $dom)->item(0)->data;

        $result = $xpath->query('./az:DetailPageURL/text()', $dom);
        if ($result->length == 1) {
            $this->DetailPageURL = $result->item(0)->data;
        }

        if ($xpath->query('./az:ItemAttributes/az:ListPrice', $dom)->length >= 1) {
            $this->CurrencyCode = (string) $xpath->query('./az:ItemAttributes/az:ListPrice/az:CurrencyCode/text()', $dom)->item(0)->data;
            $this->Amount = (int) $xpath->query('./az:ItemAttributes/az:ListPrice/az:Amount/text()', $dom)->item(0)->data;
            $this->FormattedPrice = (string) $xpath->query('./az:ItemAttributes/az:ListPrice/az:FormattedPrice/text()', $dom)->item(0)->data;
            $this->ListPriceFormatted = (string) $xpath->query('./az:ItemAttributes/az:ListPrice/az:FormattedPrice/text()', $dom)->item(0)->data;
        }

        $result = $xpath->query('./az:ItemAttributes/az:*/text()', $dom);

        if ($result->length >= 1) {
            foreach ($result as $v) {

                if (isset($this->{$v->parentNode->tagName})) {
                    if (is_array($this->{$v->parentNode->tagName})) {
                        array_push($this->{$v->parentNode->tagName}, (string) $v->data);
                    } else {
                        $this->{$v->parentNode->tagName} = array($this->{$v->parentNode->tagName}, (string) $v->data);
                    }
                } else {
                    if (is_array($v->data)) {
                        $this->{$v->parentNode->tagName} = $this->_getResultArrayList($v->data);
                    } else {
                        $this->{$v->parentNode->tagName} = (string)$v->data;
                    }
                }
            }
        }

        $result = $xpath->query('./az:ItemAttributes/az:Feature', $dom);

        if ($result->length >= 1) {
            $features = array();
            foreach ($result as $v) {
                if(isset($v->nodeValue) && !empty($v->nodeValue)) {
                    array_push($features, (string)$v->nodeValue);
                }
            }
            $this->Features = $this->_getResultArrayList($features);
        }

        $smallImage = $xpath->query('./az:SmallImage', $dom);
        if ($smallImage->length >= 1) {
            $this->SmallImage = new AsaZend_Service_Amazon_Image($smallImage->item(0));
        }

        $mediumImage = $xpath->query('./az:MediumImage', $dom);
        if ($mediumImage->length >= 1) {
            $this->MediumImage = new AsaZend_Service_Amazon_Image($mediumImage->item(0));
        }

        $largeImage = $xpath->query('./az:LargeImage', $dom);
        if ($largeImage->length >= 1) {
            $this->LargeImage = new AsaZend_Service_Amazon_Image($largeImage->item(0));
        }

        foreach (array('SmallImage', 'MediumImage', 'LargeImage') as $im) {
            if ($this->$im !== null) {
                continue;
            }
            $result = $xpath->query("./az:ImageSets/az:ImageSet[position() = 1]/az:$im", $dom);

            if ($result->length == 1) {
                /**
                 * @see AsaZend_Service_Amazon_Image
                 */
                require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Image.php';
                $this->$im = new AsaZend_Service_Amazon_Image($result->item(0));
            }
        }

        $result = $xpath->query('./az:SalesRank/text()', $dom);
        if ($result->length == 1) {
            $this->SalesRank = (int) $result->item(0)->data;
        }

//        $result = $xpath->query('./az:CustomerReviews/az:IFrameURL', $dom);

//        if ($result->length >= 1) {
//
//            /**
//             * @see AsaZend_Service_Amazon_CustomerReview
//             */
//            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/CustomerReview.php';
//            foreach ($result as $review) {
//                $this->CustomerReviews[] = new AsaZend_Service_Amazon_CustomerReview($review);
//            }
//            $this->AverageRating = (float) $xpath->query('./az:CustomerReviews/az:AverageRating/text()', $dom)->item(0)->data;
//            $this->TotalReviews = (int) $xpath->query('./az:CustomerReviews/az:TotalReviews/text()', $dom)->item(0)->data;
//        }

        // custommization
        $result = $xpath->query('./az:CustomerReviews/az:IFrameURL/text()', $dom);
        if ($result->length == 1) {
            $this->CustomerReviewsIFrameURL = $result->item(0)->data;
        }

        $result = $xpath->query('./az:EditorialReviews/az:*', $dom);

        if ($result->length >= 1) {
            /**
             * @see AsaZend_Service_Amazon_EditorialReview
             */

            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/EditorialReview.php';
            foreach ($result as $r) {
                $this->EditorialReviews[] = new AsaZend_Service_Amazon_EditorialReview($r);
            }
        }

        $result = $xpath->query('./az:SimilarProducts/az:*', $dom);
        if ($result->length >= 1) {
            /**
             * @see AsaZend_Service_Amazon_SimilarProduct
             */
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/SimilarProduct.php';
            foreach ($result as $r) {
                $this->SimilarProducts[] = new AsaZend_Service_Amazon_SimilarProduct($r);
            }
        }

        $result = $xpath->query('./az:ListmaniaLists/*', $dom);
        if ($result->length >= 1) {
            /**
             * @see AsaZend_Service_Amazon_ListmaniaList
             */
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/ListmaniaList.php';
            foreach ($result as $r) {
                $this->ListmaniaLists[] = new AsaZend_Service_Amazon_ListmaniaList($r);
            }
        }

        $result = $xpath->query('./az:Tracks/az:Disc', $dom);
        if ($result->length > 1) {
            foreach ($result as $disk) {
                foreach ($xpath->query('./*/text()', $disk) as $t) {
                    // TODO: For consistency in a bugfix all tracks are appended to one single array
                    // Erroreous line: $this->Tracks[$disk->getAttribute('number')] = (string) $t->data;
                    $this->Tracks[] = (string) $t->data;
                }
            }
        } else if ($result->length == 1) {
            foreach ($xpath->query('./*/text()', $result->item(0)) as $t) {
                $this->Tracks[] = (string) $t->data;
            }
        }

        $result = $xpath->query('./az:Offers', $dom);
        $resultSummary = $xpath->query('./az:OfferSummary', $dom);
        if ($result->length > 1 || $resultSummary->length == 1) {
            /**
             * @see AsaZend_Service_Amazon_OfferSet
             */
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/OfferSet.php';
            $this->Offers = new AsaZend_Service_Amazon_OfferSet($dom);
        }

        $result = $xpath->query('./az:Accessories/*', $dom);
        if ($result->length > 1) {
            /**
             * @see AsaZend_Service_Amazon_Accessories
             */
            require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Accessories.php';
            foreach ($result as $r) {
                $this->Accessories[] = new AsaZend_Service_Amazon_Accessories($r);
            }
        }


    }

    /**
     *
     * Enter description here ...
     * @param $name
     */
    public function __get ($name)
    {
        if (in_array($name, array(
            'ASIN', 'SmallImageUrl', 'SmallImageWidth', 'SmallImageHeight',
            'MediumImageUrl', 'MediumImageWidth', 'MediumImageHeight',
            'LargeImageUrl', 'LargeImageWidth', 'LargeImageHeight', 'Label',
            'Manufacturer', 'Publisher', 'Studio', 'Title', 'AmazonUrl',
            'TotalOffers', 'LowestOfferPrice', 'LowestOfferCurrency',
            'LowestOfferFormattedPrice', 'AmazonPrice', 'AmazonCurrency',
            'AmazonAvailability', 'AmazonLogoSmallUrl', 'AmazonLogoLargeUrl',
            'DetailPageURL', 'Platform', 'ISBN', 'EAN', 'NumberOfPages',
            'ReleaseDate', 'Binding', 'Author', 'Creator', 'Edition',
            'AverageRating', 'TotalReviews', 'RatingStars', 'RatingStarsSrc',
            'Director', 'Actors', 'Actor', 'RunningTime', 'Format', 'Studio',
            'CustomRating', 'ProductDescription', 'AmazonDescription',
            'EditorialReviews', 'Artist'
        ))) {
            if (isset($this->$name)) {
                return $this->$name;
            }
        } else {

            $itemXml = new SimpleXMLElement($this->_xml);
            if (strstr($name, '->')) {
                $name = str_replace('->', '/', $name);
            }
            $result = $this->_searchValue($itemXml, $name);

            if (!empty($result)) {
                return $result;
            }

            return '';
        }

    }


    protected function _searchValue ($itemXml, $s)
    {
        switch ($s) {
            case 'Languages':
                require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Language.php';
                $resultObj = new AsaZend_Service_Amazon_Language($itemXml);
                return $resultObj->getResult();
                break;
            case 'Subtitles':
                require_once ASA_LIB_DIR . 'AsaZend/Service/Amazon/Subtitles.php';
                $resultObj = new AsaZend_Service_Amazon_Subtitles($itemXml);
                return $resultObj->getResult();
                break;
        }


        $result = $itemXml->xpath('//'.$s);

        if (count($result) == 1) {
            if (count($result[0]) > 0) {
                return $this->_showResultArray($result[0]);
            }

            return (string)$result[0];
        } else if (count($result) > 1) {
            return $this->_showResultArray($result);
        }
    }

    /**
     * @param $a
     * @return string
     */
    protected function _showResultArray ($a)
    {
        $show = '';
        foreach ($a as $k => $v) {
            if (is_string($k)) {
                $show .= $k .': ';
            }
            $show .= $v . ', ';
        }
        return substr(trim($show), 0, -1);
    }

    /**
     * @param $a
     * @return string
     */
    protected function _getResultArrayList ($a)
    {
        $show = "<ul>\n";
        foreach ($a as $value) {
            $show .= '<li>' . $value . '</li>' . "\n";
        }
        $show .= "</ul>\n";
        return $show;
    }


    /**
     * Returns the item's original XML
     * @return string
     */
    public function asXml()
    {
        return $this->_dom->ownerDocument->saveXML($this->_dom);
    }

    public function getAsin()
    {
        return $this->ASIN;
    }

    public function getDetailPageURL()
    {
        if (!empty($this->DetailPageURL)) {
            return $this->DetailPageURL;
        }
        return '';
    }

    public function getProductTypeName()
    {
        // TODO: Implement getProductTypeName() method.
    }

    public function getTitle()
    {
        if (!empty($this->Title)) {
            return $this->Title;
        }
        return '';
    }

    public function getSalesRank()
    {
        // TODO: Implement getSalesRank() method.
    }

    public function getOffersMainPrice()
    {
        return [
            'amount' => isset($this->Offers->Offers[0]->Price) ? intval($this->Offers->Offers[0]->Price) : 0,
            'currency_code' => isset($this->Offers->Offers[0]->CurrencyCode) ? $this->Offers->Offers[0]->CurrencyCode : '',
            'formatted_price' => isset($this->Offers->Offers[0]->FormattedPrice) ? $this->Offers->Offers[0]->FormattedPrice : null
        ];
    }

    public function getOffersLowestNewPrice()
    {
        return [
            'amount' => !empty($this->Offers->LowestNewPrice) ? $this->Offers->LowestNewPrice : '',
            'currency_code' => '',
            'formatted_price' => !empty($this->Offers->LowestNewPriceFormattedPrice) ? $this->Offers->LowestNewPriceFormattedPrice : ''
        ];
    }

    public function getOffersLowestUsedPrice()
    {
        return [
            'amount' => !empty($this->Offers->LowestUsedPrice) ? $this->Offers->LowestUsedPrice : '',
            'currency_code' => '',
            'formatted_price' => !empty($this->Offers->LowestUsedPriceFormattedPrice) ? $this->Offers->LowestUsedPriceFormattedPrice : ''
        ];
    }

    public function getOffersLowestCollectiblePrice()
    {
        // TODO: Implement getOffersLowestCollectiblePrice() method.
    }

    public function getOffersTotalMain()
    {
        // TODO: Implement getOffersTotalMain() method.
    }

    public function getOffersTotalNew()
    {
        return !empty($this->Offers->TotalNew) ? (int)$this->Offers->TotalNew : 0;
    }

    public function getOffersTotalUsed()
    {
        return !empty($this->Offers->TotalUsed) ? (int)$this->Offers->TotalUsed : 0;
    }

    public function getOffersTotalCollectible()
    {
        return !empty($this->Offers->TotalCollectible) ? (int)$this->Offers->TotalCollectible : 0;
    }

    public function getOffersTotalRefurbished()
    {
        return !empty($this->Offers->TotalRefurbished) ? (int)$this->Offers->TotalRefurbished : 0;
    }

    public function getOffersAmountSaved()
    {
        // TODO: Implement getOffersAmountSaved() method.
    }

    public function getOffersListPrice()
    {
        return [
            'amount' => '',
            'currency_code' => '',
            'formatted_price' => isset($this->ListPriceFormatted) ? $this->ListPriceFormatted : null
        ];
    }

    public function getOffersSalePrice()
    {
        return [
            'amount' => isset($this->Offers->SalePriceAmount) ? intval($this->Offers->SalePriceAmount) : 0,
            'currency_code' => isset($this->Offers->SalePriceCurrencyCode) ? $this->Offers->SalePriceCurrencyCode : '',
            'formatted_price' => isset($this->Offers->SalePriceFormatted) ? $this->Offers->SalePriceFormatted : null
        ];
    }

    public function getOfferPercentageSaved()
    {
        if (!empty($this->PercentageSaved)) {
            return $this->PercentageSaved;
        }
        return null;
    }

    public function getTradeInValue()
    {
        // TODO: Implement getTradeInValue() method.
    }

    /**
     * @return bool
     */
    public function getOfferIsPrime()
    {
        return !empty($this->Offers->Offers[0]->IsEligibleForSuperSaverShipping);
    }

    public function getIsAmazonFulfilled()
    {
        // TODO: Implement getIsAmazonFulfilled() method.
    }

    public function getIsFreeShippingEligible()
    {
        // TODO: Implement getIsFreeShippingEligible() method.
    }

    public function getOfferAvailabilityMessage()
    {
        return isset($this->Offers->Offers[0]->Availability) ? $this->Offers->Offers[0]->Availability : '';
    }

    public function getBrand()
    {
        return $this->Brand;
    }

    public function getBinding()
    {
        if (!empty($this->Binding)) {
            return $this->Binding;
        }
        return null;
    }

    public function getAuthor()
    {
        if (!empty($this->Author)) {
            if (is_array($this->Author)) {
                return implode(', ', $this->Author);
            }
            return $this->Author;
        }
        return null;
    }

    public function getCreator()
    {
        if (!empty($this->Creator)) {
            if (is_array($this->Creator)) {
                return implode(', ', $this->Creator);
            }
            return $this->Creator;
        }
        return null;
    }

    public function getEdition()
    {
        if (!empty($this->Edition)) {
            if (is_array($this->Edition)) {
                return implode(', ', $this->Edition);
            }
            return $this->Edition;
        }
        return null;
    }

    public function getDirector()
    {
        if (!empty($this->Director)) {
            if (is_array($this->Director)) {
                return implode(', ', $this->Director);
            }
            return $this->Director;
        }
        return null;
    }

    public function getActor()
    {
        if (!empty($this->Actor)) {
            if (is_array($this->Actor)) {
                return implode(', ', $this->Actor);
            }
            return $this->Actor;
        }
        return null;
    }

    public function getArtist()
    {
        if (!empty($this->Artist)) {
            if (is_array($this->Artist)) {
                return implode(', ', $this->Artist);
            }
            return $this->Artist;
        }
        return null;
    }

    public function getPagesCount()
    {
        if (!empty($this->NumberOfPages)) {
            return $this->NumberOfPages;
        }
        return null;
    }


    public function getManufacturer()
    {
        return $this->Manufacturer;
    }

    public function getEAN()
    {
        if (!empty($this->EAN)) {
            return $this->EAN;
        }
        return null;
    }

    public function getISBN()
    {
        if (!empty($this->ISBN)) {
            return $this->ISBN;
        }
        return null;
    }


    public function getFormat()
    {
        if (!empty($this->Format)) {
            if (is_array($this->Format)) {
                return implode(', ', $this->Format);
            }
            return $this->Format;
        }
        return null;
    }

    public function getProductGroup()
    {
        if (!empty($this->ProductGroup)) {
            return $this->ProductGroup;
        }
        return null;
    }

    public function getPublicationDate()
    {
        // TODO: Implement getPublicationDate() method.
    }

    /**
     * @return string|null
     */
    public function getReleaseDate()
    {
        if (!empty($this->ReleaseDate)) {
            return $this->ReleaseDate;
        }
        return null;
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    public function getEditorialReviews()
    {
        if (isset($this->EditorialReviews[0])) {
            return $this->EditorialReviews[0]->Content;
        }
        return '';
    }

    public function getFeatures()
    {
        if (!empty($this->Features)) {
            return $this->Features;
        }
        return null;
    }

    public function getSmallImageURL()
    {
        if ($this->SmallImage != null) {
            return $this->SmallImage->Url->getUri();
        }
        return null;
    }

    public function getSmallImageHeight()
    {
        if ($this->SmallImage != null) {
            return $this->SmallImage->Height;
        }
        return null;
    }

    public function getSmallImageWidth()
    {
        if ($this->SmallImage != null) {
            return $this->SmallImage->Width;
        }
        return null;
    }

    public function getMediumImageURL()
    {
        if ($this->MediumImage != null) {
            return $this->MediumImage->Url->getUri();
        }
        return null;
    }

    public function getMediumImageHeight()
    {
        if ($this->MediumImage != null) {
            return $this->MediumImage->Height;
        }
        return null;
    }

    public function getMediumImageWidth()
    {
        if ($this->MediumImage != null) {
            return $this->MediumImage->Width;
        }
        return null;
    }

    public function getLargeImageURL()
    {
        if ($this->LargeImage != null) {
            return $this->LargeImage->Url->getUri();
        }
        return null;
    }

    public function getLargeImageHeight()
    {
        if ($this->LargeImage != null) {
            return $this->LargeImage->Height;
        }
        return null;
    }

    public function getLargeImageWidth()
    {
        if ($this->LargeImage != null) {
            return $this->LargeImage->Width;
        }
        return null;
    }

    public function getLanguages()
    {
        return null;
    }


}
