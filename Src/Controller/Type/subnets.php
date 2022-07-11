<?php
    require_once('Src/Controller/Read/Read.php');
    require_once('Src/Controller/SGBD/sgbd.php');

    // class Subnets {
    //     private $subnets_array;
    //     private $read;
    //     private $sgbd;

    //     public function __construct(SGBD $sgbd)
    //     {
    //         $this->read = new Read();
    //         $this->BuildArray();
    //         $this->sgbd = $sgbd;
    //     }

    //     public function BuildArray() {
    //         $subnets_array = $this->read->ReadTransitGateway();
    //         foreach ($subnets_array as $key => $value) {
    //             if ($key != 0 AND $key != count($subnets_array)) {
    //                 $value = $value;
    //                 $name = $value[0];
    //                 $gateway = $value[1];
    //                 $owner = $value[2];
    //                 $state = $value[3];
    //                 $this->subnets_array[] = ["name" => $name, "gateway" => $gateway, "owner" => $owner, "state" => $state];    
    //             }
    //         }
    //     }

    //     public function GetAllTransit_Gateway() {
    //         return $this->subnets_array;
    //     }

    //     public function Update_SGDB() {
    //         $transit_gateway = $this->sgbd->get('transit_gateway');
    //         if ($transit_gateway != $this->subnets_array) {
    //             echo "Une mise à jour des disponible";
    //             $this->sgbd->truncate("transit_gateway");
    //             sleep(1);
    //             foreach ($this->subnets_array as $key => $value) {
    //                 $this->sgbd->insert('transit_gateway', $value);
    //             }
    //         } else {
    //             echo "Aucune mise à jour disponible";
    //         }
    //     }
    // }