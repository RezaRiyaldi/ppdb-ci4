<?php
if (session()->has('errors')) :
    if (is_array(session()->getFlashdata('errors'))) :
        foreach (session()->getFlashdata('errors') as $error) :
?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> <?= esc($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        endforeach;
    else :
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i> <?= esc(session()->getFlashdata('errors')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    endif;
elseif (session()->has('success')) :
    if (is_array(session()->getFlashdata('success'))) :
        foreach (session()->getFlashdata('success') as $success) :
        ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?= esc($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        endforeach;
    else :
        ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <?= esc(session()->getFlashdata('success')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    endif;
endif;
?>