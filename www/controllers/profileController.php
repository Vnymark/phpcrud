<?php if (isset($_POST['save']) || isset($_POST['edit'])) {
    $errors = array();
    $_POST['firstname'] = trim($_POST['firstname']);
    $_POST['lastname'] = trim($_POST['lastname']);
    $_POST['email'] = trim($_POST['email']);

    if (empty($_POST['firstname']) || !isValidName($_POST['firstname'])) {
        $errors[] = 'Du måste ange ett giltigt förnamn!';
        $errors[] = 'Exempel: "Arne" eller "Klas-Göran"';
    }

    if (empty($_POST['lastname']) || !isValidName($_POST['lastname'])) {
        $errors[] = 'Du måste ange ett giltigt efternamn!';
        $errors[] = 'Exempel: "Pettersson" eller "Ekman-Larsson."';
    }

    if (empty($_POST['email']) || !isValidEmail($_POST['email'])) {
        $errors[] = 'Du måste ange en giltig e-postadress!';
        $errors[] = 'Exempel: "example@example.com".';
    }

    if (isset($_POST['ssn']) && !isValidSSN($_POST['ssn'])) {
        $errors[] = 'Du måste ange ett giltigt personnummer';
        $errors[] = '12 siffror - Födelseår mellan 1900-2018 är godkända.';
    }

    if (isset($_POST['phone']) && !isValidPhone($_POST['phone'])) {
        $errors[] = 'Du måste ange ett giltigt telefonnummer!';
        $errors[] = 'Åtta till 12 siffror, inklusive eventuellt landsnummer (+46).';
    }

    if (empty($errors)) {
        $profile = new classes\Profile();
        if (isset($_POST['id'])) {
            $profile->set('id', $_POST['id']);
        }
        $profile->set('firstname',$_POST['firstname']);
        $profile->set('lastname', $_POST['lastname']);
        $profile->set('email', $_POST['email']);
        if (isset($_POST['ssn'])) {
            $profile->set('ssn', $_POST['ssn']);
        }
        if (isset($_POST['phone'])) {
            $profile->set('phone', $_POST['phone']);
        }
        if (isset($_POST['id'])) {
            try {
                $profile->edit();
            } catch (Exception $e) {
                echo 'Could not edit the Profile:' . $e;
            }
            unset($_POST);

            //To be able to fetch the Profile that was being edited.
            $_POST['fetch'] = $profile->id;
            require 'profileController.php';
        } else {
            try {
                $profile->save();
            } catch (Exception $e) {
                echo 'Could not save the Profile:' . $e;
            }
            unset($_POST);
        }
    } else {
        printf('<p class="error">%s</p>', implode('<br />', $errors));
        // To be able to fetch the Profile we're editing in case of error.
        if (isset($_POST['id'])) {
            $_POST['edit'] = $_POST['id'];
        }
    }
}

else if (isset($_POST['delete'])) {
    $database = new classes\Database();
    try {
        $database->delete('profiles', intval($_POST['delete']));
    } catch (Exception $e){
        echo 'Could not delete the Profile:' . $e;
    }
}

else if (isset($_POST['fetch'])) {
    $database = new classes\Database();
    try {
        $p = $database->fetch('profiles', intval($_POST['fetch']));
    } catch (Exception $e) {
        echo 'Could not fetch the Profile:' . $e;
    }
}

if (isset($_POST['edit'])) {
    $database = new classes\Database();
    try {
        $p = $database->fetch('profiles', intval($_POST['edit']));
    } catch (Exception $e) {
        echo 'Could not fetch the Profile:' . $e;
    }
}

?>