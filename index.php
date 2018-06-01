<!doctype html>
<html dir="ltr" lang="ru-RU">
    <head>
        <title>Заголовок сайта</title>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script>
            $( function() {
            $( "#datepicker" ).datepicker();
            } );
            </script>

        <script>
            $( function() {
            $( "#slider" ).slider({
            orientation: "horizontal",
            range: "min",
            min: 1000,
            max: 3000000,
            value: 60,
            step:500,
            slide: function( event, ui ) {
            $( "#amount" ).val( ui.value );
            }
            });
            $( "#amount" ).val( $( "#slider" ).slider( "value" ) );
            } );
        </script>
  
        <script>
            $( function() {
            $( "#slider2" ).slider({
            orientation: "horizontal",
            range: "min",
            min: 1000,
            max: 3000000,
            value: 60,
            step:500,
            slide: function( event, ui ) {
            $( "#amount2" ).val( ui.value );
            }
            });
            $( "#amount2" ).val( $( "#slider2" ).slider( "value" ) );
            } );
        </script>
  
   </head>

   <body leftmargin="10" topmargin="10" rightmargin="10">
	    <div class="header1"><a href="index.php"><img src="logo1.jpg" align="left" hspace="10" vspace="10"/></a>
	    <img src="logo2.png" align="right" hspace="10" vspace="10"/> </div>
        <table class="menu" border="0" padding="0"
         style="background-color:#252525; color:white" width="1024" height="46">
        
        <tr>
        <td align="middle" class="menu">Кредитные карты</td>
        <td align="middle" class="menu">Вклады</td>
        <td align="middle" class="menu">Дебетовая карта</td>
        <td align="middle" class="menu">Страхование</td>
        <td align="middle" class="menu">Друзья</td>
        <td align="middle" id="last">Интернет-банк</td>
        </tr>
        </table> 
        
        <br>

        <div class="calc">
        <h1><span style='padding-left:50px;'></span>Калькулятор</h1>
        <form name="f1" method="post" action="index.php">
        <input name="link" type="hidden" value="index.php" />
         <table border="0">
           <tr>
            <td align="right">Дата оформления вклада</td>
            <td><input name="date" type="text" id="datepicker" size="9" maxlength="10" value="" required  pattern="\d{2,2}\/\d{2,2}\/\d{4,4}"/></td>
           </tr>
           <tr>
            <td align="right">Сумма вклада</td>
            <td><input name="sum" type="number" id="amount"  size="6" maxlength="7" value="" min="1000" max="3000000";/>
            <td><div id="slider" style="width:200px; height:5px; left:10px;" ><p  align="right" style="font-size:10px";>1 000 - 3 000 000 руб.</p></div></td></td>
          </tr>
          <tr>
            <td align="right">Срок вклада</td>
            <td><select name="menu" size="1">
        <option selected="selected" value="12">1 год</option>
        <option value="24">2 года</option>
        <option value="36">3 года</option>
        <option value="48">4 года</option>
        <option value="60">5 лет</option>
        </select></td>
          </tr>
          <tr>
            <td align="right">Пополнение вклада</td>
            <td><input type="radio" name="ans" value="No"  checked="checked"/> Нет
        <input type="radio" name="ans" value="Yes" /> Да</td>
          </tr>
          <tr>
            <td align="right">Сумма пополнения вклада</td>
            <td><input name="sump" type="number" id="amount2" size="6" maxlength="7" value="" min="1000" max="3000000";/></td>
            <td><div id="slider2" style="width:200px; height:5px; left:10px;" ><p  align="right" style="font-size:10px";>1 000 - 3 000 000 руб.</p></div></td>
          </tr>
         </table>
        <br />
        <br />
        <span style='padding-left:50px;'></span> <input type="submit" name="formula" value="Рассчитать" />
        
        
        <div style="font-family:'Calibri'; display:inline-block;">
        <?php
        $date = htmlspecialchars($_POST["date"]);
        $sum = htmlspecialchars($_POST["sum"]);
        $menu = htmlspecialchars($_POST["menu"]);
        $ans = htmlspecialchars($_POST["ans"]);
        $sump = htmlspecialchars($_POST["sump"]);
         if (isset($_POST["date"]))
         {
        if ($_POST['ans'] == "No")
        {
            for($d=1; $d <= $_POST["menu"]; $d++)
               { $sum = $sum-1 + ( $sum-1 ) * date("t", strtotime($_POST["date"])) * (0.1/365)."<br />";
               }
               $nombre_format_francais = number_format($sum, 2, '.', ' ');
        echo "&nbsp; Результат:&nbsp;" . $nombre_format_francais . "&nbsp;руб."; 
        }
            else
            {
                for($d=1; $d <= $_POST["menu"]; $d++)
               { $sum = $sum-1 + ( $sum-1 + $sump) * date("t", strtotime($_POST["date"])) * (0.1/365)."<br />";
               }
               $nombre_format_francais = number_format($sum, 2, '.', ' ');
        echo "&nbsp; Результат:&nbsp;" . $nombre_format_francais . "&nbsp;руб.";
        }
         }
         else
         {
         }
        ?>
        </div>
        
        </form>
        </div>
        

        <div id="footer">
           <li><ins>Кредитные карты</ins></li>
           <li><ins>Вклады</ins></li>
           <li><ins>Дебетовая карта</ins></li>
           <li><ins>Страхование</ins></li>
           <li><ins>Друзья</ins></li>
           <li><ins>Интернет-банк</ins></li>
        </div>


   </body>

</html>
