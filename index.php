<?php require_once('templates/top.php');?>

<div class="container">
    <div class="content-header">
        <h1>Profilinformation</h1>
    </div>
    <div class="inner-content">
        <form action="index.php" method="POST">
            <p>
                <label for="firstname">Förnamn</label><br/>
                <input type="text" name="firstname" id="firstname" required="required"
                       value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"/>
            </p>
            <p>
                <label for="lastname">Efternamn</label><br/>
                <input type="text" name="lastname" id="lastname" required="required"
                       value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"/>
            </p>
            <p>
                <label for="email">E-postadress</label><br/>
                <input type="text" name="email" id="email" required="required"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
            </p>
            <p>
                <label for="ssn">Personnummer (exempel: ÅÅMMDDXXXX):</label><br/>
                <input type="text" id="ssn" name="ssn" maxlength="10"
                       value="<?php echo isset($_POST['ssn']) ? htmlspecialchars($_POST['ssn']) : ''; ?>"/>
            </p>
            <p>
                <label for="phone">Telefonnummer</label><br/>
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
