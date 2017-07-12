<?php

require_once 'vendor/autoload.php';

use mtgsdk\Card;
use PHPUnit\Framework\TestCase;
use VCR\VCR;

$name="";

$name = $_POST["name"];

if(!$name==""){
  $i=0;

  $card = Card::where(['name'=>$name])->all();

  print_r($card);

}
?>
