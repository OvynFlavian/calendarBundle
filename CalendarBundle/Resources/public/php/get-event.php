<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=albo-consulting', 'root', '');
} catch(Exception $e) {
    exit('Unable to connect to database.');
}

var_dump($bdd);
$result = $bdd->query("SELECT * FROM event");

$events = $result->fetchAll(PDO::FETCH_ASSOC);

var_dump($events);
echo json_encode($events);

?>