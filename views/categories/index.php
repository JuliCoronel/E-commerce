<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categories/create" class="button small-button">Crear categoría</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>

    <?php while($cat = $categories->fetch_object()): ?>
        <tr>
            <td><strong><?= $cat->id; ?></strong></td>
            <td><strong><?= $cat->nombre; ?></strong></td>
        
        </tr>
    <?php endwhile; ?>
</table>