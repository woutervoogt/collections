<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Collections</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/verzamelingen">Verzamelingen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/verzameling/aanmaken">Verzameling
                            aanmaken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/verzameling_aanmaken">Account</a>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" role="button" id="login-dropdown" data-toggle="dropdown">
                            Inloggen
                        </a>
                        <div class="dropdown-menu">
                            <form class="px-3 py-2 needs-validation" method="POST" action="/inloggen" novalidate>
                                <div class="form-group mb-2">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">
                                        Vul een geldig e-mailadres in.
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Wachtwoord</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div class="invalid-feedback">
                                        Vul een wachtwoord in.
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Inloggen</button>
                            </form>

                            <a class="dropdown-item" href="/registreren">Nog geen account? Maak er een aan</a>
                            <a class="dropdown-item" href="#">Wachtwoord vergeten?</a>
                        </div>



                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registreren">Registreren</a>
                    </li>

                    <?php if (isset($_SESSION) && isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" role=" button" id="logout-dropdown" data-toggle="dropdown">
                            <?= $_SESSION['user']['name'] ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="nav-link" href="/uitloggen">
                                Uitloggen
                            </a>
                        </div>


                    </li>
                    <?php endif ?>



                </ul>
            </div>
        </div>
    </nav>

</header>