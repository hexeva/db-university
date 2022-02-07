<?php 
// creare costanti php per richiamare database
define('DB_SERVERNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_PORT',8889);
define('DB_NAME','university');

// VARIABILE PER CONNESSIONE 
$connection = new mysqli(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
// IF PER CONTROLLARE L?AVVENUTA CONNESSIONE
if($connection && $connection->connect_error){
    echo 'Connessione non riuscita' . $connection->$connection_error;
    die();
}

// echo var_dump($connection);
?>