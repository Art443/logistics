<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Show Administrater</title>        
    </head>
    <body>
     
        <?php
        $link = mysql_connect("localhost", "root", "1234");
        $sql = "use dbvehicle";
        $result = mysql_query($sql);
        $sql = "select * from tbadmin;";
        $result = mysql_query($sql);
        echo "<table width=1100 border=1 bordercolor=000000 cellspacing=0>            
             <tr border=1>
                <th width=100 align=center bgcolor=#cccccc>id</th>
                <th width=250 align=center bgcolor=#cccccc>Username</th>
                <th width=250 align=center bgcolor=#cccccc>Password</th>
                <th width=200 align=center bgcolor=#cccccc>Licenses</th>
                <th width=150 align=center bgcolor=#cccccc>Edit</th>
                <th width=150 align=center bgcolor=#cccccc>Delete</th>
             </tr>";
        while($dbarr= mysql_fetch_array($result)){       
            echo "<tr>"; 
            $adid=$dbarr[admin_id];
            echo "    <td width=200 align=center> $dbarr[admin_id]</td>";
            echo "    <td width=300 align=center>$dbarr[username]</td>";
            echo "    <td width=300 align=center>$dbarr[password]</td>";
            $lic=$dbarr[licenses];
            if($lic==0){
                $licenses="admin";
            }else{
                $licenses="user";
            }
            echo "    <td width=200 align=center>$licenses</td>"; 
          echo "    <td width=150 align=center><a href=delete.php?adid=$dbarr[admin_id]>Edit</a></td>";
          echo "    <td width=150 align=center>Delete</td>";
        }mysql_close($link);
        ?>
        

        
    </body>
</html>
