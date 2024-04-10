<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST ["name"]?? "";
    $cognome = $_POST ["cognome"]?? "";
    $città = $_POST ["città"]?? "";
    $nazione = $_POST ["nazione"]?? "";
    $email = $_POST ["email"]?? "";
    $password = $_POST ["password"]?? "";

    $errors =[];

    if (strlen($name)=== 0){
        $errors["name"]= "Nome non inserito";
    }

    if (strlen($cognome)=== 0){
        $errors["cognome"]= "Cognome non inserito";
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"] = "Email non valida";
    }

    if (strlen($città)=== 0){
        $errors["città"]= "Città non inserita";
    }
    if (strlen($nazione)=== 0){
        $errors["nazione"]= "Nazione non inserita";
    }

    if(strlen($password) > 10){
        $errors["password"]= "Password troppo lunga deve essere meno di 10 caratteri" ;
    }
    if( strlen($password) === 0){
        $errors["password"]= "Password non inserita";
    }


    if($errors === []){
        header("Location: /S1-L2-Dati-Server/success-registrazione.php");
    }


}


// echo "<pre>" . print_r($_POST, true) . "</pre>"

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Esercizio giorno 2</title>
</head>
<body class="bg-black text-white">

<h1 class="d-flex justify-content-center my-4">Registrati al nostro sito: </h1>
<div class="container">
<div class="row justify-content-center mx-auto"> 
<form action="" method="post" class="col-5  g-3 needs-validation " novalidate> 
    <div>
  <div class="col-md-12" >
    <label for="name" class="form-label">Nome:</label>
    <input type="text" name="name" class="form-control " id="name" placeholder="Nome" >
   <div class="error text-danger "><?= $errors["name"]?? "" ?></div>
  </div>
  <div class="col-md-12">
    <label for="cognome" class="form-label">Cognome:</label>
    <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome" required>
    <div class="error text-danger"><?= $errors["cognome"]?? "" ?></div>
  </div>

  <div class="col-md-12">
      <label for="città" class="form-label">Città:</label>
      <input type="text" class="form-control" name="città" id="città" placeholder="Città"  required>
      <div class="error text-danger"><?= $errors["città"]?? "" ?></div>
    </div>
    <div class="col-md-12">
        <label for="nazione" class="form-label">Nazione:</label>
        <input type="text" class="form-control" name="nazione" id="nazione" placeholder="Nazione"  required>
        <div class="error text-danger"><?= $errors["nazione"]?? "" ?></div>
    </div>
    <div class="col-md-12">
      <label for="email" class="form-label">Email:</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="exp@gmail.com"  required>
      <div class="error text-danger"><?= $errors["email"]?? "" ?></div>
    </div>
  <div class="col-md-12 mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Scegli una Password"  required>
    <div class="error text-danger"><?= $errors["password"]?? "" ?></div>
  </div>
  
  <div class="col-12 justify-content-center d-flex">
    <button class="btn btn-success" type="submit">Registrati</button>
  </div>
</form>

</div>

</div>




 
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>