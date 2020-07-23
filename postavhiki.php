<html lang="ru">
<head>
<title>Поставщики</title>
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
    
    $sql = "UPDATE postavhiki SET name_p = '$_GET[text2]',telefon_p= '$_GET[text3]', id_sotr='$_GET[text4]'  WHERE id_p = '$_GET[text1]'";  
    
    mysqli_query($conn, $sql) or die( mysql_error($conn));
} 
if (isset($_GET[add1])){
    
    if ($_GET[text7]!='' and  $_GET[text6]!='' and $_GET[text5]!='' and $_GET[text8]!='')     { 
    $query = "INSERT INTO postavhiki VALUES ('$_GET[text5]','$_GET[text6]','$_GET[text7]','$_GET[text8]')";
    mysqli_query($conn, $query) or die( mysql_error($conn));
    }
}  
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from postavhiki WHERE id_p = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}
?>
<table class="table_blur">
        <tr>
            <th>id</th>
            <th>Поставщик</th>
            <th>телефон</th> 
            <th>id сотрудника</th> 
            <th>редактировать</th> 
            <th>удалить</th>           
        </tr>

        <?php            

      $postavhiki = mysqli_query($conn, "SELECT * FROM postavhiki");
      $postavhiki = mysqli_fetch_all($postavhiki);           

            foreach ($postavhiki as $postavhik) {
                ?>
                    <tr>
                        <td><?= $postavhik[0] ?></td>
                        <td><?= $postavhik[1] ?></td>
                        <td><?= $postavhik[2] ?></td>
                        <td><?= $postavhik[3] ?></td>                                              
                        <td><a href="?upd=<?= $postavhik[0] ?>">update</a></td>
                        <td><a style="color: red;" href="?del=<?= $postavhik[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <form >
   <BR><INPUT TYPE=SUBMIT VALUE="добавить строку" NAME=add><BR> 
    </form>

 <?php
 if (isset($_GET[add]) ){     
    ?>
    Добавление строки: <br>
        <form >
        Номер поставщика:<INPUT TYPE=number NAME=text5><BR>
        наименование поставщика:<INPUT TYPE=TEXT NAME=text6><BR>
        телефон:<INPUT TYPE=text NAME=text7 ><BR> 
        id сотрудника:<INPUT TYPE=number NAME=text8 ><BR>         
        <INPUT TYPE=SUBMIT VALUE="добавить" NAME=add1><BR>  
        </form>
        <?php   
}
 if (isset($_GET[upd]) ){
     $postavhik_id = $_GET['upd'];
     $postavhik = mysqli_query($conn, "SELECT * FROM postavhiki WHERE id_p = '$postavhik_id'");
     $postavhik = mysqli_fetch_assoc($postavhik);
    ?>
   <br> Изменение строки: 
        <form >
        <INPUT TYPE=hidden NAME=text1 VALUE="<?= $postavhik['id_p'] ?>"><BR>
        наименование поставщика:<INPUT TYPE=TEXT NAME=text2 VALUE="<?= $postavhik['name_p'] ?>"><BR>
        телефон:<INPUT TYPE=number NAME=text3 VALUE="<?= $postavhik['telefon_p'] ?>"><BR>    
        id сотрудника:<INPUT TYPE=TEXT NAME=text4 VALUE="<?= $postavhik['id_sotr'] ?>"><BR>    
        <INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
        </form>
        <?php   
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from postavhiki WHERE id_p = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}

?>
</body>
</html>
