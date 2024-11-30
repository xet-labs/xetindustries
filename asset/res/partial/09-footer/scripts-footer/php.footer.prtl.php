<?php
use Illuminate\Support\Facades\Request;

// Calculate execution time
$execTime = microtime(true) - $GLOBALS['startT'];
$formattedTime = number_format($execTime, 5);

// Log execution time
\Log::info('Exec Time: ' . $formattedTime);

// Correct way to append the 'execTime' parameter and redirect
return redirect()->to(Request::fullUrlWithQuery(['execTime' => $formattedTime]));
