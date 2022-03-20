<?php
try{
$pdo = new PDO(
    'mysql:host=db;dbname=webapp;charset=utf8',
    'root',
    'test'
);
// echo "success connecting DB";
} catch (PDOException $e) {    
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
} 


// $sql = 'SELECT * FROM big_questions WHERE id = 1';
// $result = $stmt->fetch();
// var_dump($result); 