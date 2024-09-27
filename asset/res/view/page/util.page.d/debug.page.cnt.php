<?php
use xet\Loc;
echo "<pre style=\"margin-top:2rem;font-size:13.5px;color:var(--colr)\">";
    
echo (Loc::path('pubic'))."/blog/blog.page.php";
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