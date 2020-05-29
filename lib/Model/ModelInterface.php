<?php

namespace lae\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function laeTypes();
    
    public static function laeFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
