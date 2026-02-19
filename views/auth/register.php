<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

        <h1 class="text-center mb-4">Créer un compte</h1>

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
                <form action="/register" method="POST" novalidate>

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                            <input type="text" id="prenom" name="prenom" class="form-control"
                                value="<?= htmlspecialchars($old['prenom'] ?? '') ?>" required
                                autocomplete="given-name">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" id="nom" name="nom" class="form-control"
                                value="<?= htmlspecialchars($old['nom'] ?? '') ?>" required autocomplete="family-name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($old['email'] ?? '') ?>" required autocomplete="email">
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone <span
                                class="text-muted">(optionnel)</span></label>
                        <input type="tel" id="telephone" name="telephone" class="form-control"
                            value="<?= htmlspecialchars($old['telephone'] ?? '') ?>" autocomplete="tel"
                            placeholder="06 12 34 56 78">
                    </div>

                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe <span
                                class="text-danger">*</span></label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required
                            autocomplete="new-password" minlength="8">
                        <div class="form-text">8 caractères minimum.</div>
                    </div>

                    <div class="mb-4">
                        <label for="mot_de_passe_confirm" class="form-label">Confirmer le mot de passe <span
                                class="text-danger">*</span></label>
                        <input type="password" id="mot_de_passe_confirm" name="mot_de_passe_confirm"
                            class="form-control" required autocomplete="new-password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Créer mon compte</button>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center mt-3">
            Déjà un compte ? <a href="/login">Se connecter</a>
        </p>

    </div>
</div>