<?php
/**
 * Created by PhpStorm.
 * User: bikram
 * Date: 10/16/2017
 * Time: 8:52 PM
 */
  echo "<div id='attendance_view_div' style='margin-top: -400px; background-color: #afd9ee; width: 100%;'>";
  for ($i=1;$i<=12;$i++)
  {
      if($i==1)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
            echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
                  for ($di=1;$di<=32;$di++)
                  {
                      $day_id=$i."d".$di;
                      $ap_id=$i."a".$di;
                      echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
                      echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
                  }

          echo"</div>";
      }
      else if($i==2)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==3)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==4)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==5)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==6)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==7)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==8)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==9)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==10)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else if($i==11)
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }
      else
      {
          echo"<div class='col-md-2' style=' margin-top: 25px; height: 500px; overflow: scroll'>";
          echo "<div class='col-md-12' style='border: solid black 1px;'>month:$i</div>";
          echo "<div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>Day</div>
                  <div  id='' style='float:left;background-color: #8ba8af; border: solid black 1px; width: 50%'>A/P</div>";
          for ($di=1;$di<=32;$di++)
          {
              $day_id=$i."d".$di;
              $ap_id=$i."a".$di;
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$day_id'>-</div>";
              echo "<div  style='float:left; border: solid black 1px; width: 50%;' id='$ap_id'>-</div>";
          }

          echo"</div>";

      }

  }
echo "</div>";


?>