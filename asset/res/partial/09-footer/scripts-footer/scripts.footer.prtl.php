<?php 
    use xet\Loc;
?>


<?= jslink('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js') ?>
<!-- <?= jslink('/res/lib/jquery/jquery-3.7.1.min.js') ?> -->

<?= empty($PAGE->jsClean) ? jslinkP(Loc::fileurl('JS', 'script')) : '' ?>

<!-- =============== Custom Libs =============== -->
<?php if (!empty($PAGE->jsInc)){ foreach ($PAGE->jsInc as $js_inc){ jslink($js_inc); }}; ?>