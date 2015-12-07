<? session_start();
  require 'connection.php';


if (isset($_GET['load_leagues'])){ //ajax call that returns html for leagues
  $html = "";
  $query = "SELECT * FROM leagues";
  $result = mysqli_query($mysqli, $query) or die(mysql_error());
  while($row = mysqli_fetch_array($result)){
    $html .= '<div class="video-item-box" style="margin-top:15px;border-radius:5px;height:45px;width:665px;background-color:#171717;"> <a href="#" class="left"></a>';
    $html .= '<div class="contest" style="width:290px;padding-top:10px;float:left;height:40px;">';
    $html .= "<p style='text-align:left;'>{$row['title']}</p>";
    $html .= '<a href="draft.php" class="left">Join Now</a>';
    $html .= '</div>';
    $html .= '<div class="entries">
                <label>2/10</label>
              </div>';
   $html .= "<div class='entry-fee'>
              <label>$".$row['fee']."</label>
            </div>";
   $html .= "<div class='total-prizes'>
              <label>$".$row['prize']."</label>
            </div>";
   $html .= "<div class='live-in'>
              <label>{$row['date']}</label>
            </div>
          </div>";
   $html .= "</div>";

      }
    echo $html;
  }










?>
