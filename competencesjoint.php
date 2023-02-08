<?php
require "connexionbddjoint.php";

$reel = array (
    'Curiosité' => 0,
    'Imagination' =>0,
    'Humour' =>0,
    'Persévérance' =>0,
    'Autonomie' =>0
);
$percu = array (
    'Curiosité' => 0,
    'Imagination' =>0,
    'Humour' =>0,
    'Persévérance' =>0,
    'Autonomie' =>0
);


?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>ELEVES-MUGS</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/> <!--Responsive-->
    <link rel="stylesheet" href="stylejoint.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div id="container">
    <header>
        <h1 id="p-title" class="text-center py-2">COMPETENCES</h1>
    </header>
    <div class="row">

        <div class="col-12 col-md-1"></div>

        <div class="col-12 col-md-6">
        <?php
        if (isset($_GET['ID'])){
            $id = $_GET['ID'];
        
            //ID eleve >> eleves (ID) / NOM PRENOM AGE AVATAR
            $sql="SELECT E.PRENOM, E.NOM, EI.AGE, EI.AVATAR FROM eleves AS E LEFT OUTER JOIN eleves_informations AS EI ON E.ID = EI.ELEVES_ID WHERE E.ID = $id";
            $result = $conn->query($sql);
            $row = $result-> fetch_assoc();
            ?>
            <img src="<?php echo $row['AVATAR'] ?>" alt=" <?php echo $row['AVATAR'] ?>">
            <?php
            echo " ".$row['NOM']." ".$row['PRENOM']." - ".$row['AGE']." ans<br><br><br>";
         
            //ID eleve >> eleves_competences (ELEVES_ID) AS EC / NIVEAU NIVEAU_AE 
            //competences (EC.COMPETENCE_ID) : TITRE DESCRIPTION

            $sql = "SELECT EC.NIVEAU, EC.NIVEAU_AE, C.TITRE FROM eleves_competences AS EC LEFT OUTER JOIN competences AS C ON C.ID = EC.COMPETENCES_ID WHERE EC.ELEVES_ID = $id";
            $result = $conn->query($sql);        

            while($row = $result-> fetch_assoc()) { ?>
                <p>
                <?php echo " ".$row['TITRE']." - Niveau réel : ".$row['NIVEAU']." / Niveau perçu : ".$row['NIVEAU_AE']; 
                majReelPercu();
                ?>
                </p>
                
            <?php
                //test ok : $test = $row['NIVEAU'];
            }
            
        }
        function majReelPercu(){
            global $row;
            global $reel;
            global $percu;
            switch ($row['TITRE']){
                case 'Curiosité' :
                    $reel['Curiosité'] = $row['NIVEAU'];
                    $percu['Curiosité'] = $row['NIVEAU_AE'];
                    break;
                case'Imagination' :
                    $reel['Imagination'] = $row['NIVEAU'];
                    $percu['Imagination'] = $row['NIVEAU_AE'];
                    break;
                case 'Humour' :
                    $reel['Humour'] = $row['NIVEAU'];
                    $percu['Humour'] = $row['NIVEAU_AE'];
                    break;
                case 'Persévérance' :
                    $reel['Persévérance'] = $row['NIVEAU'];
                    $percu['Persévérance'] = $row['NIVEAU_AE'];
                    break;
                case 'Autonomie' :
                    $reel['Autonomie'] = $row['NIVEAU'];
                    $percu['Autonomie'] = $row['NIVEAU_AE'];
                    break;
            }
        }
        ?>  
        </div>
        
        <div class="col-12 col-md-5" id="div-restit">

        <!-- Test ok :
            Ma div <br>
            <?php //echo "ID : ".$id;  ?>
            <br> Fin Ma div <br>
        -->
            
            <canvas id="myChart"></canvas>
            



        </div>
    </div>
<footer></footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
        crossorigin="anonymous">
</script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js">
</script>
-->
<script type="text/javascript" src="scriptchart.js"></script>
<script type="text/javascript">
    /* testok :
    maDiv.innerHTML+="<p>Coucou2</p>";
    maDiv.innerHTML+="<p> <?php //echo $id ?></p>";
    maDiv.innerHTML+="<p> <?php //echo $_GET['ID'] ?></p>";
    maDiv.innerHTML+="<p> <?php //echo $test ?></p>";
    */
</script>

<!-- https://www.chartjs.org/docs/latest/getting-started/ : -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>    
const ctx = document.getElementById('myChart');

new Chart(ctx, 
{
    type: 'radar',
    data: {
        labels: [
            'Curiosité',
            'Imagination',
            'Humour',
            'Persévérance',
            'Autonomie'
        ],
        datasets: [{
            label: 'Niveau réel',
            //data: [65, 59, 90, 81, 56],
            data: [<?php echo $reel['Curiosité'] ?>, <?php echo $reel['Imagination']?>, <?php echo $reel['Humour']?>, <?php echo $reel['Persévérance']?>, <?php echo $reel['Autonomie'] ?>],
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)'
            }, 
            {
            label: 'Niveau perçu',
            //data: [28, 48, 40, 19, 96],
            data: [<?php echo $percu['Curiosité'] ?>, <?php echo $percu['Imagination']?>, <?php echo $percu['Humour']?>, <?php echo $percu['Persévérance']?>, <?php echo $percu['Autonomie'] ?>],
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
            }
        ]
    },
    options: {
        elements: {
            line: {
                borderWidth: 3
            }
        }
    }
});
</script>

</body>
</html>

