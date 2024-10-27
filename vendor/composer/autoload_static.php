<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit51a52bd1e916269a2e88f9973b7a4ab8asa1
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'A' =>
        array (
            'AsaAmazon\\ProductAdvertisingAPI\\v1\\' => 32,
            'AsaGuzzleHttp\\Psr7\\' => 19,
            'AsaGuzzleHttp\\Promise\\' => 22,
            'AsaGuzzleHttp\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'AsaGuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src',
        ),
        'AsaGuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/asaguzzlehttp/promises/src',
        ),
        'AsaGuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src',
        ),
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\' => 
        array (
            0 => ASA_LIB_DIR . '.' . '/AsaAmazon',
        ),
    );

    public static $classMap = array (
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\ApiException' => ASA_LIB_DIR . '/AsaAmazon/ApiException.php',
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\Configuration' => ASA_LIB_DIR . '/AsaAmazon/Configuration.php',
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\HeaderSelector' => ASA_LIB_DIR . '/AsaAmazon/HeaderSelector.php',
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\ObjectSerializer' => ASA_LIB_DIR . '/AsaAmazon/ObjectSerializer.php',
        'AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\api\\DefaultApi' => ASA_LIB_DIR . '/AsaAmazon/com/amazon/paapi5/v1/api/DefaultApi.php',

        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Availability" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Availability.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNode" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNode.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNodeAncestor" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNodeAncestor.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNodeChild" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNodeChild.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNodeChildren" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNodeChildren.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNodeInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNodeInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\BrowseNodesResult" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/BrowseNodesResult.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ByLineInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ByLineInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Classifications" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Classifications.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Condition" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Condition.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ContentInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ContentInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ContentRating" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ContentRating.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Contributor" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Contributor.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\DeliveryFlag" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/DeliveryFlag.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\DimensionBasedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/DimensionBasedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\DurationPrice" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/DurationPrice.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ErrorData" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ErrorData.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ExternalIds" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ExternalIds.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetBrowseNodesRequest" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetBrowseNodesRequest.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetBrowseNodesResource" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetBrowseNodesResource.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetBrowseNodesResponse" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetBrowseNodesResponse.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetItemsRequest" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetItemsRequest.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetItemsResource" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetItemsResource.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetItemsResponse" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetItemsResponse.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetVariationsRequest" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetVariationsRequest.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetVariationsResource" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetVariationsResource.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\GetVariationsResponse" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/GetVariationsResponse.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ImageSize" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ImageSize.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ImageType" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ImageType.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Images" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Images.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Item" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Item.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ItemIdType" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ItemIdType.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ItemInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ItemInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ItemsResult" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ItemsResult.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\LanguageType" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/LanguageType.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Languages" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Languages.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ManufactureInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ManufactureInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\MaxPrice" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/MaxPrice.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Merchant" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Merchant.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\MinPrice" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/MinPrice.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\MinReviewsRating" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/MinReviewsRating.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\MinSavingPercent" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/MinSavingPercent.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ModelInterface" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ModelInterface.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\MultiValuedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/MultiValuedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferAvailability" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferAvailability.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferCondition" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferCondition.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferCount" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferCount.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferDeliveryInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferDeliveryInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferListing" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferListing.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferLoyaltyPoints" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferLoyaltyPoints.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferMerchantInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferMerchantInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferPrice" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferPrice.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferProgramEligibility" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferProgramEligibility.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferPromotion" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferPromotion.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferSavings" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferSavings.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferShippingCharge" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferShippingCharge.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferSubCondition" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferSubCondition.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\OfferSummary" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/OfferSummary.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Offers" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Offers.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\PartnerType" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/PartnerType.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Price" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Price.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ProductAdvertisingAPIClientException" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ProductAdvertisingAPIClientException.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ProductAdvertisingAPIServiceException" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ProductAdvertisingAPIServiceException.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\ProductInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/ProductInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Properties" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Properties.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\Refinement" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/Refinement.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\RefinementBin" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/RefinementBin.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\RentalOfferListing" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/RentalOfferListing.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\RentalOffers" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/RentalOffers.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SearchItemsRequest" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SearchItemsRequest.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SearchItemsResource" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SearchItemsResource.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SearchItemsResponse" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SearchItemsResponse.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SearchRefinements" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SearchRefinements.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SearchResult" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SearchResult.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SignHelper" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SignHelper.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SingleBooleanValuedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SingleBooleanValuedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SingleIntegerValuedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SingleIntegerValuedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SingleStringValuedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SingleStringValuedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\SortBy" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/SortBy.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\TechnicalInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/TechnicalInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\TradeInInfo" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/TradeInInfo.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\TradeInPrice" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/TradeInPrice.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\UnitBasedAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/UnitBasedAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\VariationAttribute" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/VariationAttribute.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\VariationDimension" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/VariationDimension.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\VariationSummary" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/VariationSummary.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\VariationsResult" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/VariationsResult.php",
        "AsaAmazon\\ProductAdvertisingAPI\\v1\\com\\amazon\\paapi5\\v1\\WebsiteSalesRank" => ASA_LIB_DIR . "/AsaAmazon/com/amazon/paapi5/v1/WebsiteSalesRank.php",

        'AsaGuzzleHttp\\Client' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Client.php',
        'AsaGuzzleHttp\\ClientInterface' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/ClientInterface.php',
        'AsaGuzzleHttp\\Cookie\\CookieJar' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Cookie/CookieJar.php',
        'AsaGuzzleHttp\\Cookie\\CookieJarInterface' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Cookie/CookieJarInterface.php',
        'AsaGuzzleHttp\\Cookie\\FileCookieJar' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Cookie/FileCookieJar.php',
        'AsaGuzzleHttp\\Cookie\\SessionCookieJar' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Cookie/SessionCookieJar.php',
        'AsaGuzzleHttp\\Cookie\\SetCookie' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Cookie/SetCookie.php',
        'AsaGuzzleHttp\\Exception\\BadResponseException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/BadResponseException.php',
        'AsaGuzzleHttp\\Exception\\ClientException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/ClientException.php',
        'AsaGuzzleHttp\\Exception\\ConnectException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/ConnectException.php',
        'AsaGuzzleHttp\\Exception\\GuzzleException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/GuzzleException.php',
        'AsaGuzzleHttp\\Exception\\RequestException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/RequestException.php',
        'AsaGuzzleHttp\\Exception\\SeekException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/SeekException.php',
        'AsaGuzzleHttp\\Exception\\ServerException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/ServerException.php',
        'AsaGuzzleHttp\\Exception\\TooManyRedirectsException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/TooManyRedirectsException.php',
        'AsaGuzzleHttp\\Exception\\TransferException' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Exception/TransferException.php',
        'AsaGuzzleHttp\\HandlerStack' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/HandlerStack.php',
        'AsaGuzzleHttp\\Handler\\CurlFactory' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/CurlFactory.php',
        'AsaGuzzleHttp\\Handler\\CurlFactoryInterface' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/CurlFactoryInterface.php',
        'AsaGuzzleHttp\\Handler\\CurlHandler' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/CurlHandler.php',
        'AsaGuzzleHttp\\Handler\\CurlMultiHandler' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/CurlMultiHandler.php',
        'AsaGuzzleHttp\\Handler\\EasyHandle' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/EasyHandle.php',
        'AsaGuzzleHttp\\Handler\\MockHandler' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/MockHandler.php',
        'AsaGuzzleHttp\\Handler\\Proxy' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/Proxy.php',
        'AsaGuzzleHttp\\Handler\\StreamHandler' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Handler/StreamHandler.php',
        'AsaGuzzleHttp\\MessageFormatter' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/MessageFormatter.php',
        'AsaGuzzleHttp\\Middleware' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Middleware.php',
        'AsaGuzzleHttp\\Pool' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/Pool.php',
        'AsaGuzzleHttp\\PrepareBodyMiddleware' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/PrepareBodyMiddleware.php',
        'AsaGuzzleHttp\\Promise\\AggregateException' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/AggregateException.php',
        'AsaGuzzleHttp\\Promise\\CancellationException' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/CancellationException.php',
        'AsaGuzzleHttp\\Promise\\Coroutine' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/Coroutine.php',
        'AsaGuzzleHttp\\Promise\\EachPromise' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/EachPromise.php',
        'AsaGuzzleHttp\\Promise\\FulfilledPromise' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/FulfilledPromise.php',
        'AsaGuzzleHttp\\Promise\\Promise' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/Promise.php',
        'AsaGuzzleHttp\\Promise\\PromiseInterface' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/PromiseInterface.php',
        'AsaGuzzleHttp\\Promise\\PromisorInterface' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/PromisorInterface.php',
        'AsaGuzzleHttp\\Promise\\RejectedPromise' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/RejectedPromise.php',
        'AsaGuzzleHttp\\Promise\\RejectionException' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/RejectionException.php',
        'AsaGuzzleHttp\\Promise\\TaskQueue' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/TaskQueue.php',
        'AsaGuzzleHttp\\Promise\\TaskQueueInterface' => __DIR__ . '/..' . '/asaguzzlehttp/promises/src/TaskQueueInterface.php',
        'AsaGuzzleHttp\\Psr7\\AppendStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/AppendStream.php',
        'AsaGuzzleHttp\\Psr7\\BufferStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/BufferStream.php',
        'AsaGuzzleHttp\\Psr7\\CachingStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/CachingStream.php',
        'AsaGuzzleHttp\\Psr7\\DroppingStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/DroppingStream.php',
        'AsaGuzzleHttp\\Psr7\\FnStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/FnStream.php',
        'AsaGuzzleHttp\\Psr7\\InflateStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/InflateStream.php',
        'AsaGuzzleHttp\\Psr7\\LazyOpenStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/LazyOpenStream.php',
        'AsaGuzzleHttp\\Psr7\\LimitStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/LimitStream.php',
        'AsaGuzzleHttp\\Psr7\\MessageTrait' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/MessageTrait.php',
        'AsaGuzzleHttp\\Psr7\\MultipartStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/MultipartStream.php',
        'AsaGuzzleHttp\\Psr7\\NoSeekStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/NoSeekStream.php',
        'AsaGuzzleHttp\\Psr7\\PumpStream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/PumpStream.php',
        'AsaGuzzleHttp\\Psr7\\Request' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/Request.php',
        'AsaGuzzleHttp\\Psr7\\Response' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/Response.php',
        'AsaGuzzleHttp\\Psr7\\Rfc7230' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/Rfc7230.php',
        'AsaGuzzleHttp\\Psr7\\ServerRequest' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/ServerRequest.php',
        'AsaGuzzleHttp\\Psr7\\Stream' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/Stream.php',
        'AsaGuzzleHttp\\Psr7\\StreamDecoratorTrait' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/StreamDecoratorTrait.php',
        'AsaGuzzleHttp\\Psr7\\StreamWrapper' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/StreamWrapper.php',
        'AsaGuzzleHttp\\Psr7\\UploadedFile' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/UploadedFile.php',
        'AsaGuzzleHttp\\Psr7\\Uri' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/Uri.php',
        'AsaGuzzleHttp\\Psr7\\UriNormalizer' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/UriNormalizer.php',
        'AsaGuzzleHttp\\Psr7\\UriResolver' => __DIR__ . '/..' . '/asaguzzlehttp/psr7/src/UriResolver.php',
        'AsaGuzzleHttp\\RedirectMiddleware' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/RedirectMiddleware.php',
        'AsaGuzzleHttp\\RequestOptions' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/RequestOptions.php',
        'AsaGuzzleHttp\\RetryMiddleware' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/RetryMiddleware.php',
        'AsaGuzzleHttp\\TransferStats' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/TransferStats.php',
        'AsaGuzzleHttp\\UriTemplate' => __DIR__ . '/..' . '/asaguzzlehttp/guzzle/src/UriTemplate.php',
        'Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php',
        'Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php',
        'Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php',
        'Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php',
        'Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php',
        'Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php',
        'Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit51a52bd1e916269a2e88f9973b7a4ab8asa1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit51a52bd1e916269a2e88f9973b7a4ab8asa1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit51a52bd1e916269a2e88f9973b7a4ab8asa1::$classMap;

        }, null, ClassLoader::class);
    }
}