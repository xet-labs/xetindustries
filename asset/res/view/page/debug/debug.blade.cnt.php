<?php
use App\Models\User; 
use xet\Loc;

echo "<pre style=\"margin-top:2rem;font-size:13.5px;color:var(--colr)\">";

$data = session()->all();
var_dump(session()->all());

echo User::all();


$callFile = debug_backtrace()[0]['file'];
$callBy = basename($callFile); $callDir = dirname($callFile);
    
echo (var_dump($callFile));
echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
var_dump(Loc::pathurl());
echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
var_dump(Loc::path());
echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
var_dump(Loc::fileurl());
echo "\n\n--=--=--=--=--=--=--=--=--=--=--=--=--=--=--\n\n";
var_dump(Loc::file());
    
echo "</pre>";
?>