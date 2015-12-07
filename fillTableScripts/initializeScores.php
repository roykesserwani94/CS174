<?php require '../connection.php';


$ch = curl_init(); 

        $info = array();


        curl_setopt($ch, CURLOPT_URL, "https://api.fantasydata.net/nfl/v2/JSON/BoxScores/2015REG/13"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Ocp-Apim-Subscription-Key: ab1a066d72384c67985686b17b7095a4',
         ));
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
        $array = json_decode( $output, true );
        foreach($array as $data){
             foreach($data['AwayDefense'] as $d){
               $info = extract2($d, $info);
              }

           if (isset($data['AwayFantasyDefense']))
            foreach($data['AwayFantasyDefense'] as $d){
               $info = extract2($d, $info);
            } 
            foreach($data['AwayKickPuntReturns'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['AwayKicking'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['AwayPassing'] as $d){
               $info = extract2($d, $info);
             }
            foreach($data['AwayPunting'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['AwayReceiving'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['AwayRushing'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomeDefense'] as $d){
               $info = extract2($d, $info);
            }

            if (isset($data['HomeFantasyDefense']))
            foreach($data['HomeFantasyDefense'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomeKickPuntReturns'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomeKicking'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomePassing'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomePunting'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomeReceiving'] as $d){
               $info = extract2($d, $info);
            }
            foreach($data['HomeRushing'] as $d){
               $info = extract2($d, $info);
            }
         }

         $sql = "INSERT INTO gamescore VALUES";

         $i = 0;
         foreach($info as $id => $row){
                $name = mysqli_real_escape_string($mysqli, $row['name']);
                $team = mysqli_real_escape_string($mysqli, $row['team']);
                $position = mysqli_real_escape_string($mysqli, $row['position']);
                $sql .= "({$id}, '{$name}', '{$team}', '{$position}', {$row['score']}),";
         }
         $sql = rtrim($sql, ",").";";
         echo $sql;
         

            
         
        // close curl resource to free up system resources 
        curl_close($ch);      


        function extract2($d, $info){
            if (is_array($d) && !empty($d)){
                if (isset($d['PlayerID'])){
                $playerId = $d['PlayerID'];
                    if (!array_key_exists($playerId, $info)){
                        if (array_key_exists('FantasyPoints', $d) && array_key_exists('Team', $d) && array_key_exists('ShortName', $d)){
                           $info[$playerId] = array("score" => $d['FantasyPoints'], "team" => $d['Team'], "name" => $d['ShortName'], "position" => $d['Position']);
                       } 
                     }
                   }
             }
            return $info;

         }
?>
