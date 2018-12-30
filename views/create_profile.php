<div class="inner-content">
    <div class="row justify-content-md-center">
        <div class="col-md-auto center">
                <h1>Profilinformation</h1>
                <div class="col-md-auto center">
                    <form action="index.php" method="POST">
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
                            <input type="text" name="email" id="email" required="required" placeholder="example@example.com"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="ssn"><?php echo 'Personnummer'; ?></label><br/>
                            <input type="text" name="ssn" id="ssn" minlength="12" maxlength="12" placeholder="ÅÅÅÅMMDDXXXX"
                                   value="<?php echo isset($_POST['ssn']) ? htmlspecialchars($_POST['ssn']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="phone"><?php echo 'Telefonnummer'; ?></label><br/>
                            <input type="tel" name="phone" id="phone" maxlength="12" placeholder="+46762621337"
                                   value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"/>
                        </p>
                        <div>
                            <button type="submit" name="cancel" value="1" class="btn btn-danger">Avbryt</button>
                            <button type="submit" name="save" value="1" class="btn btn-success">Skapa</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>