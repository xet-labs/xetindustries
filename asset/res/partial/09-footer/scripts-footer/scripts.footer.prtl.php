<?php 
    use xet\Loc;
?>


<!-- =============== Libs =============== -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="/res/lib/jquery/jquery-3.7.1.min.js" defer></script>

<?php if (file_exists('asset/js/xscript.js')){ ?>
    <script src="asset/js/xscript.js" defer></script>
<?php } ?>

<?php if (empty($Page['jsClean'])): ?>
    <script src="<?php echo Loc::fileurl('JS', 'script'); ?>" defer></script>
<?php endif; ?>


<!-- =============== Local Libs =============== -->
<?php
$currentDir = str_replace(public_path(), '', $callDir);
if (file_exists(public_path($currentDir . '/asset/js/script.js'))){ ?>
    <script src="<?= asset("/{$currentDir}/asset/js/script.js") ?>" defer></script>
<?php } ?>


<!-- =============== Custom Libs =============== -->
<?php if (isset($Page['jsFiles'])): foreach ($Page['jsFiles'] as $jsFile): ?>
    <script src="<?= asset($jsFile) ?>" defer></script>
<?php endforeach; endif; ?>


<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSG89CVQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager -->


<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

