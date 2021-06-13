<?php

class CA_Assistant
{

  private function get_province_name($code)
  {
    if ($code == 'C') {
      $client_state = 'Buenos Aires';
    }
    if ($code == 'B') {
      $client_state = 'Buenos Aires';
    }
    if ($code == 'K') {
      $client_state = 'Catamarca';
    }
    if ($code == 'H') {
      $client_state = 'Chaco';
    }
    if ($code == 'U') {
      $client_state = 'Chubut';
    }
    if ($code == 'X') {
      $client_state = 'Córdoba';
    }
    if ($code == 'W') {
      $client_state = 'Corrientes';
    }
    if ($code == 'E') {
      $client_state = 'Entre Ríos';
    }
    if ($code == 'P') {
      $client_state = 'Formosa';
    }
    if ($code == 'Y') {
      $client_state = 'Jujuy';
    }
    if ($code == 'L') {
      $client_state = 'La Pampa';
    }
    if ($code == 'F') {
      $client_state = 'La Rioja';
    }
    if ($code == 'M') {
      $client_state = 'Mendoza';
    }
    if ($code == 'N') {
      $client_state = 'Misiones';
    }
    if ($code == 'Q') {
      $client_state = 'Neuquén';
    }
    if ($code == 'R') {
      $client_state = 'Rio Negro';
    }
    if ($code == 'A') {
      $client_state = 'Salta';
    }
    if ($code == 'J') {
      $client_state = 'San Juan';
    }
    if ($code == 'D') {
      $client_state = 'San Luis';
    }
    if ($code == 'Z') {
      $client_state = 'Santa Cruz';
    }
    if ($code == 'S') {
      $client_state = 'Santa Fe';
    }
    if ($code == 'G') {
      $client_state = 'Sgo. del Estero';
    }
    if ($code == 'V') {
      $client_state = 'Tierra del Fuego';
    }
    if ($code == 'T') {
      $client_state = 'Tucumán';
    }

    return $client_state;
  }
  public function get_shipping_zone($province_from_code, $province_to_code)
  {
    return array(
      'Buenos Aires' => array(
        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 3, 'Entre Ríos' => 2, 'Formosa' => 3, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 3, 'Río Negro' => 3, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),

      'Catamarca' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 3, 'Entre Ríos' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),


      'Chaco' => array(
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 3, 'Corrientes' => 2, 'Entre Ríos' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),

      'Chubut' => array(
        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 2, 'Córdoba' => 4, 'Corrientes' => 4, 'Entre Ríos' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquén' => 3, 'Río Negro' => 2, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Sgo. del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucumán' => 4
      ),


      'Córdoba' => array(
        'Buenos Aires' => 2, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 3, 'Entre Ríos' => 2, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 2, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquén' => 3, 'Río Negro' => 3, 'Salta' => 3, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),



      'Corrientes' => array(
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 3, 'Corrientes' => 2, 'Entre Ríos' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Entre Ríos' => array(
        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 2, 'Entre Ríos' => 2, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Formosa' => array(
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 3, 'Corrientes' => 2, 'Entre Ríos' => 3, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Jujuy' => array(
        'Buenos Aires' => 4, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 3, 'Corrientes' => 3, 'Entre Ríos' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 4, 'La Rioja' => 3, 'Mendoza' => 4, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),


      'La Pampa' => array(
        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 4, 'Chubut' => 3, 'Córdoba' => 2, 'Corrientes' => 4, 'Entre Ríos' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 4, 'Neuquén' => 2, 'Río Negro' => 2, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'La Rioja' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 3, 'Entre Ríos' => 3, 'Formosa' => 3, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),

      'Mendoza' => array(
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 4, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 4, 'Entre Ríos' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquén' => 3, 'Río Negro' => 4, 'Salta' => 4, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Misiones' => array(
        'Buenos Aires' => 3, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 4, 'Corrientes' => 2, 'Entre Ríos' => 3, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 2, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Neuquen' => array(
        'Buenos Aires' => 3, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 3, 'Córdoba' => 3, 'Corrientes' => 4, 'Entre Ríos' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 4, 'Mendoza' => 3, 'Misiones' => 4, 'Neuquén' => 2, 'Río Negro' => 2, 'Salta' => 4, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Sgo. del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucumán' => 4
      ),

      'Río Negro' => array(
        'Buenos Aires' => 3, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 2, 'Córdoba' => 3, 'Corrientes' => 4, 'Entre Ríos' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquén' => 2, 'Río Negro' => 2, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 3, 'Santa Cruz' => 3, 'Santa Fe' => 4, 'Sgo. del Estero' => 4,
        'Tierra del Fuego' => 3, 'Tucumán' => 4
      ),


      'Salta' => array(
        'Buenos Aires' => 4, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 3, 'Corrientes' => 3, 'Entre Ríos' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 4, 'La Rioja' => 2, 'Mendoza' => 4, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 4, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),


      'San Juan' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 4, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 4, 'Entre Ríos' => 3, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquén' => 3, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'San Luis' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 4, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 4, 'Entre Ríos' => 2, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 2, 'La Rioja' => 2, 'Mendoza' => 2, 'Misiones' => 4, 'Neuquén' => 3, 'Río Negro' => 3, 'Salta' => 4, 'San Juan' => 2, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 3,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),

      'Santa Cruz' => array(
        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 3, 'Córdoba' => 4, 'Corrientes' => 4, 'Entre Ríos' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 2, 'Santa Fe' => 4, 'Sgo. del Estero' => 4,
        'Tierra del Fuego' => 2, 'Tucumán' => 4
      ),


      'Santa Fe' => array(
        'Buenos Aires' => 2, 'Catamarca' => 3, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 2, 'Entre Ríos' => 2, 'Formosa' => 2, 'Jujuy' => 3,
        'La Pampa' => 3, 'La Rioja' => 3, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 3, 'San Juan' => 3, 'San Luis' => 2, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 3
      ),


      'Sgo. del Estero' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 2, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 2, 'Entre Ríos' => 2, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 2, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      ),

      'Tierra del Fuego' => array(
        'Buenos Aires' => 4, 'Catamarca' => 4, 'Chaco' => 4, 'Chubut' => 4, 'Córdoba' => 4, 'Corrientes' => 4, 'Entre Ríos' => 4, 'Formosa' => 4, 'Jujuy' => 4,
        'La Pampa' => 4, 'La Rioja' => 4, 'Mendoza' => 4, 'Misiones' => 4, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 4, 'San Juan' => 4, 'San Luis' => 4, 'Santa Cruz' => 2, 'Santa Fe' => 4, 'Sgo. del Estero' => 4,
        'Tierra del Fuego' => 2, 'Tucumán' => 4
      ),


      'Tucumán' => array(
        'Buenos Aires' => 3, 'Catamarca' => 2, 'Chaco' => 3, 'Chubut' => 4, 'Córdoba' => 2, 'Corrientes' => 3, 'Entre Ríos' => 3, 'Formosa' => 3, 'Jujuy' => 2,
        'La Pampa' => 3, 'La Rioja' => 2, 'Mendoza' => 3, 'Misiones' => 3, 'Neuquén' => 4, 'Río Negro' => 4, 'Salta' => 2, 'San Juan' => 3, 'San Luis' => 3, 'Santa Cruz' => 4, 'Santa Fe' => 3, 'Sgo. del Estero' => 2,
        'Tierra del Fuego' => 4, 'Tucumán' => 2
      )
    )[$this -> get_province_name($province_from_code)][$this -> get_province_name($province_to_code)];
  }
}
