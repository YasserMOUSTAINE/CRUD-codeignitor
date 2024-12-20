<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="post" action="/auth/registerUser">
        <?= csrf_field() ?>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" value="<?= old('username') ?>" required>
        <?= \Config\Services::validation()->getError('username') ?>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>
        <?= \Config\Services::validation()->getError('email') ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
        <?= \Config\Services::validation()->getError('password') ?>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
