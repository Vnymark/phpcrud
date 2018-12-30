<?php

/**
 * @throws Exception
 */
try {
    $profile = new classes\Profile();
    $profiles = $profile->fetchAll('profiles', '`firstname` ASC');
} catch (\Exception $e) {
    echo 'Error fetching all Profiles: ' . $e;
}
foreach ($profiles as $p){
    echo '</br>' . $p->id;

}

;?>