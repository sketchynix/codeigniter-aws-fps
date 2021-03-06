<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_FPS
 *  @copyright   Copyright 2008-2010 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2008-09-17
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon FPS PHP5 Library
 *  Generated: Wed Sep 23 03:35:04 PDT 2009
 * 
 */

/**
 *  @see Amazon_FPS_Model
 */
require_once ('Amazon/FPS/Model.php');  

    

/**
 * Amazon_FPS_Model_GetAccountBalanceResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>GetAccountBalanceResult: Amazon_FPS_Model_GetAccountBalanceResult</li>
 * <li>ResponseMetadata: Amazon_FPS_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class Amazon_FPS_Model_GetAccountBalanceResponse extends Amazon_FPS_Model
{


    /**
     * Construct new Amazon_FPS_Model_GetAccountBalanceResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>GetAccountBalanceResult: Amazon_FPS_Model_GetAccountBalanceResult</li>
     * <li>ResponseMetadata: Amazon_FPS_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'GetAccountBalanceResult' => array('FieldValue' => null, 'FieldType' => 'Amazon_FPS_Model_GetAccountBalanceResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'Amazon_FPS_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct Amazon_FPS_Model_GetAccountBalanceResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return Amazon_FPS_Model_GetAccountBalanceResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://fps.amazonaws.com/doc/2008-09-17/');
        $response = $xpath->query('//a:GetAccountBalanceResponse');
        if ($response->length == 1) {
            return new Amazon_FPS_Model_GetAccountBalanceResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct Amazon_FPS_Model_GetAccountBalanceResponse from provided XML. 
                                  Make sure that GetAccountBalanceResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the GetAccountBalanceResult.
     * 
     * @return GetAccountBalanceResult GetAccountBalanceResult
     */
    public function getGetAccountBalanceResult() 
    {
        return $this->_fields['GetAccountBalanceResult']['FieldValue'];
    }

    /**
     * Sets the value of the GetAccountBalanceResult.
     * 
     * @param GetAccountBalanceResult GetAccountBalanceResult
     * @return void
     */
    public function setGetAccountBalanceResult($value) 
    {
        $this->_fields['GetAccountBalanceResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the GetAccountBalanceResult  and returns this instance
     * 
     * @param GetAccountBalanceResult $value GetAccountBalanceResult
     * @return Amazon_FPS_Model_GetAccountBalanceResponse instance
     */
    public function withGetAccountBalanceResult($value)
    {
        $this->setGetAccountBalanceResult($value);
        return $this;
    }


    /**
     * Checks if GetAccountBalanceResult  is set
     * 
     * @return bool true if GetAccountBalanceResult property is set
     */
    public function isSetGetAccountBalanceResult()
    {
        return !is_null($this->_fields['GetAccountBalanceResult']['FieldValue']);

    }

    /**
     * Gets the value of the ResponseMetadata.
     * 
     * @return ResponseMetadata ResponseMetadata
     */
    public function getResponseMetadata() 
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseMetadata.
     * 
     * @param ResponseMetadata ResponseMetadata
     * @return void
     */
    public function setResponseMetadata($value) 
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ResponseMetadata  and returns this instance
     * 
     * @param ResponseMetadata $value ResponseMetadata
     * @return Amazon_FPS_Model_GetAccountBalanceResponse instance
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }


    /**
     * Checks if ResponseMetadata  is set
     * 
     * @return bool true if ResponseMetadata property is set
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<GetAccountBalanceResponse xmlns=\"http://fps.amazonaws.com/doc/2008-09-17/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</GetAccountBalanceResponse>";
        return $xml;
    }

}