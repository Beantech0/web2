<h2>Regisztráció</h2>
<form action="<?= SITE_ROOT ?>regisztracio" method="post" class="needs-validation" novalidate>
    <!-- Családnév -->
    <div class="mb-3">
        <label for="lastname" class="form-label">Családnév:</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required>
        <div class="invalid-feedback">Kérjük, adja meg a családnevét!</div>
    </div>

    <!-- Utónév -->
    <div class="mb-3">
        <label for="firstname" class="form-label">Utónév:</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required>
        <div class="invalid-feedback">Kérjük, adja meg az utónevét!</div>
    </div>

    <!-- Bejelentkező azonosító -->
    <div class="mb-3">
        <label for="username" class="form-label">Bejelentkező azonosító:</label>
        <input type="text" class="form-control" id="username" name="username" required>
        <div class="invalid-feedback">Kérjük, adja meg a bejelentkező azonosítóját!</div>
    </div>

    <!-- Jelszó -->
    <div class="mb-3">
        <label for="password" class="form-label">Jelszó:</label>
        <input type="password" class="form-control" id="password" name="password" 
               required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+">
        <div class="invalid-feedback">A jelszónak legalább 4 karakter hosszúnak kell lennie!</div>
    </div>

    <!-- Jogosultsági szint -->
    <div class="mb-3">
        <label for="role" class="form-label">Jogosultsági szint:</label>
        <select class="form-select" id="role" name="role" required>
            <option value="" selected disabled>Válasszon jogosultsági szintet...</option>
            <option value="_1_">User</option>
            <option value="__1">Admin</option>
        </select>
        <div class="invalid-feedback">Kérjük, válasszon jogosultsági szintet!</div>
    </div>

    <!-- Beküldés gomb -->
    <button type="submit" class="btn btn-primary">Regisztráció</button>
    <h2 id="regisztral"><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?></h2>
</form>
<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
