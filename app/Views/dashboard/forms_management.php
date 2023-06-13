<?= $this->extend('layout_dashboard'); ?>

<?= $this->section('content'); ?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link <?= isset($get['tab']) && $get['tab'] == 1 ? "" : "active" ?>" id="unverified-tab" data-bs-toggle="pill" data-bs-target="#unverified-home" type="button" role="tab" aria-controls="unverified-home" aria-selected="true">Unverified</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link <?= isset($get['tab']) && $get['tab'] == 1 ? "active" : "" ?>" id="verified-tab" data-bs-toggle="pill" data-bs-target="#verified-home" type="button" role="tab" aria-controls="verified-home" aria-selected="false">Verified</button>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade <?= isset($get['tab']) && $get['tab'] == 1 ? "" : "show active" ?>" id="unverified-home" role="tabpanel" aria-labelledby="unverified-tab">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status Formulir</th>
                        <th>No Registrasi</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Waktu Daftar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($forms) > 1) :
                        $no = 1;
                        foreach ($forms as $form) :
                            if ($form->form_status_id == 1) :
                    ?>
                                <tr>
                                    <td class="align-middle"><?= $no++ ?></td>
                                    <td class="align-middle"><span class="badge bg-<?= $form->form_status_id == 2 ? "success" : "danger" ?>"><?= $form->form_status ?></span></td>
                                    <td class="align-middle"><?= $form->form_no_register ?></td>
                                    <td class="align-middle"><?= $form->form_fullname ?></td>
                                    <td class="align-middle"><?= $form->form_callname ?? "-" ?></td>
                                    <td class="align-middle"><?= date('d M Y, H:i:s', strtotime($form->created_at)) ?> WIB</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url() ?>forms/detail/<?= $form->user_id ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Formulir">
                                                <i class="fas fa-list"></i>
                                            </a>
                                            <?php if ($form->form_status_id == 1) : ?>
                                                <a href="<?= base_url() ?>forms/acc/<?= $form->user_id ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Setujui Formulir">
                                                    <i class="fas fa-check"></i>
                                                </a>
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
    </div>
    <div class="tab-pane fade <?= isset($get['tab']) && $get['tab'] == 1 ? "show active" : "" ?>" id="verified-home" role="tabpanel" aria-labelledby="verified-tab">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status Formulir</th>
                        <th>No Registrasi</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Waktu Daftar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($forms) > 1) :
                        $no = 1;
                        foreach ($forms as $form) :
                            if ($form->form_status_id == 2) :
                    ?>
                                <tr>
                                    <td class="align-middle"><?= $no++ ?></td>
                                    <td class="align-middle"><span class="badge bg-<?= $form->form_status_id == 2 ? "success" : "danger" ?>"><?= $form->form_status ?></span></td>
                                    <td class="align-middle"><?= $form->form_no_register ?></td>
                                    <td class="align-middle"><?= $form->form_fullname ?></td>
                                    <td class="align-middle"><?= $form->form_callname ?? "-" ?></td>
                                    <td class="align-middle"><?= date('d M Y, H:i:s', strtotime($form->created_at)) ?> WIB</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url() ?>forms/detail/<?= $form->user_id ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Formulir">
                                                <i class="fas fa-list"></i>
                                            </a>
                                            <?php if ($form->form_status_id == 1) : ?>
                                                <a href="<?= base_url() ?>forms/acc/<?= $form->user_id ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Setujui Formulir">
                                                    <i class="fas fa-check"></i>
                                                </a>
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
    </div>
</div>
<?= $this->endSection('content'); ?>