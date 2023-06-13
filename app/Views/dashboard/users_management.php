<?= $this->extend('layout_dashboard'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col">
        <?= $this->include('components/guest/_alerts'); ?>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addUser">
                + User
            </button>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= isset($get['tab']) && $get['tab'] == 1 ? "" : "active" ?>" id="admin-tab" data-bs-toggle="pill" data-bs-target="#admin-home" type="button" role="tab" aria-controls="admin-home" aria-selected="true">Admins</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= isset($get['tab']) && $get['tab'] == 1 ? "active" : "" ?>" id="users-tab" data-bs-toggle="pill" data-bs-target="#users-home" type="button" role="tab" aria-controls="users-home" aria-selected="false">Siswa</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade <?= isset($get['tab']) && $get['tab'] == 1 ? "" : "show active" ?>" id="admin-home" role="tabpanel" aria-labelledby="admin-tab">
                <table class="table table-hover table-striped">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($users) > 0) : ?>
                            <?php
                            $no = 1;
                            foreach ($users as $user) :
                            ?>
                                <?php if ($user->role_id == 1) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle"><?= $user->username ?></td>
                                        <td class="align-middle"><?= $user->fullname ?></td>
                                        <td class="align-middle"><?= $user->email ?></td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?= base_url() ?>users/edit/<?= $user->user_id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <?php if ($user->user_id != session()->get('user')->user_id) : ?>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="deleteUser(<?= $user->user_id ?>, '<?= $user->fullname ?>')"><i class="fas fa-trash"></i></button>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade <?= isset($get['tab']) && $get['tab'] == 1 ? "show active" : "" ?>" id="users-home" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-hover table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($users) > 0) :
                            $no = 1;
                            foreach ($users as $user) :
                                if ($user->role_id == 2) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle"><?= $user->username ?></td>
                                        <td class="align-middle"><?= $user->fullname ?></td>
                                        <td class="align-middle"><?= $user->email ?></td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?= base_url() ?>users/edit/<?= $user->user_id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser" onclick="deleteUser(<?= $user->user_id ?>, '<?= $user->fullname ?>')"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>users/add" method="post">
                <div class="modal-body">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan username">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fullname</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Masukan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">+ User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModal">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>

<?= $this->section('script'); ?>
<script>
    function deleteUser(id, user) {
        $("#deleteUser .modal-body").text("Yakin ingin menghapus " + user);
        $("#deleteUser a").attr("href", "<?= base_url() ?>users/delete/" + id + "?tab=1");
    }
</script>
<?= $this->endSection('script'); ?>