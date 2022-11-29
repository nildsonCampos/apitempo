<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Celke</title>
    </head>
    <body>
        <?php
        $url = "https://api.hgbrasil.com/weather?woeid=457499";
        $previsao = json_decode(file_get_contents($url));
        //echo var_dump($previsao);
        $resultado = $previsao->results;
        //echo "<br>".var_dump($resultado)."</br>";

        

        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        
        echo "<div class='col-sm-2' style='background-color:white;margin-top:100px;'>";
        echo "<div class='imagem-temp' style='margin-left: 85px; margin-top: 40px'>"."<img src='icones/chuva.png' style='width:160px'>"."</div>";
        echo "</div>";
        
        echo "<div class='col-sm-4' style='background-color:white;margin-top:100px'>";
        echo "<div class='cidade' style='font-size: 64px;margin-left: 45px'>".$resultado->city_name."</div>";
        echo "<div class='temperatura' style='font-size: 94px; margin-left: 45px'>".$resultado->temp."º C"."</br>"."</div>";
        echo "</div>";

        echo "<div class='col-sm-6' style='background-color:white;margin-top:100px'>";
        echo "<div class='descricao' style='font-size: 64px;margin-left: 15px'>".$resultado->description."</div>";
        echo "<div class='volume' style='font-size: 34px;margin-left: 15px'>"."Volume de chuvas: ".$resultado->rain." mm"."</br>"."</div>";
        echo "</div>";
        
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-sm-12' style='background-color:white;'>";
        echo "<div class='horas' style='font-size: 104px;margin-left: 1455px; margin-top: 50px'>". $resultado->time."</div>";
        echo "<br>".$resultado->date;
        echo "</div>";
        
        echo "</div>";
        echo "</div>";


        echo "<ul class='lista_2'>";
        echo "<li>".$resultado->description."</li>";
        echo "<li>".$resultado->temp."º C"."</li>";
        echo "<li>"."Coca Cola"."</li>";
        echo "</ul>";

        echo "<br>".$resultado->city_name."</br>";
        echo "<br>".$resultado->description."</br>";
        if ($resultado->description == "Chuva"){
            echo "🌧";
        }
        echo "<br>".$resultado->date."</br>";
        echo "<br>".$resultado->time."</br>";
        
        echo "<br>".$resultado->temp."</br>";
        echo "<hr>";



        $dias = $resultado->forecast;

        //echo var_dump($dias);



        foreach($dias as $tempo){
            echo "<br>"."Data: ".$tempo->date."</br>";
            echo "<br>"."Dia da Semana: ".$tempo->weekday."</br>";
            echo "<br>"."Máxima: ".$tempo->max."</br>";
            echo "<br>"."Mínima: ".$tempo->min."</br>";
            echo "<br>"."Probabilidade de chuva: ".$tempo->rain_probability."%"."<br>";
            echo "<br>"."Descrição: ".$tempo->description."</br>";
            echo "<hr>";
        }
      
        ?>
    </body>
</html>

