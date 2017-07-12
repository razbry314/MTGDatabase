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
<?php include 'header.php'; ?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div id="CardSort" class="well">
            <div class="form-group">
              <label for="CardTypeSelect">Card Type</label>
              <select class="form-control" id="CardTypeSelect">
                <option selected>Choose...</option>
                <option>Creature</option>
                <option>Artifact</option>
                <option>Instant</option>
                <option>Sorcery</option>
                <option>Enchantment</option>
                <option>Planeswalker</option>
                <option>Land</option>
              </select>
            </div>

            <div class="form-group">
              <label>Mana Color</label>
              <div>
                <label class="form-check-label">Red</label>
                <input type="radio" class="form-check-input" name="red" id="optionsRadios1" value="red">
                <label class="form-check-label">White</label>
                <input type="radio" class="form-check-input" name="White" id="optionsRadios2" value="white">
                <label class="form-check-label">Blue</label>
                <input type="radio" class="form-check-input" name="Blue" id="optionsRadios3" value="blue">
                <br />
                <label class="form-check-label">Black</label>
                <input type="radio" class="form-check-input" name="black" id="optionsRadios4" value="black">
                <label class="form-check-label">Green</label>
                <input type="radio" class="form-check-input" name="green" id="optionsRadios5" value="green">
                <label class="form-check-label">Colorless</label>
                <input type="radio" class="form-check-input" name="multi" id="optionsRadios6" value="none">
              </div>
            </div>
            <div class="form-group">
              <label for="CardTypeSelect">Card Rarity</label>
              <select class="form-control" id="CardRareSelect">
                <option selected>Choose...</option>
                <option>Common</option>
                <option>Uncommon</option>
                <option>Rare</option>
                <option>Mythic Rare</option>
              </select>
            </div>
            <div class="form-group">
              <label for="CostInput">Card Cost</label>
              <input type="number" class="form-control" id="CostInput" aria-describedby="costHelp" placeholder="Mana Cost">
            </div>

            <div class="form-group">
              <label for="CardSetInput">Card Set</label>
              <input type="text" class="form-control" id="CardSetInput" aria-describedby="SetHelp" placeholder="Card Set">
            </div>

            <div class="form-group">
              <label for="CardBlockInput">Card Block</label>
              <input type="text" class="form-control" id="CardBlockInput" aria-describedby="BlockHelp" placeholder="Card Block">
            </div>
            <div>
              <button type="button" class="btn btn-secondary">Apply</button>
              <button type="button" class="btn btn-secondary">Clear</button>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="well">
                <form action="index.php" method="post" class="input-group">
                  <!--<label for="CardNameInput">Search By Card Name</label>-->
                  <input type="text" class="form-control" id="CardNameInput" aria-describedby="emailHelp" placeholder="Search Name">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary"><span class="glyphicon glyphicon-search"></span>Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <table class="table">
              <tr>
                <th>Card Name</th>
                <th>Card Type</th>
                <th>Card Color</th>
                <th>Mana Cost</th>
                <th>Card Rarity</th>
                <th>Card Set</th>
                <th>Amount in Inventory</th>
              </tr>
              <?php
              include 'CardTable.php';
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
