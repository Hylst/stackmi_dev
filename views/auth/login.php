<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">

        <h1 class="text-center mb-4">Connexion</h1>

        <?php if (!empty($registered)): ?>
            <div class="alert alert-success">
                Compte créé avec succès ! Vous pouvez maintenant vous connecter.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li>
                            <?= htmlspecialchars($error) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="/login" method="POST" novalidate>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($old['email'] ?? '') ?>" required autocomplete="email">
                    </div>

                    <div class="mb-4">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required
                            autocomplete="current-password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center mt-3">
            Pas encore de compte ? <a href="/register">S'inscrire</a>
        </p>

    </div>
</div>