<!DOCTYPE html>
<meta charset="UTF-8">
<title>結果画面</title>
<h1>購入結果</h1>
<section>
    <h2>登録完了</h2>
    <button onclick="location.href='purchase.php'">戻る</button>
</section>


<?php
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];

$pdo = new PDO(
    "mysql:dbname=hello_world;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
//顧客毎の購入履歴を求める
$e = $pdo -> query("SELECT * FROM client_info WHERE client_name = '佐藤尚哉'");
while ($f = $e -> fetch()) {
print "{$f['client_name']}: {$f['product_name']} {$f['price']}<br><hr>";}



$e = $pdo -> query("SELECT * FROM client_info WHERE client_name = '藤原花子'");
while ($f = $e -> fetch()) {
print "{$f['client_name']}: {$f['product_name']} {$f['price']}<br><hr>";}

$e = $pdo -> query("SELECT * FROM client_info WHERE client_name = '山田太郎'");
while ($f = $e -> fetch()) {
print "{$f['client_name']}: {$f['product_name']} {$f['price']}<br><hr>";}

$e = $pdo -> query("SELECT * FROM client_info WHERE client_name = '加藤浩次'");
while ($f = $e -> fetch()) {
print "{$f['client_name']}: {$f['product_name']} {$f['price']}<br><hr>";}

if(!empty($_POST["a"]) && !empty($_POST["b"]) && !empty($_POST["c"])) {
$pdo = new PDO(
    "mysql:dbname=hello_world;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
if ($pdo) {
    echo "DB接続OK<br>";
} else {
    echo "DB接続NG<br>";
}

$pdo -> query("INSERT INTO
client_info
(client_name,product_name,price)
VALUES
('$a','$b','$c')");

if ($pdo) {
    echo "登録成功<br>";
} else {
    echo "登録失敗<br>";
}

$n = $pdo -> query("SELECT * FROM client_info ORDER BY id DESC");
while ($i = $n -> fetch()) {
print "{$i['client_name']}: {$i['product_name']}: {$i['price']}<br><hr>";}
}
else 
{
    $pdo = new PDO(
        "mysql:dbname=hello_world;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
    );
    if ($pdo) {
        echo "DB接続OK<br>";
    } else {
        echo "DB接続NG<br>";
    }
    $n = $pdo -> query("SELECT * FROM client_info ORDER BY id DESC");
    while ($i = $n -> fetch()) {
    print "{$i['client_name']}: {$i['product_name']} {$i['price']}<br><hr>";}
}

?>