<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Modifier un étudiant</h1>

        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('students/update/' . $student['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $student['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= old('prenom', $student['prenom']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?= old('telephone', $student['telephone']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $student['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?= old('date_naissance', $student['date_naissance']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="niveau_etudes" class="form-label">Niveau d'études</label>
                <select class="form-select" id="niveau_etudes" name="niveau_etudes" required>
                    <option value="">Sélectionnez un niveau</option>
                    <option value="bac" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac' ? 'selected' : '' ?>>Bac</option>
                    <option value="bac+1" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac+1' ? 'selected' : '' ?>>Bac+1</option>
                    <option value="bac+2" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac+2' ? 'selected' : '' ?>>Bac+2</option>
                    <option value="bac+3" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac+3' ? 'selected' : '' ?>>Bac+3</option>
                    <option value="bac+4" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac+4' ? 'selected' : '' ?>>Bac+4</option>
                    <option value="bac+5" <?= old('niveau_etudes', $student['niveau_etudes']) == 'bac+5' ? 'selected' : '' ?>>Bac+5</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="<?= site_url('students') ?>" class="btn btn-secondary">Retour</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
