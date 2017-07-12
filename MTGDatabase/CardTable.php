<?php
  $OffSet = 0;
  $Limit = 100;

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

  $sql = "SELECT 	id, CardName, CardId,	ManaCost,	CMC, CardColor,	CardType, CardSet, CardText, CardFlavor,	CardPower, CardToughness, CardImg, CardAmount, CardRarity FROM testCards LIMIT $OffSet, $Limit";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>". $row["CardName"] ."</td>
                  <td>". $row["CardType"] ."-". $row["CardPower"] ."/". $row["CardToughness"] ."</td>
                  <td>". $row["CardColor"] ."</td>
                  <td>". $row["ManaCost"] ."</td>
                  <td>". $row["CardRarity"] ."</td>
                  <td>". $row["CardSet"] ."</td>
                  <td>". $row["CardAmount"] ."</td>
                </tr>";
      }
    } else {

        echo "<tr>
                </td>
                  <h3>No Cards Found</h3>
                </td>
              </tr>";
    }
    $conn->close();
 ?>
