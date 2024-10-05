<?php
    function setToast($toastType, $toastMsg, $toastBtn = null, $toastHref = null) {
        $_SESSION['toast'] = [
            'description' => $description,
            'buttonText' => $buttonText,
            'buttonHref' => $buttonHref
        ];
    }


    $toast = isset($_SESSION['toast']) ? $_SESSION['toast'] : null;
?>


<div class="toast-wrap">
    <figure class="toast">
        <div class="toast_body">
            <div class="toast_description">
                <div class="toast_icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>
                <!-- <p> -->
                    <?php echo $toastDesc;?>
                <!-- </p> -->
            </div>
            <?php if ($toastBtn != NULL || $toastBtn != ""){ ?>
                <button class="toast_btn">
                    <a href="<?php echo $toastBhref; ?>">
                        <?php echo $toastBtn; ?>
                    </a>
                </button>
            <?php } ?>
        </div>
        <div class="toast_progress"></div>
    </figure>
    <?php $toastDesc=$toastBtn=$toastBhref=NULL; ?>
</div>
