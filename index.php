<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Accueil - Liste des étudiants</title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">StudentApp</a>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Liste des étudiants</h2>
      <a href="addUser.php" class="btn btn-success">+ Ajouter un étudiant</a>
    </div>




    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-primary">

          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Date d'inscription</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
          <!-- Exemple de ligne -->
          <?php

          require_once "connect.php";
            $count=0;
          $req = mysqli_query($con, "SELECT * FROM students");

          if (mysqli_num_rows($req) > 0) {
            while ($row = mysqli_fetch_assoc($req)) {
              $count++;
          ?>
              <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["nom"] ?></td>
                <td><?= $row["prenom"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["date_naissance"] ?></td>
                <td><?= $row["date_inscription"] ?></td>
                <td class="text-nowrap">
                    <a title="Afficher les details de l'etudiant" href="showUser.php?id=<?= $row["id"] ?>" class="mr-1"><i class="bi bi-eye"></i></a>
                    <a title="Editer un étudiant" href="modifier.php?id=<?= $row["id"] ?>" class="mr-1"><i class="bi bi-pencil-square"></i></a>
                    <a class="text-danger" title="Supprimer un étudiant" href="deleteUser.php?id=<?= $row["id"] ?>" data-bs-toggle="modal" data-bs-target="#confirmModal<?=$count ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <div class="modal fade" id="confirmModal<?=$count ?>" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                      Voulez-vous vraiment supprimer cet étudiant ? Cette action est <strong>irréversible</strong>.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <a href="deleteUser.php?id=<?= $row["id"] ?>" class="btn btn-danger">Confirmer la suppression</a>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "Aucun etudiant inscrits";
          }
          ?>
          <!-- Ajouter d'autres lignes dynamiquement avec PHP/MySQL -->
        </tbody>
      </table>


    </div>
  </div>

  <script src="js/script.js"></script>
</body>

</html>