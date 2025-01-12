<?php 
    use xet\Loc;
?>

<link rel="preload" href="/res/lib/jquery/jquery-3.7.1.min.js" as="script">
<script defer src="/res/lib/jquery/jquery-3.7.1.min.js"></script>

<?php if (empty($PAGE->jsClean)): ?>
    <script src="<?php echo Loc::fileurl('JS', 'script'); ?>" defer></script>
<?php endif; ?>


<!-- =============== Custom Libs =============== -->
<?php if (!empty($PAGE->jsInc)){ foreach ($PAGE->jsInc as $js_inc){ ?>
    <script src="<?= asset($js_inc) ?>" defer></script>
<?php }}; ?>