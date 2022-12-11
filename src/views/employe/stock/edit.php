<div>Ceci est la page edit du stock</div>

<?php if (isset($message)) : ?>
    <div>
        <span><?= $message ?></span>
    </div>

<?php endif; ?>

<a class='btn btn-success' href=" <?= BASE_DIR ?>/employe/stock">Index</a>

<form method="post" action="<?= BASE_DIR ?>/employe/stock/edit?id=<?= $id ?>" enctype="multipart/form-data">
    <div>
        <label for=" name">Nom</label>
        <input type="text" name="name" id="name" value="<?= $edit_temp['name'] ?>">
    </div>
    <div>
        <label for=" description">Description</label>
        <input type="text" name="description" id="description" value="<?= $edit_temp['description'] ?>">
    </div>
    <div>
        <label for="stock">stock</label>
        <input type="number" name="stock" id="stock" value="<?= $edit_temp['stock'] ?>">
    </div>
    <div>
        <label for="alcohol_percentage">alcohol_percentage</label>
        <input type="number" name="alcohol_percentage" id="alcohol_percentage" value="<?= $edit_temp['alcohol_percentage'] ?>">
    </div>
    <div>
        <label for="id_region">Region</label>
        <select name="id_region" class="form-select" aria-label="Default select example">
            <option selected>Choisissez une option</option>
            <?php foreach ($regions as $region) : ?>
                <?php if ($edit_temp['id_region'] == $region['id']) : ?>
                    <option selected name="<?= $region['id'] ?>" value="<?= $region['id'] ?>"><?= $region['region_name'] ?></option>
                <?php else : ?>
                    <option name="<?= $region['id'] ?>" value="<?= $region['id'] ?>"><?= $region['region_name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>

    </div>
    <div>
        <label for="id_cepage">Cepage</label>
        <select name="id_cepage" class="form-select" aria-label="Default select example">
            <option selected>Choisissez une option</option>
            <?php foreach ($cepages as $cepage) : ?>
                <?php if ($edit_temp['id_cepage'] == $cepage['id']) : ?>
                    <option selected name="<?= $cepage['id'] ?>" value="<?= $cepage['id'] ?>"><?= $cepage['cepage_name'] ?></option>
                <?php else : ?>
                    <option name="<?= $cepage['id'] ?>" value="<?= $cepage['id'] ?>"><?= $cepage['cepage_name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>

    </div>
    <div>
        <label for="id_taste">Goût</label>
        <select name="id_taste" class="form-select" aria-label="Default select example">
            <option selected>Choisissez le goût</option>
            <?php foreach ($tastes as $taste) : ?>
                <?php if ($edit_temp['id_taste'] == $taste['id']) : ?>
                    <option selected name="<?= $taste['id'] ?>" value="<?= $taste['id'] ?>"><?= $taste['taste_name'] ?></option>
                <?php else : ?>
                    <option name="<?= $taste['id'] ?>" value="<?= $taste['id'] ?>"><?= $taste['taste_name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="id_association">Association</label>
        <select name="id_association" class="form-select" aria-label="Default select example">
            <option selected>Choisissez l'accord</option>
            <?php foreach ($associations as $association) : ?>
                <?php if ($edit_temp['id_association'] == $association['id']) : ?>
                    <option selected name="<?= $association['id'] ?>" value="<?= $association['id'] ?>"><?= $association['association_name'] ?></option>
                <?php else : ?>
                    <option name="<?= $association['id'] ?>" value="<?= $association['id'] ?>"><?= $association['association_name'] ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="id_type">Choissisez le type de produit</label>
        <select name="id_type" class="form-select" aria-label="Default select example">
            <option selected>Choisissez l'accord</option>
            <?php foreach ($type_products as $type_product) : ?>
                <?php if ($edit_temp['id_type'] == $type_product['id_type']) : ?>
                    <option selected name="<?= $type_product['id_type'] ?>" value="<?= $type_product['id_type'] ?>"><?= $type_product['type_name'] ?></option>
                <?php else : ?>
                    <option name="<?= $type_product['id_type'] ?>" value="<?= $type_product['id_type'] ?>"><?= $type_product['type_name'] ?></option>
                <?php endif ?> <?php endforeach ?>
        </select>
    </div>
    <div>
        <label for="price">Prix</label>
        <input type="number" name="price" id="price" value="<?= $edit_temp['price'] ?>">
    </div>
    <div> Mettre en vedette</div>
            
                    <div class="form-check">
                        <label class="form-check-label">Non
                        <input class="form-check-input" name="is_featured" id="is_featured" type="radio" value="0" aria-label="Non">
                      </label> 
                </div>
                <div>
                      <label class="form-check-label">Oui
                        <input class="form-check-input" name="is_featured" id="is_featured" type="radio" value="1" aria-label="Oui">
                      </label>                        
                    </div>
    </div>
    <?php if (isset($message)) : ?>

        <div> <?= $message ?></div>
    <?php endif ?>
    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>

    <div>Ajouter photo vin:
        <label for="image_browser">
            <img src="<?php $image ?>">
            <input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display:none">
            Chercher l'image
        </label>
        <br>
        <small class="file_info text-muted"></small>
    </div>
    

</form>

<script>
    function display_image_name(file_name) {
        document.querySelector(".file_info").innerHTML = '<b>Fichier choisi:</b><br>' + file_name;
    }
</script>