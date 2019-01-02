<div id="content">
    <?php require_once __DIR__ . '/../includes/functions.php'; ?>
    <?php require __DIR__ . '/../controllers/profileController.php'; ?>
    <div class="row justify-content-md-center">
        <div class="col-md-auto center">
            <h1>Ändra profil</h1>
            <div class="col-md-auto center">
                <?php if (!isset($p) || empty($p)): ?>
                    <?php printf('<p class="error">Profilen kunde ej laddas!</p>'); ?>
                <?php else: ?>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="id" id="id" required="required"
                               value="<?php echo isset($p['id']) ? intval($p['id']) : ''; ?>"/>
                        <p>
                            <label for="firstname"><?php echo 'Förnamn'; ?></label><br/>
                            <input type="text" name="firstname" id="firstname" minlength="2" required="required"
                                   value="<?php echo isset($p['firstname']) ? htmlspecialchars($p['firstname']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="lastname"><?php echo 'Efternamn'; ?></label><br/>
                            <input type="text" name="lastname" id="lastname" minlength="2" required="required"
                                   value="<?php echo isset($p['lastname']) ? htmlspecialchars($p['lastname']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="email"><?php echo 'E-postadress'; ?></label><br/>
                            <input type="text" name="email" id="email" required="required" placeholder="example@example.com"
                                   value="<?php echo isset($p['email']) ? htmlspecialchars($p['email']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="ssn"><?php echo 'Personnummer'; ?></label><br/>
                            <input type="text" name="ssn" id="ssn" minlength="12" maxlength="12" placeholder="ÅÅÅÅMMDDXXXX"
                                   value="<?php echo isset($p['ssn']) ? htmlspecialchars($p['ssn']) : ''; ?>"/>
                        </p>
                        <p>
                            <label for="phone"><?php echo 'Telefonnummer'; ?></label><br/>
                            <input type="tel" name="phone" id="phone" maxlength="12" placeholder="+46762621337"
                                   value="<?php echo isset($p['phone']) ? htmlspecialchars($p['phone']) : ''; ?>"/>
                        </p>
                        <div>
                            <button type="submit" name="cancel" value="1" class="btn btn-danger">Avbryt</button>
                            <button type="submit" name="edit" value="1" class="btn btn-success">Spara</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>