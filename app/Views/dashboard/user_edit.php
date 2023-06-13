<?= $this->extend('layout_dashboard'); ?>

<?= $this->section('content') ?>
<form action="<?= base_url() ?>users/edit/<?= $user->user_id ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukan username" value="<?= $user->username ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fullname</label>
        <input type="text" class="form-control" name="fullname" placeholder="Masukan nama lengkap" value="<?= $user->fullname ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Masukan email" value="<?= $user->email ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukan password">
        <small class="text-warning">Kosongkan apabila tidak ingin mengganti password</small>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <select name="role" id="" class="form-select">
            <?php foreach ($roles as $role) : ?>
                <option value="<?= $role->role_id ?>" <?= $role->role_id == $user->role_id ? "selected" : "" ?>><?= $role->role ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success w-100">+ User</button>
</form>
<?= $this->endSection('content') ?>