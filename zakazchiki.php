<html lang="ru">
<head>
<title>Заказчики</title>
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
    
    $sql = "UPDATE zakazchiki SET name_zakazchika = '$_GET[text2]',
       adres= '$_GET[text3]', phone='$_GET[text4]'  WHERE id_zakazchika = '$_GET[text1]'";  
    
    mysqli_query($conn, $sql) or die(   mysql_error($conn));
} 
if (isset($_GET[add1])){
    
    if ($_GET[text8]!='' and  $_GET[text7]!='' and $_GET[text6]!='' and $_GET[text5]!='')     { 
    $query = "INSERT INTO zakazchiki VALUES ('$_GET[text5]','$_GET[text6]','$_GET[text7]','$_GET[text8]')";
    mysqli_query($conn, $query) or die( mysql_error($conn));
    }
}  
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from zakazchiki WHERE id_zakazchika = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}
?>
<table class='table_blur'>
        <tr>
            <th>id</th>
            <th>наим заказчика</th>
            <th>адрес</th> 
            <th>телефон</th> 
            <th>редактировать</th> 
            <th>удалить</th>           
        </tr>

        <?php            

      $zakazchik = mysqli_query($conn, "SELECT * FROM zakazchiki");
      $zakazchik = mysqli_fetch_all($zakazchik);           

            foreach ($zakazchik as $zakazchik) {
                ?>
                    <tr>
                        <td><?= $zakazchik[0] ?></td>
                        <td><?= $zakazchik[1] ?></td>
                        <td><?= $zakazchik[2] ?></td>
                        <td><?= $zakazchik[3] ?></td>                              
                        <td><a href="?upd=<?= $zakazchik[0] ?>">update</a></td>
                        <td><a style="color: red;" href="?del=<?= $zakazchik[0] ?>">Delete</a></td>
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
        Номер заказчика:<INPUT TYPE=number NAME=text5><BR>
        наим заказчика:<INPUT TYPE=TEXT NAME=text6><BR>
        адрес:<INPUT TYPE=text NAME=text7 ><BR>      
        телефон:<INPUT TYPE=text NAME=text8 ><BR>     
        <INPUT TYPE=SUBMIT VALUE="добавить" NAME=add1><BR>  
        </form>
        <?php   
}

 if (isset($_GET[upd]) ){
     $zakazchik_id = $_GET['upd'];
     $zakazchik = mysqli_query($conn, "SELECT * FROM zakazchiki WHERE id_zakazchika = '$zakazchik_id'");
     $zakazchik = mysqli_fetch_assoc($zakazchik);
    ?>
    Изменение строки: <br>
        <form >
        <INPUT TYPE=hidden NAME=text1 VALUE="<?= $zakazchik['id_zakazchika'] ?>"><BR>
       наим заказчика:<INPUT TYPE=TEXT NAME=text2 VALUE="<?= $zakazchik['name_zakazchika'] ?>"><BR>
       адрес:<INPUT TYPE=TEXT NAME=text3 VALUE="<?= $zakazchik['adres'] ?>"><BR>
       номер услуги:<INPUT TYPE=number NAME=text4 VALUE="<?= $zakazchik['phone'] ?>"><BR>        
        <INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
        </form>
        <?php   
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from zakazchiki WHERE id_zakazchika = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}

?>
</body>
</html>
