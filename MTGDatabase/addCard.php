<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sideboard - A Searchable Card Database</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php

  require_once 'vendor/autoload.php';

  use mtgsdk\Card;
  use mtgsdk\Set;
  use mtgsdk\Subtype;
  use PHPUnit\Framework\TestCase;
  use VCR\VCR;

  include 'header.php';
  ?>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <form action="addCard.php" method="post" class="input-group">
                <input type="text" class="form-control" placeholder="Search Name" name="name" >
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-secondary"><span class="glyphicon glyphicon-search"></span>Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div>
            <table class="table">
              <tr>
                <th>Card Name</th>
                <th>Card Type</th>
                <th>Card Color</th>
                <th>Mana Cost</th>
                <th>Card Rarity</th>
                <th>Card Set</th>
              </tr>
    <?php

    if(isset($_REQUEST['add'])){
      InsertCard();
    }
    if(isset($_POST["name"])){

        $name=$_POST["name"];

      if (!$name==""){

      $i=0;

      $card = Card::where(['name'=>$name])->all();

      while($i < sizeof($card)){
        $cardName = $card[$i]->name;
        $cardType = $card[$i]->type;
        $cardColor = "";
        $cardSet = $card[$i]->setName;
        $cardRare = $card[$i]->rarity;
        $cardId = $card[$i]->id;
        try{
          $cardMana = $card[$i]->manaCost;
        }
        catch(Exception $e){
          $cardMana = "{0}";
        }
        try{
          $cardColor = implode(" ", $card[$i]->colors);
        }
        catch(Exception $e){
          $cardColor = "No Color";
        }

        echo "<tr>
                <td>". $cardName ."</td>
                <td>". $cardType ."</td>
                <td>". $cardColor ."</td>
                <td>". $cardMana ."</td>
                <td>". $cardRare ."</td>
                <td>". $cardSet ."</td>
                <td>
                  <form method=\"post\" class=\"input-group\">
                    <input class=\"form-control\" type=\"hidden\" name=\"cardId\" value=". $cardId .">
                    <input class=\"form-control\" type=\"number\" name=\"amount\">
                    <div class=\"input-group-btn\">
                      <button type=\"submit\" name=\"add\" value=\"add\" class=\"btn btn-secondary\">Add</button>
                    </div>
                  </form
                </td>
              </tr>";
        $i++;
      }
      echo "</table>";
    }
    }
    function InsertCard(){
      echo "Success";
    }
    ?>
            </table>
        </div>
      </div>
    </div>
  </div>

  </body>
</html>
