<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sideboard - A Searchable Card Database</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <header>
    <div>
       <div class="container">
          <nav class="navbar navbar-inverse ">

               <ul class="nav navbar-nav">
               <p class="navbar-text">Welcome to <strong>The Sideboard</strong> - A Searchable Card Database</p>
                  <li><a href="addCard.php">Add Cards</a></li>
                  <li><a href="#">Decks</a></li>
                </ul>
          </nav>
       </div>
    </div>
  </header>
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
            </table>
          </div>
        </div>
  <?php

  require_once 'vendor/autoload.php';

  use mtgsdk\Card;
  use mtgsdk\Set;
  use mtgsdk\Subtype;
  use PHPUnit\Framework\TestCase;
  use VCR\VCR;

  $servername = "localhost";
  $username = "MTGUser";
  $password = "BlackLotus";
  $dbname = "MTGData";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


  $cardident=$_POST["cardId"];
  $amount=$_POST["amount"];

  $card = Card::find($cardident);

  $cardName = $conn->real_escape_string($card->name);
  $cardType = $card->type;
  $cardSet = $card->setName;
  $cardRare = $card->rarity;
  $cardCMC = $card->cmc;
  $cardImg = $card->imageUrl;

  try{
    $cardMana = $card->manaCost;
  }
  catch(Exception $e){
    $cardMana = "{0}";
  }
  try{
    $cardColor = implode(" ", $card->colors);
  }
  catch(Exception $e){
    $cardColor = "None";
  }
  try{
      $cardText = $conn->real_escape_string($card->text);
  }
  catch(Exception $e){
    $cardText = " ";
  }
  try{
    $cardFlavor = $conn->real_escape_string($card->flavor);
  }
  catch(Exception $e){
    $cardFlavor = " ";
  };
  try{
    $cardPower = $card->power;
  }
  catch(Exception $e){
    $cardPower = null;
  };
  try{
    $cardToughness =$card->toughness;
  }
  catch(Exception $e){
    $cardToughness = null;
  };

  $sql = "SELECT * FROM `testCards` WHERE CardId = '$cardident'";
  $result = $conn->query($sql);
  $cardData = $result->fetch_array();
  $oldAmount = $cardData["CardAmount"];
  echo $oldAmount;
  $newAmount = $oldAmount + 1;
  echo $newAmount;

    if ($result->num_rows > 0) {
      $sql = "UPDATE testCards SET CardAmount = $newAmount WHERE CardId = '$cardident'";
      if ($conn->query($sql) === TRUE) {
        echo "Card Successfully added";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    else{
      $sql = "INSERT INTO testCards (CardName, CardId, ManaCost, CMC, CardColor, CardType, CardSet, CardText, CardFlavor,	CardPower, CardToughness, CardImg, CardAmount, CardRarity) ";
      $sql .="VALUES ('". $cardName ."', '". $cardident ."', '". $cardMana ."', '". $cardCMC ."', '". $cardColor ."', '". $cardType ."', '". $cardSet ."', '". $cardText ."', '". $cardFlavor ."', '". $cardPower ."', '".
      $cardToughness ."', '". $cardImg ."', '". $amount ."', '". $cardRare ."')";

      if ($conn->query($sql) === TRUE) {
        echo "Card Successfully added";
      }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

$conn->close();

  ?>
      </div>
    </div>
  </div>
</body>
