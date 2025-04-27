<h1>Crear nueva categoría</h1>

<form action="<?=base_url?>categories/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>

    <input type="submit" value="Guardar">
</form>