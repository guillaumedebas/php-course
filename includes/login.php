        <h1>Login</h1>
        <form action="recettes.php" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="email" class="form-control" id="login" name="login" aria-describedby="login-help">
                <div id="login-help" class="form-text">Votre adresse email de connexion.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help">
                <div id="password-help" class="form-text">Celui qui vous a été communiqué à l'inscription.</div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
       