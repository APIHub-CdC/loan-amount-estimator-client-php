<?php
namespace lae\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

use \lae\Client\ApiException;
use \lae\Client\Configuration;
use \lae\Client\Model\Error;
use \lae\Client\Interceptor\KeyHandler;
use \lae\Client\Interceptor\MiddlewareEvents;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \lae\Client\Interceptor\KeyHandler(null, null, $password);

        $events = new \lae\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));   
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $config = new \lae\Client\Configuration();
        $config->setHost('the_url');
        
        $this->apiInstance = new \lae\Client\Api\LoanAmountEstimatorApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";

    }    

    public function testGetLAEByPerson()
    {
        $request = new \lae\Client\Model\PeticionPersona();
        $persona = new \lae\Client\Model\Persona();
        $domicilio = new \lae\Client\Model\DomicilioPeticion();        
        $estado = new \lae\Client\Model\CatalogoEstados();
        $segmento = new \lae\Client\Model\CatalogoSegmento();
    
        $domicilio->setDireccion("INSURGENTES SUR 1007");
        $domicilio->setColoniaPoblacion("INSURGENTES SUR");
        $domicilio->setDelegacionMunicipio("CIUDAD DE MEXICO");
        $domicilio->setCiudad("CIUDAD DE MEXICO");
        $domicilio->setEstado($estado::DF);
        $domicilio->setCP(null);

        $persona->setPrimerNombre("JUAN");
        $persona->setApellidoPaterno("PRUEBA");
        $persona->setApellidoMaterno("CUATRO");
        $persona->setFechaNacimiento("1980-01-04");
        $persona->setRFC("PUAC800107");
        $persona->setDomicilio($domicilio);
         
        $request->setFolioOtorgante("121212");
        $request->setSegmento($segmento::PP);
        $request->setPersona($persona);

        try {
            $result = $this->apiInstance->getLAEByPerson($this->x_api_key, $this->username, $this->password, $request);
            $this->assertTrue($result!==null);
            if($result!==null){
                print_r("getLAEByPerson");
                print_r($result);
            }
        } catch (Exception $e) {
            echo 'Exception when calling LAE->getLAEByPerson: ', $e->getMessage(), PHP_EOL;
        }
    }
    
    public function testGetLAEByFolioConsulta()
    {
        $request = new \lae\Client\Model\PeticionFolioConsulta();
        $segmento = new \lae\Client\Model\CatalogoSegmento();

        $request->setFolioOtorgante("121212");
        $request->setSegmento($segmento::PP);
        $request->setFolioConsulta("387337601");
        
        try {
            $result = $this->apiInstance->getLAEByFolioConsulta($this->x_api_key, $this->username, $this->password, $request);
            $this->assertTrue($result!==null);
            if($result!==null){
                print_r("getLAEByFolioConsulta");
                print_r($result);
            }
        } catch (Exception $e) {
            echo 'Exception when calling LAE->getLAEByFolioConsulta: ', $e->getMessage(), PHP_EOL;
        }
    }
}
