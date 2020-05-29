<?php

namespace lae\Client\Model;

use \ArrayAccess;
use \lae\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $laeModelName = 'Respuesta';
    
    protected static $laeTypes = [
        'folio_otorgante' => 'string',
        'folio_consulta_lae' => 'string',
        'scores' => '\lae\Client\Model\LaeScore[]'
    ];
    
    protected static $laeFormats = [
        'folio_otorgante' => null,
        'folio_consulta_lae' => null,
        'scores' => null
    ];
    
    public static function laeTypes()
    {
        return self::$laeTypes;
    }
    
    public static function laeFormats()
    {
        return self::$laeFormats;
    }
    
    protected static $attributeMap = [
        'folio_otorgante' => 'folioOtorgante',
        'folio_consulta_lae' => 'folioConsultaLAE',
        'scores' => 'scores'
    ];
    
    protected static $setters = [
        'folio_otorgante' => 'setFolioOtorgante',
        'folio_consulta_lae' => 'setFolioConsultaLae',
        'scores' => 'setScores'
    ];
    
    protected static $getters = [
        'folio_otorgante' => 'getFolioOtorgante',
        'folio_consulta_lae' => 'getFolioConsultaLae',
        'scores' => 'getScores'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$laeModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio_otorgante'] = isset($data['folio_otorgante']) ? $data['folio_otorgante'] : null;
        $this->container['folio_consulta_lae'] = isset($data['folio_consulta_lae']) ? $data['folio_consulta_lae'] : null;
        $this->container['scores'] = isset($data['scores']) ? $data['scores'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolioOtorgante()
    {
        return $this->container['folio_otorgante'];
    }
    
    public function setFolioOtorgante($folio_otorgante)
    {
        $this->container['folio_otorgante'] = $folio_otorgante;
        return $this;
    }
    
    public function getFolioConsultaLae()
    {
        return $this->container['folio_consulta_lae'];
    }
    
    public function setFolioConsultaLae($folio_consulta_lae)
    {
        $this->container['folio_consulta_lae'] = $folio_consulta_lae;
        return $this;
    }
    
    public function getScores()
    {
        return $this->container['scores'];
    }
    
    public function setScores($scores)
    {
        $this->container['scores'] = $scores;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
