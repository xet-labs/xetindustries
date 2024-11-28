<?php

if (!function_exists('toast')) {
    function toast($toastType, $toastMsg, $toastBtn = '', $toastBtnHref = '#')
    {
        session()->flash('toast', [
            'type' => $toastType,
            'description' => $toastMsg,
            'btnText' => $toastBtn,
            'btnHref' => $toastBtnHref
        ]);
    }
}
