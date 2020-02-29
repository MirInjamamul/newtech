<?php
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=newtech', 'root', '');
     
} catch (PDOException $e) {
    print "Connetion Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
