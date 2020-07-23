<html lang="ru">
<head>
<title>Курсовой проект</title>
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
echo"Запросы: <br>";
echo"1)Вводится ФИО сотрудника. Выводятся все сведения о поставщиках, с кем работает этот сотрудник(связь 2ух таблиц). <br>";
echo"1)Вводится id Заказчика. Выводятся количество заключённых договоров(агрегатная функция). <br>";
?>
 <form >
 ФИО сотрудника:<INPUT TYPE=text NAME=text1 VALUE='<?php echo $_GET[text1] ?>'><BR>
 <INPUT class= "button21" TYPE=SUBMIT VALUE="найти" NAME=find1><BR>  
 </form>
 <?php  
 if (isset($_GET[find1])){  
 if($_GET[text1] !=''){  
$sql = "SELECT * from sotrydniki, postavhiki where (id_sotrydnika = id_sotr and name_sotrydnika = '$_GET[text1]' ) ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {    
echo "<table class='table_blur'><tr><th>id поставщика</th><th>Наим поставщика</th><th>телефон</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_p"]."</td><td>".$row["name_p"]."</td><td>".$row["telefon_p"]."</td></tr>";
    }
echo"</table>";
} else {
    echo "0 results<br>";
}}}
?>
 <form >
 наим Заказчика:<INPUT TYPE=text NAME=text2 VALUE='<?php echo $_GET[text2] ?>'><BR>
 <INPUT class= "button21" TYPE=SUBMIT VALUE="найти" NAME=find2><BR>  
 </form>
 <?php  
 if (isset($_GET[find2])){  
 if($_GET[text2] !=''){  

$sql = "SELECT id_zakazchika,count(id_dogovora) from dogovori where (id_zakazchika = '$_GET[text2]') ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {    
echo "<table class='table_blur'><tr><th>кол-во договоров</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["count(id_dogovora)"]."</td></tr>";
    }
echo"</table>";
} else {
    echo "0 results<br>";
}}}


?>
</body>
</html>
