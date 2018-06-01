<?php
        $date = htmlspecialchars($_POST["date"]);
        $sum = htmlspecialchars($_POST["sum"]);
        $menu = htmlspecialchars($_POST["menu"]);
        $ans = htmlspecialchars($_POST["ans"]);
        $sump = htmlspecialchars($_POST["sump"]);
        
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
?>