<?php

if (!function_exists('toast')) {
    function toast($toastType, $toastMsg, $toastBtn = '', $toastBtnHref = '#')
    {
        session()->flash('toast', [
            'type' => $toastType,          // e.g., success, error, warning
            'description' => $toastMsg,    // Main toast message
            'btnText' => $toastBtn,        // Button text, default empty if not provided
            'btnHref' => $toastBtnHref     // Button href, default to # if not provided
        ]);
    }
}
