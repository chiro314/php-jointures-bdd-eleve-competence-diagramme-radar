<?php
//http://localhost/exo/J08-COMPETENCE-chart-radar/Exercice-PHP-Mysql-Jointures-master/IHM/indexjoint.php

require "connexionbddjoint.php";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>JOINTURES</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/> <!--Responsive-->
    <link rel="stylesheet" href="stylejoint.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div id="container">
    <header>
        <h1 id="p-title" class="text-center py-2">ELEVES</h1>
    </header>
    <div class="row">

        <div class="col-12 col-md-2 pl-1"></div>

        <div class="col-12 col-md-8 ml-2">
            
            <ul>
                <?php 
                //afficher les éléves et les informations de l'éléve dans une seule et même requete sql :
                $sql="SELECT E.ID, E.PRENOM, E.NOM, E.LOGIN, E.PSW, EI.AGE, EI.VILLE, EI.AVATAR FROM eleves AS E LEFT OUTER JOIN eleves_informations AS EI ON E.ID = EI.ELEVES_ID";
                $result = $conn->query($sql);
                echo "<br>";
                while($row = $result-> fetch_assoc()) {
                ?>
                    <a href="<?php echo 'competencesjoint.php?ID='.$row['ID']?>">Compétences</a>

                    <img src="<?php echo $row['AVATAR'] ?>" alt=" <?php echo $row['AVATAR'] ?>">
                    
                    <?php echo " - ".$row['ID']." - ".$row['VILLE']." - ".$row['NOM']." - ".$row['PRENOM']." - ".$row['AGE']." ans - (".$row['LOGIN']." - ".$row['PSW'].")<br><br>";
                } ?>
            </ul>
        </div>
        <div class="col-12 col-md-2 pl-5"></div>
    </div>
    <footer></footer>
</div>
<script
    src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
    integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
    crossorigin="anonymous">
</script>
<!-- <script type=\"text/javascript\" src=\"scriptindexjoint.js\"></script>
-->

</body>
</html>