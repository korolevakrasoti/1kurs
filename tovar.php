<html lang="ru">
<head>
<title>Товары</title>
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
    
    $sql = "UPDATE tovari SET name_tovara = '$_GET[text2]',kolvo= '$_GET[text4]',
    id_post= '$_GET[text5]' ,unit_price= '$_GET[text3]'   WHERE id_tovara = '$_GET[text1]'";  
    
    mysqli_query($conn, $sql) or die(   mysql_error($conn));
} 
if (isset($_GET[add1])){
    
    if ($_GET[text6]!='' and  $_GET[text7]!='' and $_GET[text8]!='' and $_GET[text9]!='' and $_GET[text10]!='')     { 
    $query = "INSERT INTO tovari VALUES ('$_GET[text6]','$_GET[text7]','$_GET[text9]','$_GET[text10]','$_GET[text8]')";
    mysqli_query($conn, $query) or die( mysql_error($conn));
    }
}  
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from tovari WHERE id_tovara = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}
?>
<table class='table_blur'>
        <tr>
            <th>id</th>
            <th>наим товара</th>         
            <th>цена за единицу</th> 
            <th>количество</th>
            <th>id поставщика</th> 
            <th>редактировать</th> 
            <th>удалить</th>           
        </tr>

        <?php            

      $tovari = mysqli_query($conn, "SELECT * FROM tovari");
      $tovari = mysqli_fetch_all($tovari);           

            foreach ($tovari as $tovar) {
                ?>
                    <tr>
                        <td><?= $tovar[0] ?></td>
                        <td><?= $tovar[1] ?></td>
                        <td><?= $tovar[4] ?></td>
                        <td><?= $tovar[2] ?></td>
                        <td><?= $tovar[3] ?></td>                                                                   
                        <td><a href="?upd=<?= $tovar[0] ?>">update</a></td>
                        <td><a style="color: red;" href="?del=<?= $tovar[0] ?>">Delete</a></td>
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
        Номер товара:<INPUT TYPE=number NAME=text6><BR>
        наим товара:<INPUT TYPE=TEXT NAME=text7><BR>
        цена за единицу:<INPUT TYPE=number NAME=text8><BR>  
        количество:<INPUT TYPE=number NAME=text9><BR> 
        id поставщика:<INPUT TYPE=number NAME=text10><BR>
        <INPUT TYPE=SUBMIT VALUE="добавить" NAME=add1><BR>  
        </form>
        <?php 
}
 if (isset($_GET[upd]) ){
     $tovar_id = $_GET['upd'];
     $tovar = mysqli_query($conn, "SELECT * FROM tovari WHERE id_tovara = '$tovar_id'");
     $tovar = mysqli_fetch_assoc($tovar);
    ?>
    Изменение строки: <br>
        <form >
        <INPUT TYPE=hidden NAME=text1 VALUE="<?= $tovar['id_tovara'] ?>"><BR>       
        наим товара:<INPUT TYPE=text NAME=text2 VALUE="<?= $tovar['name_tovara'] ?>"><BR>    
        цена за единицу:<INPUT TYPE=number NAME=text3 VALUE="<?= $tovar['unit_price'] ?>" ><BR>  
        количество:<INPUT TYPE=number NAME=text4 VALUE="<?= $tovar['kolvo'] ?>" ><BR>  
        id поставщика:<INPUT TYPE=number NAME=text5 VALUE="<?= $tovar['id_post'] ?>" ><BR>  
        <INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
        </form>
        <?php   
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from tovari WHERE id_tovara = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}

?>
</body>
</html>
