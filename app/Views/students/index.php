<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Gestion des étudiants</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">
                    Bienvenue, <?= session()->get('user_name') ?>
                </span>
                <a href="<?= site_url('logout') ?>" class="btn btn-outline-light">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Liste des étudiants yasser</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <a href="<?= site_url('students/new') ?>" class="btn btn-primary mb-3">Ajouter un étudiant</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                    <th>Niveau d'études</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= esc($student['name']) ?></td>
                        <td><?= esc($student['prenom']) ?></td>
                        <td><?= esc($student['telephone']) ?></td>
                        <td><?= esc($student['email']) ?></td>
                        <td><?= date('d/m/Y', strtotime($student['date_naissance'])) ?></td>
                        <td><?= esc($student['niveau_etudes']) ?></td>
                        <td>
                            <a href="<?= site_url('students/edit/'.$student['id']) ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="<?= site_url('students/delete/'.$student['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
