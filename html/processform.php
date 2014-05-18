<?php
$name = trim($_REQUEST['name']);
$message = trim($_REQUEST['message']);


$db = new PDO('mysql:host=localhost;dbname=cards', 'noah', 'root');
// insert command with ? in place of values being inserted
$sql = 'insert into cardinfo (id, name, message) values (NULL, ?, ?)';
$sth = $dbh->prepare($sql);
// execute the SQL by passing an array of values to use for the ? above
// this assumes $name and $message have been set
$sth->execute(array($name, $message));

// get the inserted id just incase you need it
$id = 0;
if($sth->rowCount() > 0)
    $id = $db->lastInsertId();
    
    $sql = 'select * from cardinfo';
$sth = $dbh->prepare($sql);
$sth->execute();
$records = $sth->fetchAll();

foreach($records as $record)
{
    echo('Name: '.$record['name']."<br>");
    
}

?>
