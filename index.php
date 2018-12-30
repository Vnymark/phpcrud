<?php include 'templates/top.php'; ?>
<div class="container">
    <div id="main_content">
        <?php
        require_once 'includes/functions.php';

        if(isset($_POST['delete'])){
            require_once 'views/list_profile.php';
        } else {
            require_once 'views/create_profile.php';
        }
        ?>
    </div>
</div>