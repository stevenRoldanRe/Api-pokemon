<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .principal{
            
            border: solid 5px black;
            border-radius: 999px;

            width: 50%;
            margin: 0 auto;
            text-align: center;
            background-color: #f1f1f1;
            padding: 20px;
    
        }
        li{
            list-style: none;
            
           
        }
    </style>
</head>
<body>
    <div class="principal">
        
        <?php   
        //inicializa una nueva sesión cURL
        $ch = curl_init();
        //Url de la API

        $url = 'https://pokeapi.co/api/v2/pokemon/pikachu';
        //PARAMETROS necesarios para inicializar
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,True);
        //Ejecutar la petición
        $response = curl_exec($ch);
        //validacion
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "Error al conectarse a la API: $error_msg";
        }else{
            
            curl_close($ch);
            
            $pok = json_decode($response,true);
            echo "<h1>".$pok['name']."</h1>";
            echo "<img src='".$pok['sprites']['front_default']."'>";
            echo "<h2>Tipos</h2>";
            echo "<ul>";
            foreach($pok['types'] as $tipo){
                echo "<li>".$tipo['type']['name']."</li>";
            }
            echo "</ul>";
            echo "<h2>Habilidades</h2>";
            echo "<ul>";
            foreach($pok['abilities'] as $habilidad){
                echo "<li>".$habilidad['ability']['name']."</li>";
            }
            echo "</ul>";
            echo "<h2>Estadisticas</h2>";
            echo "<ul>";
            foreach($pok['stats'] as $stat){
                echo "<li>".$stat['stat']['name']." : ".$stat['base_stat']."</li>";
            }
            echo "</ul>";



        }


        ?>
    </div>

   
    
</body>
</html>