<?php
require_once 'vendor/autoload.php';

use mtgsdk\Card;
use mtgsdk\Set;
use mtgsdk\Subtype;
use PHPUnit\Framework\TestCase;
use VCR\VCR;


$name = $argv;
$pname = array_shift($name);
$name = implode(" ", $name);

//print_r($name);

$card = Card::where(['name'=>$name])->all();


$LegalStatus = $card[0]->legalities;

echo "Legal In: ";

foreach ($LegalStatus as $value) {
  $i = 0;
  if ($value['legality']== "Legal") {
    echo $value['format'] . " ";
  }
  $i++;
}
echo "\n";

 ?>
