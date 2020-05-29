<?php

namespace lae\Client\Model;

use \ArrayAccess;
use \lae\Client\ObjectSerializer;

class PeticionPersona implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $laeModelName = 'PeticionPersona';
    
    protected static $laeTypes = [
        'folio_otorgante' => 'string',
        'segmento' => '\lae\Client\Model\CatalogoSegmento',
        'persona' => '\lae\Client\Model\Persona'
    ];
    
    protected static $laeFormats = [
        'folio_otorgante' => null,
        'segmento' => null,
        'persona' => null
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
        'segmento' => 'segmento',
        'persona' => 'persona'
    ];
    
    protected static $setters = [
        'folio_otorgante' => 'setFolioOtorgante',
        'segmento' => 'setSegmento',
        'persona' => 'setPersona'
    ];
    
    protected static $getters = [
        'folio_otorgante' => 'getFolioOtorgante',
        'segmento' => 'getSegmento',
        'persona' => 'getPersona'
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
        $this->container['segmento'] = isset($data['segmento']) ? $data['segmento'] : null;
        $this->container['persona'] = isset($data['persona']) ? $data['persona'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['folio_otorgante'] === null) {
            $invalidProperties[] = "'folio_otorgante' can't be null";
        }
        if ($this->container['segmento'] === null) {
            $invalidProperties[] = "'segmento' can't be null";
        }
        if ($this->container['persona'] === null) {
            $invalidProperties[] = "'persona' can't be null";
        }
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
    
    public function getSegmento()
    {
        return $this->container['segmento'];
    }
    
    public function setSegmento($segmento)
    {
        $this->container['segmento'] = $segmento;
        return $this;
    }
    
    public function getPersona()
    {
        return $this->container['persona'];
    }
    
    public function setPersona($persona)
    {
        $this->container['persona'] = $persona;
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
