<?php 

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Departments.php';


$sql = $connection->prepare('SELECT * FROM `departments` WHERE `id` = ?');
$sql->bind_param('d',$id);
$id = $_GET['id'];
$sql->execute();
$result = $sql->get_result();

// echo var_dump($result);

if($result && $result->num_rows > 0){
    // DEFINISCO UN ARRAY VUOTO
    $departments=[];
        while($row=$result->fetch_assoc()) {
            // echo var_dump($row);
    
            // creo l'istanza della classe Departments e lo pusho ad ogni ciclo nell'array
            $department = new Department();
            $department->id = $row['id'];
            $department->name = $row['name'];
            // aggiungo ulteriori dettagli del singolo dipartimento
            $department->email = $row['email'];
            $department->address = $row['address'];
            $department->address = $row['phone'];


            // pusho ogni istanza nell'array
            $departments[]=$department;
    
        }
       
    }elseif($result->num_rows==0 && $result){
    
        echo 'Risultati non presenti per questa pagina ';
    }else{
        echo 'Errore di query';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul> <?php foreach($departments as $department) { ?> 

<li>
    <?php echo $department->address; ?>
</li>


<?php } ?>
</ul>
    
</body>
</html>