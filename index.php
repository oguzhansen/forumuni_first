<?php 

include "core.php";
include "widget.php";

?>

<div class="container">
    <div class="row">
        
        <?php 
            head();
            
            if(!isset($_SESSION["login"]))
            {
                logcontent($sorular);
            }
            else
            {
                content($yonetim);
            }

        ?>
        
    </div>
</div>

<?php

footer();

?>