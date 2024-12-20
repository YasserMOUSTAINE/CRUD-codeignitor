<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="post" action="/auth/loginUser">
        <?= csrf_field() ?>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>
        <?= \Config\Services::validation()->getError('email') ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
        <?= \Config\Services::validation()->getError('password') ?>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
