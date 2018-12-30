<?php require __DIR__ . '/templates/top.php'; ?>

<div class="container">
    <div class="content-header">
        <h1>Profilinformation</h1>
    </div>
    <div class="inner-content">
        <form action="index.php" method="POST">
            <?php if (isset($_POST['save'])) {
                $errors = array();
                $_POST['firstname'] = trim($_POST['firstname']);
                $_POST['lastname'] = trim($_POST['lastname']);
                $_POST['email'] = trim($_POST['email']);

                if (empty($_POST['firstname']) || !isValidName($_POST['firstname'])) {
                    $errors[] = 'Du måste ange förnamn';
                }

                if (empty($_POST['lastname']) || !isValidName($_POST['lastname'])) {
                    $errors[] = 'Du måste ange efternamn';
                }

                if (empty($_POST['email']) || !isValidEmail($_POST['email'])) {
                    $errors[] = 'Du måste ange en korrekt e-postadress';
                }

                if (isset($_POST['ssn']) && !isValidSSN($_POST['ssn'])) {
                    $errors[] = 'Du måste ange ett korrekt personnummer';
                }

                if (isset($_POST['phone']) && !isValidPhone($_POST['phone'])) {
                    $errors[] = 'Du måste ange ett korrekt telefonnummer';
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
            <p>
                <label for="firstname"><?php echo 'Förnamn'; ?></label><br/>
                <input type="text" name="firstname" id="firstname" minlength="2" required="required"
                       value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"/>
            </p>
            <p>
                <label for="lastname"><?php echo 'Efternamn'; ?></label><br/>
                <input type="text" name="lastname" id="lastname" minlength="2" required="required"
                       value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"/>
            </p>
            <p>
                <label for="email"><?php echo 'E-postadress'; ?></label><br/>
                <input type="text" name="email" id="email" required="required"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
            </p>
            <p>
                <label for="ssn"><?php echo 'Personnummer (exempel: ÅÅÅÅMMDDXXXX)'; ?></label><br/>
                <input type="text" name="ssn" id="ssn" minlength="12" maxlength="12"
                       value="<?php echo isset($_POST['ssn']) ? htmlspecialchars($_POST['ssn']) : ''; ?>"/>
            </p>
            <p>
                <label for="phone"><?php echo 'Telefonnummer'; ?></label><br/>
                <input type="tel" name="phone" id="phone" maxlength="10"
                       value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"/>
            </p>
            <button type="submit" name="cancel" value="1" class="btn btn-danger">&nbsp;
                Avbryt
            </button>
            <button type="submit" name="save" value="1" class="btn btn-success">&nbsp;
                Skapa
            </button>
        </form>
    </div>
</div>
