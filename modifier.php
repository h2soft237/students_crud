<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modifier un étudiant</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">StudentApp</a>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4">Modifier un étudiant</h2>
  
    <?php

        if(isset($_GET["id"]) && !empty($_GET["id"])){

            require_once "connect.php";
            $id=$_GET["id"];
            $req=mysqli_query($con, "SELECT * FROM students WHERE id=$id");
            if($req){
                $row=mysqli_fetch_assoc($req);
            }else{
                echo "L'operation a echoue";
            }
        }else{
            header("Location: index.php");
            exit();
        }
        
        if(isset($_POST["btn"])){
            extract($_POST);

            if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["date_naissance"])){
                require_once "connect.php";
                $req=mysqli_query($con, "UPDATE students SET nom='$nom', prenom='$prenom', email='$email', date_naissance='$date_naissance' WHERE id=$id");
                if($req){
                    header("Location: index.php");
                    exit();
                }else{
                    echo "Etudiants non modifier";
                }
            }else{
                echo "Veuiller remplir tout les champs";
            }
        }
    ?>

  <form method="POST">
    <div class="row mb-3">
      <div class="col">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?=$row["nom"]?>" required>
      </div>
      <div class="col">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?=$row["prenom"]?>" required>
      </div>
</div>
      
    <div class="mb-3">
      <label for="email" class="form-label">Adresse e-mail</label>
      <input type="email" name="email" id="email" class="form-control" value="<?=$row["email"]?>" required>
    </div>

    <div class="mb-3">
      <label for="date_naissance" class="form-label">Date de naissance</label>
      <input type="date" name="date_naissance" id="date_naissance" value="<?=$row["date_naissance"]?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary" name="btn">Enregistrer</button>
    <a href="index.php" class="btn btn-secondary ms-2">Annuler</a>
  </form>
</div>

<script src="js/script.js"></script>
</body>
</html>
