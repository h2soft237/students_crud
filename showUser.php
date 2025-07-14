<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Détails de l'étudiant</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">StudentApp</a>
  </div>
</nav>
    <?php

        if(isset($_GET["id"])){

            $id=$_GET["id"];

            require_once "connect.php";
            $req=mysqli_query($con, "SELECT * FROM students WHERE id=$id");
            $row=mysqli_fetch_assoc($req);

        }

    ?>
<div class="container mt-5">
  <h2 class="mb-4">Détails de l'étudiant</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title">Nom complet : <span class="text-primary"><?=$row["nom"]?></span></h5>

      <table class="table table-striped">
        <tbody>
          <tr>
            <th scope="row">Nom</th>
            <td><?=$row["nom"]?></td>
          </tr>
          <tr>
            <th scope="row">Prénom</th>
            <td><?=$row["prenom"]?></td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td><?=$row["email"]?></td>
          </tr>
          <tr>
            <th scope="row">Date de naissance</th>
            <td><?=$row["date_naissance"]?></td>
          </tr>
          <tr>
            <th scope="row">Date d'inscription</th>
            <td><?=$row["date_inscription"]?></td>
          </tr>
        </tbody>
      </table>

      <a href="index.php" class="btn btn-secondary">← Retour à la liste</a>
    </div>
  </div>
</div>

</body>
</html>
