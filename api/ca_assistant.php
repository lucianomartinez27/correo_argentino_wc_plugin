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
        0.5 => 343.97, 1 => 405.14, 2 => 407.47, 3 => 409.75, 5 => 414.40, 10 => 456.38, 15 => 590.55,
        20 => 611.10, 25 => 648.97
      ),
      2 => array(
        0.5 => 375.54, 1 => 438.26, 2 => 451.13, 3 => 476.72, 5 => 456.09, 10 => 639.34, 15 => 865.71,
        20 => 1028.94, 25 => 1221.65
      ),
      3 => array(
        0.5 => 376.33, 1 => 439.86, 2 => 454.35, 3 => 495.23, 5 => 583.32, 10 => 705.90, 15 => 900.3,
        20 => 1144.42, 25 => 1368.39
      ),
      4 => array(
        0.5 => 378.03, 1 => 443.29, 2 => 480.39, 3 => 528.39, 5 => 643.55, 10 => 822.31, 15 => 1107.03,
        20 => 1409.25, 25 => 1703.57
      ),


    );
    return $price_table[$zone_number][$weight];
  }

  public function get_prices_for_sucursal($zone_number, $weight)
  {

   
    $price_table  = array(
      1 => array(
        0.5 => 229.19, 1 => 233.14, 2 => 253.1, 3 => 256.4, 5 => 265.52, 10 => 329.68, 15 => 458.49,
        20 => 373.29, 25 => 545.07
      ),
      2 => array(
        0.5 => 268.34, 1 => 290.61, 2 => 341.78, 3 => 377.95, 5 => 472.27, 10 => 612.41, 15 => 801.17,
        20 => 999.92, 25 => 1198.70
      ),

      3 => array(
        0.5 => 273.09, 1 => 296.09, 2 => 345.79, 3 => 398.74, 5 => 484.29, 10 => 637.53, 15 => 856.87,
        20 => 1096.77, 25 => 1320.27
      ),
      4 => array(
        0.5 => 279.09, 1 => 310.13, 2 => 372.98, 3 => 436.01, 5 => 495.20, 10 => 756.33, 15 => 1049.62,
        20 => 1331.87, 25 => 1614.14
      ),

    );
    return $price_table[$zone_number][$weight];
  }


}

if (!empty($_POST) and isset($_POST['province_from']) and isset($_POST['province_to'])){

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