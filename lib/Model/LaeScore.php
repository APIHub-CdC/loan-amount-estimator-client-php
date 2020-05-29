<?php

namespace lae\Client\Model;

use \ArrayAccess;
use \lae\Client\ObjectSerializer;

class LaeScore implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $laeModelName = 'LaeScore';
    
    protected static $laeTypes = [
        'numero' => 'string',
        'valor' => 'string',
        'minimo' => 'string',
        'maximo' => 'string'
    ];
    
    protected static $laeFormats = [
        'numero' => null,
        'valor' => null,
        'minimo' => null,
        'maximo' => null
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
        'numero' => 'numero',
        'valor' => 'valor',
        'minimo' => 'minimo',
        'maximo' => 'maximo'
    ];
    
    protected static $setters = [
        'numero' => 'setNumero',
        'valor' => 'setValor',
        'minimo' => 'setMinimo',
        'maximo' => 'setMaximo'
    ];
    
    protected static $getters = [
        'numero' => 'getNumero',
        'valor' => 'getValor',
        'minimo' => 'getMinimo',
        'maximo' => 'getMaximo'
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
        $this->container['numero'] = isset($data['numero']) ? $data['numero'] : null;
        $this->container['valor'] = isset($data['valor']) ? $data['valor'] : null;
        $this->container['minimo'] = isset($data['minimo']) ? $data['minimo'] : null;
        $this->container['maximo'] = isset($data['maximo']) ? $data['maximo'] : null;
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
    
    public function getNumero()
    {
        return $this->container['numero'];
    }
    
    public function setNumero($numero)
    {
        $this->container['numero'] = $numero;
        return $this;
    }
    
    public function getValor()
    {
        return $this->container['valor'];
    }
    
    public function setValor($valor)
    {
        $this->container['valor'] = $valor;
        return $this;
    }
    
    public function getMinimo()
    {
        return $this->container['minimo'];
    }
    
    public function setMinimo($minimo)
    {
        $this->container['minimo'] = $minimo;
        return $this;
    }
    
    public function getMaximo()
    {
        return $this->container['maximo'];
    }
    
    public function setMaximo($maximo)
    {
        $this->container['maximo'] = $maximo;
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
