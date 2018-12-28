<?php require('templates/top.php');
use classes\Profile;
use classes\Database;
require 'includes/functions.php';
$object = new Database();
$conn = $object->connect();
?>

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

                if (empty($_POST['firstname'] || !isValidName($_POST['firstname']))) {
                    $errors[] = 'Du måste ange förnamn';
                }

                if (empty($_POST['lastname']) || !isValidName($_POST['lastname'])) {
                    $errors[] = 'Du måste ange efternamn';
                }

                if (empty($_POST['email']) || !isValidEmail($_POST['email'])) {
                    $errors[] = 'Du måste ange en korrekt e-postadress';
                }

                if (empty($errors)) {
                    $profile = new Profile($conn);
                    $profile->set('firstname',$_POST['firstname']);
                    $profile->set('lastname', $_POST['lastname']);
                    $profile->set('email', $_POST['email']);
                    if (isset($_POST['ssn']) && $_POST['ssn'] !== null && isValidSSN($_POST['ssn'])) {
                        $profile->set('ssn', $_POST['ssn']);
                    }
                    if (isset($_POST['phone']) && $_POST['phone'] !== null) {
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
                <label for="firstname"><?php echo utf8_encode('Förnamn'); ?></label><br/>
                <input type="text" name="firstname" id="firstname" required="required"
                       value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"/>
            </p>
            <p>
                <label for="lastname"><?php echo utf8_encode('Efternamn'); ?></label><br/>
                <input type="text" name="lastname" id="lastname" required="required"
                       value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"/>
            </p>
            <p>
                <label for="email"><?php echo utf8_encode('E-postadress'); ?></label><br/>
                <input type="text" name="email" id="email" required="required"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
            </p>
            <p>
                <label for="ssn"><?php echo utf8_encode('Personnummer (exempel: ÅÅMMDDXXXX):'); ?></label><br/>
                <input type="text" id="ssn" name="ssn" maxlength="10"
                       value="<?php echo isset($_POST['ssn']) ? htmlspecialchars($_POST['ssn']) : ''; ?>"/>
            </p>
            <p>
                <label for="phone"><?php echo utf8_encode('Telefonnummer'); ?></label><br/>
                <input type="tel" id="phone"
                       value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                       name="phone"/>
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
