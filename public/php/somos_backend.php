<?php 

$db = new PDO ('mysql:host=localhost;dbname=soy_mi_planner_laravel;charset=utf8','casa','1234qwer');

$query = $db->prepare('SELECT MAX(id) FROM users');
$query->execute();

$result = $query->fetchColumn();

$cantidadUsuarios = $result; // cantUsers(); quisiera crear un metodo en el controller de index que haga lo mismo...

header('Content-Type', 'application/json');

print json_encode($cantidadUsuarios);

?>