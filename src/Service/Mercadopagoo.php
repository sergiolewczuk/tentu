<?php

namespace App\Service;

//require __DIR__ .  '/vendor/autoload.php';
//require '/Library/WebServer/Documents/tentu/vendor/autoload.php';

use MercadoPago;
use App\Entity\Plan;

class Mercadopagoo 
{

    private $planes; 
	private $preferencias;

	public function __construct() {
		//$this->planes = array();
		MercadoPago\SDK::setAccessToken('TEST-6028382135559661-030418-26b9eeb4e4b2044b724cc9b6015f9045__LB_LA__-132984647'); 
		//MercadoPago\SDK::setAccessToken('APP_USR-4718679450429490-071415-13f4ee7f0dc007aad92d5f3239a1a959-206567402');
		//$this->setupProductos();
		$this->preferencias = array();
		//$this->newPreferencias();
	}

    public function setupProductos()
	{
		$planBase = new MercadoPago\Item();
		$planBase->title = 'Mi producto';
		$planBase->quantity = 1;
		$planBase->unit_price = 75.56;

        $this->setupPreferencias($planBase);
		//array_push($planes,
		//	array("nombrePlan" => "plan base", "datosPlan" => $planBase) // Agregar un object nuevo correspondiente a cada plan
		//);
	}

    public function setupPreferencias($planBase){

        $this->preferencias = new MercadoPago\Preference();

        $this->preferencias->items = array($planBase);

        $this->preferencias->save();

	}

	public function newPreferencias($planes){

		foreach($planes as $plan){

			$preferencia = new MercadoPago\Preference();

			$preferencia->items = array($this->newItem($plan));

			$preferencia->save();

			array_push($this->preferencias, $preferencia);
		}
	}

	public function newPreferencia($plan){

		

			$preferencia = new MercadoPago\Preference();

			$preferencia->items = array($this->newItem($plan));

			$preferencia->save();

			array_push($this->preferencias, $preferencia);
		
	}

	public function newItem($plan){

		$planNuevo = new MercadoPago\Item();

		$planNuevo->title = $plan->getNombre();
		$planNuevo->quantity = 1;
		$planNuevo->unit_price = $plan->getValor();

		return $planNuevo;
	}
	
	public function getPreferencias(){

		return $this->preferencias;

	}

}