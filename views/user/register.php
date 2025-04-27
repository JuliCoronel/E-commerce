<h1>Registrarse</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong>¡Registro completado correctamente!</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong> El registro fallo, ingrese los datos correctamente. </strong>   
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>users/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>

    <label for="lastname">Apellidos</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" class="button" value="Registrarse">
</form>