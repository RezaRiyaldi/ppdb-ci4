<?= $this->extend('layout_dashboard'); ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="my-3">Nama Nama Siswa Yang Di Terima</h3>
        <a href="<?= base_url() ?>students/export" class="btn btn-success my-auto"><i class="fas fa-download"></i> Cetak Laporan</a>
    </div>
    <div class="card-body">
        <!-- <input type="text" placeholder="Cari siswa.." class="form-control w-50 mb-3" id="cariSiswa"> -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (count($students) > 0) :
                        foreach ($students as $student) :
                    ?>
                            <tr>
                                <td><?= $index++ ?></td>
                                <td><?= $student->no_induk_siswa ?></td>
                                <td><?= $student->form_fullname ?></td>
                                <td><?= $student->form_gender ?></td>
                                <td><?= $student->created_at ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>

            <div class="pagination">
                <?= $pager->links('students', 'custom_pager') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('script') ?>
<script>
    // let typingTimer;
    // const delay = 1000;

    // function executeAfterTyping(text) {
    //     $.ajax({
    //         url: "<?= base_url() ?>get-students-ajax",
    //         data: {
    //             keyword: text
    //         },
    //         method: 'get',
    //         dataType: 'JSON',
    //         success: function(result) {
    //             console.log(result)
    //         }
    //     })
    // }

    // $('#cariSiswa').on('input', function() {
    //     clearTimeout(typingTimer);

    //     var input = $(this).val()
    //     typingTimer = setTimeout(function() {
    //         executeAfterTyping(input);
    //     }, delay);
    // });
</script>
<?= $this->endSection('script') ?>