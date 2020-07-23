<html lang="ru">
<head>
<title>Сотрудники</title>
<link rel = "stylesheet" href = "css/1.css"> 
</head>
<body>


<ul class="menu">
<li><a href="sotrydniki.php">Сотрудники</a></li>
<li><a href="postavhiki.php">Поставщики</a></li>
<li><a href="tovar.php">Товары</a></li>
<li><a href="dogovory.php">Договор на поставку</a></li>
<li><a href="zakazchiki.php">Заказчики</a></li>   
<li><a href="zapros.php">Запросы</a></li>  
</ul>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realization";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET[upd1]) ){
    
    $sql = "UPDATE sotrydniki SET name_sotrydnika = '$_GET[text2]',
       dolznost= '$_GET[text3]'  WHERE id_sotrydnika = '$_GET[text1]'";  
    
    mysqli_query($conn, $sql) or die(   mysql_error($conn));
} 
if (isset($_GET[add1])){
    
    if ($_GET[text6]!='' and  $_GET[text5]!='' and $_GET[text7]!='')     { 
    $query = "INSERT INTO sotrydniki VALUES ('$_GET[text5]','$_GET[text6]','$_GET[text7]')";
    mysqli_query($conn, $query) or die( mysql_error($conn));
    }
}  
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from sotrydniki WHERE id_sotrydnika = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}
?>
<table class="table_blur">
        <tr>
            <th>id</th>
            <th>фио сотрудника</th>
            <th>должность</th>   
            <th>редактировать</th> 
            <th>удалить</th>           
        </tr>

        <?php            

      $sotrydniki = mysqli_query($conn, "SELECT * FROM sotrydniki");
      $sotrydniki = mysqli_fetch_all($sotrydniki);           

            foreach ($sotrydniki as $sotrydnik) {
                ?>
                    <tr>
                        <td><?= $sotrydnik[0] ?></td>
                        <td><?= $sotrydnik[1] ?></td>
                        <td><?= $sotrydnik[2] ?></td>                                           
                        <td><a href="?upd=<?= $sotrydnik[0] ?>">update</a></td>
                        <td><a style="color: red;" href="?del=<?= $sotrydnik[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <form >
    <INPUT TYPE=SUBMIT VALUE="добавить строку" NAME=add><BR> 
    </form>

 <?php
 if (isset($_GET[add]) ){     
    ?>
    Добавление строки: <br>
        <form >
        номер сотрудника:<INPUT TYPE=text NAME=text5><BR>
        фио сотрудника:<INPUT TYPE=TEXT NAME=text6><BR>
        должность:<INPUT TYPE=text NAME=text7><BR>         
        <INPUT TYPE=SUBMIT VALUE="добавить" NAME=add1><BR>  
        </form>
        <?php   
}
 if (isset($_GET[upd]) ){
     $sotrydnik_id = $_GET['upd'];
     $sotrydnik = mysqli_query($conn, "SELECT * FROM sotrydniki WHERE id_sotrydnika = '$sotrydnik_id'");
     $sotrydnik = mysqli_fetch_assoc($sotrydnik);
    ?>
    Изменение строки: <br>
        <form >
        <INPUT TYPE=hidden NAME=text1 VALUE="<?= $sotrydnik['id_sotrydnika'] ?>"><BR>
        фио сотрудника:<INPUT TYPE=TEXT NAME=text2 VALUE="<?= $sotrydnik['name_sotrydnika'] ?>"><BR>
        должность:<INPUT TYPE=text NAME=text3 VALUE="<?= $sotrydnik['dolznost'] ?>"><BR>         
        <INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
        </form>
        <?php   
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from sotrydniki WHERE id_sotrydnika = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}

?>
</body>
</html>
