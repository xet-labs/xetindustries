<?php //include_once("../asset/php/conf/config.php"); ?>

<?php include_once($FILE['PRTL']['head']); ?>


<title>Debug</title>

</head>


<body>

    <pre>
        <?php
            echo "\n";
            echo "\n$requestUri";
            echo "\n$uri";
            echo "\nFile dir: " . __DIR__;
            echo "\nCall dir: " . _dir_;
            echo "\nCall file: " . $_SERVER['SCRIPT_FILENAME'];
            echo "\nRelative path: " . $_SERVER['PHP_SELF'];
            echo "\n";

            // var_dump($DIR, $DIR_url);
            // echo "\n-----------------------------------\n";
            var_dump($PATH, $PATH_url);
            echo "\n-----------------------------------\n";
            var_dump($FILE,$FILE_url); 
        ?>
    </pre>


    <!-- nav -->
    <?php include_once($FILE['PRTL']['nav']); ?>


    <!-- Main wrapper -->
    <main class="main-wrap">

        <h1 class="nodis">

        </h1>
        <p class="nodis">

        </p>

        <!-- loading-anim  -->
        <div class="bouncy-loader">
            <div></div>
            <div></div>
            <div></div>
        </div>


    </main>



    <!-- Footer -->
    <?php include_once($FILE['PRTL']['footer']) ?>


</body>

</html>