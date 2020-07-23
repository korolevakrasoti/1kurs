<html lang="ru">
<head>
<title>Договоры</title>
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
    
    $sql = "UPDATE dogovori SET id_zakazchika = '$_GET[text2]',
       price_d= '$_GET[text3]', srok = '$_GET[text4]', fact_srok = '$_GET[text5]', id_tovara ='$_GET[text11]'  WHERE id_dogovora = '$_GET[text1]'";  
    
    mysqli_query($conn, $sql) or die(   mysql_error($conn));
} 
if (isset($_GET[add1])){
    
    if ($_GET[text9]!='' and  $_GET[text8]!='' and $_GET[text7]!='' and $_GET[text6]!='' and $_GET[text12]!='')     { 
    $query = "INSERT INTO dogovori VALUES ('$_GET[text6]','$_GET[text9]','$_GET[text7]','$_GET[text10]','$_GET[text8]','$_GET[text12]')";
    mysqli_query($conn, $query) or die( mysql_error($conn));
    }
}  
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from dogovori WHERE id_dogovora = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}
?>
<table class='table_blur'>
        <tr>
            <th>id</th>
            <th>id заказчика</th>
            <th>id товара</th>
            <th>цена</th> 
            <th>установленный срок</th> 
            <th>фактический срок</th> 
            <th>редактировать</th> 
            <th>удалить</th>           
        </tr>

        <?php            

      $dogovori = mysqli_query($conn, "SELECT * FROM dogovori");
      $dogovori = mysqli_fetch_all($dogovori);           

            foreach ($dogovori as $dogovor) {
                ?>
                    <tr>
                        <td><?= $dogovor[0] ?></td>
                        <td><?= $dogovor[2] ?></td>
                        <td><?= $dogovor[5] ?></td>
                        <td><?= $dogovor[4] ?></td>    
                        <td><?= $dogovor[1] ?></td>  
                        <td><?= $dogovor[3] ?></td>                                            
                        <td><a href="?upd=<?= $dogovor[0] ?>">update</a></td>
                        <td><a style="color: red;" href="?del=<?= $dogovor[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <form>
    <INPUT TYPE=SUBMIT VALUE="добавить строку" NAME=add><BR> 
    </form>

 <?php
 if (isset($_GET[add]) ){     
    ?>
    Добавление строки: <br>
        <form >
        Номер договора:<INPUT TYPE=number NAME=text6><BR>
        id заказчика:<INPUT TYPE=number NAME=text7><BR> 
        id товара:<INPUT TYPE=number NAME=text12><BR>        
        цена:<INPUT TYPE=number NAME=text8 ><BR>  
        уст. срок:<INPUT TYPE=date NAME=text9 ><BR>  
        факт.срок:<INPUT TYPE=date NAME=text10 ><BR>        
        <INPUT TYPE=SUBMIT VALUE="добавить" NAME=add1><BR>  
        </form>
        <?php   
}



 if (isset($_GET[upd]) ){
     $dogovor_id = $_GET['upd'];
     $dogovor = mysqli_query($conn, "SELECT * FROM dogovori WHERE id_dogovora = '$dogovor_id'");
     $dogovor = mysqli_fetch_assoc($dogovor);
    ?>
    Изменение строки: <br>
    <form >
    <INPUT TYPE=hidden NAME=text1 VALUE="<?= $dogovor['id_dogovora'] ?>"><BR>
    id заказчика:<INPUT TYPE=text NAME=text2 VALUE="<?= $dogovor['id_zakazchika'] ?>"><BR>
    id товара:<INPUT TYPE=text NAME=text11 VALUE="<?= $dogovor['id_tovara'] ?>"><BR>
    цена:<INPUT TYPE=number NAME=text3 VALUE="<?= $dogovor['price_d'] ?>"><BR>
    уст. срок:<INPUT TYPE=date NAME=text4 VALUE="<?= $dogovor['srok'] ?>"><BR>  
    факт.срок: <INPUT TYPE=date NAME=text5 VALUE="<?= $dogovor['fact_srok'] ?>"><BR>            
    <INPUT TYPE=SUBMIT VALUE="изменить" NAME=upd1><BR>  
    </form>
    <?php   
}
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from dogovori WHERE id_dogovora = '$id'";
    mysqli_query($conn, $query) or die( mysql_error($conn));

}

?>
</body>
</html>
