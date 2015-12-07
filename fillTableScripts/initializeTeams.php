<?php require '../connection.php';


$ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://api.fantasydata.net/nfl/v2/JSON/Teams"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Ocp-Apim-Subscription-Key: ab1a066d72384c67985686b17b7095a4',
         ));
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $array = json_decode( $output, true );
        foreach($array as $p){  
            $sql = "INSERT INTO teams VALUES({$p['TeamID']}, '{$p['Key']}', '{$p['Name']}');";
            $teamsQuery =  mysqli_query($mysqli, $sql);
         }
        // close curl resource to free up system resources 
        curl_close($ch);      

?>
