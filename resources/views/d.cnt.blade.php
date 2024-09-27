{{ csrf_token() }}
<?php
use xet\Loc;

echo "<pre style=\"margin-top:2rem;font-size:13.5px;color:var(--colr)\">";
$callFile = debug_backtrace()[2];

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