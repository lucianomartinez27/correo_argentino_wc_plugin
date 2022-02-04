<?php

class CA_Assistant
{

  public function get_province_name($code)
  {
    if ($code == 'C') {
      return 'Capital Federal';
    }
    if ($code == 'B') {
      return 'Buenos Aires';
    }
    if ($code == 'K') {
      return 'Catamarca';
    }
    if ($code == 'H') {
      return 'Chaco';
    }
    if ($code == 'U') {
      return 'Chubut';
    }
    if ($code == 'X') {
      return 'Cordoba';
    }
    if ($code == 'W') {
      return 'Corrientes';
    }
    if ($code == 'E') {
      return 'Entre Rios';
    }
    if ($code == 'P') {
      return 'Formosa';
    }
    if ($code == 'Y') {
      return 'Jujuy';
    }
    if ($code == 'L') {
      return 'La Pampa';
    }
    if ($code == 'F') {
      return 'La Rioja';
    }
    if ($code == 'M') {
      return 'Mendoza';
    }
    if ($code == 'N') {
      return 'Misiones';
    }
    if ($code == 'Q') {
      return 'Neuquen';
    }
    if ($code == 'R') {
      return 'Rio Negro';
    }
    if ($code == 'A') {
      return 'Salta';
    }
    if ($code == 'J') {
      return 'San Juan';
    }
    if ($code == 'D') {
      return 'San Luis';
    }
    if ($code == 'Z') {
      return 'Santa Cruz';
    }
    if ($code == 'S') {
      return 'Santa Fe';
    }
    if ($code == 'G') {
      return  'Santiago del Estero';
    }
    if ($code == 'V') {
      return  'Tierra del Fuego';
    }
    if ($code == 'T') {
      return  'Tucuman';
    }
  }
  public function get_shipping_zone($province_from_code, $province_to_code)
  {
    $zone_table =  array(
      'Buenos Aires' => array(
        'Capital Federal' => 2,
        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 3, 'Entre Rios' => 2, 'Formosa' => 3, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 3, 'Rio Negro' => 3, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),

      'Catamarca' => array(
        'Capital Federal' => 3,
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 3, 'Entre Rios' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),


      'Chaco' => array(
        'Capital Federal' => 3,
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 3, 'Corrientes' => 2, 'Entre Rios' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),

      'Chubut' => array(
        'Capital Federal' => 4,
        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 2, 'Cordoba' => 4, 'Corrientes' => 4, 'Entre Rios' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquen' => 3, 'Rio Negro' => 2, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Santiago del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucuman' => 4
      ),


      'Cordoba' => array(
        'Capital Federal' => 2,
        'Buenos Aires' => 2, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 3, 'Entre Rios' => 2, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 2, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquen' => 3, 'Rio Negro' => 3, 'Salta' => 3, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),



      'Corrientes' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 3, 'Corrientes' => 2, 'Entre Rios' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Entre Rios' => array(
        'Capital Federal' => 2,

        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 2, 'Entre Rios' => 2, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Formosa' => array(
        'Capital Federal' => 3,
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 3, 'Corrientes' => 2, 'Entre Rios' => 3, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Jujuy' => array(
        'Capital Federal' => 4,

        'Buenos Aires' => 4, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 3, 'Corrientes' => 3, 'Entre Rios' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),


      'La Pampa' => array(
        'Capital Federal' => 2,

        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 4, 'Chubut' => 3, 'Cordoba' => 2, 'Corrientes' => 4, 'Entre Rios' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 4, 'Neuquen' => 2, 'Rio Negro' => 2, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'La Rioja' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 3, 'Entre Rios' => 3, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),

      'Mendoza' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 4, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 4, 'Entre Rios' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquen' => 3, 'Rio Negro' => 4, 'Salta' => 4, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Misiones' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 4, 'Corrientes' => 2, 'Entre Rios' => 3, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Neuquen' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 3, 'Cordoba' => 3, 'Corrientes' => 4, 'Entre Rios' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 4, 'Mendoza' => 3, 'Misiones' => 4, 'Neuquen' => 2, 'Rio Negro' => 2, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Santiago del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucuman' => 4
      ),

      'Rio Negro' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 2, 'Cordoba' => 3, 'Corrientes' => 4, 'Entre Rios' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquen' => 2, 'Rio Negro' => 2, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 3, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Santiago del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucuman' => 4
      ),


      'Salta' => array(
        'Capital Federal' => 4,

        'Buenos Aires' => 4, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 3, 'Corrientes' => 3, 'Entre Rios' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 4, 'La Rioja' => 2, 'Mendoza' => 4, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),


      'San Juan' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 4, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 4, 'Entre Rios' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquen' => 3, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'San Luis' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 4, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 4, 'Entre Rios' => 2, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquen' => 3, 'Rio Negro' => 3, 'Salta' => 4, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),

      'Santa Cruz' => array(
        'Capital Federal' => 4,

        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 3, 'Cordoba' => 4, 'Corrientes' => 4, 'Entre Rios' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 2, 'Santa Fe' => 4, 'Santiago del Estero' => 4,
        'Tierra del Fuego' => 2, 'Tucuman' => 4
      ),


      'Santa Fe' => array(
        'Capital Federal' => 2,

        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 2, 'Entre Rios' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 3, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 3
      ),


      'Santiago del Estero' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 2, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 2, 'Entre Rios' => 2, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      ),

      'Tierra del Fuego' => array(
        'Capital Federal' => 4,

        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 4, 'Cordoba' => 4, 'Corrientes' => 4, 'Entre Rios' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 2, 'Santa Fe' => 4, 'Santiago del Estero' => 4,
        'Tierra del Fuego' => 2, 'Tucuman' => 4
      ),


      'Tucuman' => array(
        'Capital Federal' => 3,

        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Cordoba' => 2, 'Corrientes' => 3, 'Entre Rios' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquen' => 4, 'Rio Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Santiago del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucuman' => 2
      )
    );
    return $zone_table[$this->get_province_name($province_from_code)][$this->get_province_name($province_to_code)];
  }
  public function calculate_weight($weight)
  {

    $weight = intval($weight);

    if ($weight <= 0.5) {
      return 0.5;
    }
    if ($weight <= 1) {
      return 1;
    }

    if ($weight <= 2) {
      return 2;
    }
    if ($weight <= 3) {
      return 3;
    }

    if ($weight <= 5) {
      return 5;
    }
    if ($weight <= 10) {
      return 10;
    }
    if ($weight <= 15) {
      return 15;
    }
    if ($weight <= 20) {
      return 20;
    }

    
      return 25;
    
    
  }

  public function get_prices_for_domicilio($zone_number, $weight)
  {

    $price_table  = array(
      1 => array(
        0.5 => 414.06, 1 => 486.98, 2 => 489.81, 3 => 492.56, 5 => 498.12, 10 => 547.16, 15 => 735.50,
        20 => 761.02, 25 => 807.33
      ),
      2 => array(
        0.5 => 458.53, 1 =>  535.12, 2 => 550.83, 3 => 582.07, 5 => 689.96, 10 => 780.65, 15 => 1095.12,
        20 => 1300.45, 25 => 1545.40
      ),
      3 => array(
        0.5 => 476.05, 1 => 556.42, 2 => 574.75, 3 => 626.47, 5 => 737.90, 10 => 892.95, 15 => 1178.47,
        20 => 1498.06, 25 => 1791.24
      ),
      4 => array(
        0.5 => 478.20, 1 => 560.77, 2 =>  607.70, 3 => 668.42, 5 => 814.10, 10 => 1040.22, 15 => 1449.10,
        20 => 1844.70, 25 => 2229.97
      ),


    );
    return $price_table[$zone_number][$weight];
  }

  public function get_prices_for_sucursal($zone_number, $weight)
  {

   
    $price_table  = array(
      1 => array(
        0.5 => 257.49, 1 => 261.93, 2 => 284.35, 3 => 288.07, 5 => 298.30, 10 => 370.40, 15 => 534.38,
        20 => 551.62, 25 => 635.29
      ),
      2 => array(
        0.5 => 304.30, 1 => 329.55, 2 => 387.56, 3 => 428.59, 5 => 535.57, 10 => 694.49, 15 => 942.18,
        20 => 1175.91, 25 => 1409.67
      ),

      3 => array(
        0.5 => 318.27, 1 => 345.97, 2 => 403.02, 3 => 464.15, 5 => 564.44, 10 => 743.04, 15 => 1034.68,
        20 => 1324.35, 25 => 1594.23
      ),
      4 => array(
        0.5 => 325.16, 1 => 361.43, 2 => 434.69, 3 => 508.16, 5 => 577.17, 10 => 891.99, 15 => 1266.20,
        20 => 1608.21, 25 => 1950.27
      ),

    );
    return $price_table[$zone_number][$weight];
  }


}

if (isset($_POST['province_from']) and isset($_POST['province_to'])){

$ca_assistant = new CA_Assistant;
$zone_number = $ca_assistant -> get_shipping_zone($_POST['province_from'], $_POST['province_to']);
$weight = $ca_assistant -> calculate_weight($_POST['weight']);

switch ($_POST['action']) {
  case 'domicilio':
    echo $ca_assistant -> get_prices_for_domicilio($zone_number, $weight);
    break;
  case 'sucursal':
    echo $ca_assistant -> get_prices_for_sucursal($zone_number, $weight);
  default:
    # code...
    break;
}
}