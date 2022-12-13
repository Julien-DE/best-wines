<div>Ceci est la page du blog pour éditer les articles.</div>
<?php if (isset($message)) : ?>
    <div>
        <span><?= $message ?></span>
    </div>

<?php endif; ?>

<!-- Create the editor container -->
<form method="POST" action="<?= BASE_DIR ?>/nos-fournisseurs/edit?id=<?= $id ?>" enctype="multipart/form-data">

    <div>
        <label for="name">Nom du fournisseur</label>
        <input type="text" name="name" id="name" value="<?= $edit_temp['name'] ?>">
    </div>
    <label for=" content">Information fournisseur</label>

    <textarea id="mytextarea" name="content"><?= $edit_temp['content'] ?></textarea>

    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>

    <div>Ajouter photo vin:
        <label for="image_browser">
            <img src="<?= BASE_DIR ?>/uploads/supplier/<?= $edit_temp['image_supp']; ?>">
            <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display:none">
            Chercher l'image
        </label>
        <br>
        <small class=" file_info text-muted"></small>
    </div>

</form>

<script>
    function display_image_name(file_name) {
        document.querySelector(".file_info").innerHTML = '<b>Fichier choisi:</b><br>' + file_name;
    }
</script>
<script src="../../../best-wines/node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });

    function display_image_name(file_name) {
        document.querySelector(".file_info").innerHTML = '<b>Fichier choisi:</b><br>' + file_name;
    }
</script>