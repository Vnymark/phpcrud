<?php if (isset($_POST['save'])) {
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
        $profile->set('firstname',$_POST['firstname']);
        $profile->set('lastname', $_POST['lastname']);
        $profile->set('email', $_POST['email']);
        if (isset($_POST['ssn'])) {
            $profile->set('ssn', $_POST['ssn']);
        }
        if (isset($_POST['phone'])) {
            $profile->set('phone', $_POST['phone']);
        }

        $profile->save();
        unset($_POST);
    } else {
        printf('<p class="error">%s</p>', implode('<br />', $errors));
    }
}
?>