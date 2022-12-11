<div>Ceci est la page Index des employées géré par l'admin</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">email</th>
            <th scope="col">employé</th>
            <th scope="col">admin</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <form action="" method="POST">
            <?php
            foreach ($all_users as $user) : ?>
                <?php if ($user['is_employee'] == 1) : ?>
                    <tr>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['is_employee'] ?></td>
                        <td><?= $user['is_admin'] ?></td>
                        <td>
                            <a href="<?= BASE_DIR ?>/administrateur/edit?id=<?= $user['id'] ?>" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <a href="<?= BASE_DIR ?>/administrateur/delete?id=<?= $user['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach; ?>
        </form>
    </tbody>
</table>