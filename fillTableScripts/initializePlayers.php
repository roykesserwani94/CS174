<?php require '../connection.php';


$ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://api.fantasydata.net/nfl/v2/JSON/Players"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Ocp-Apim-Subscription-Key: ab1a066d72384c67985686b17b7095a4',
         ));
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $array = json_decode( $output, true );
        foreach($array as $p){
          if ($p['Team'] != ''){
            $sql = "INSERT INTO players VALUES({$p['PlayerID']}, '{$p['Team']}', '{$p['FirstName']}', '{$p['LastName']}', '{$p['Position']}', '{$p['PhotoUrl']}'  );";
          }
          $playersQuery =  mysqli_query($mysqli, $sql);
         }
        // close curl resource to free up system resources 
        curl_close($ch);      

?>
