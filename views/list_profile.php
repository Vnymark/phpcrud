<div id="content">
    <div class="row justify-content-md-center">
        <div class="col-md-auto center">
            <?php require_once __DIR__ . '/../includes/functions.php'; ?>
            <?php require __DIR__ . '/../controllers/profileController.php'; ?>
            <?php

            /**
             * @throws Exception
             * Can send order by as second paramenter to fetchAll().
             * Example: '`firstname` ASC'.
             */
            try {
                $profile = new classes\Profile();
                $profiles = $profile->fetchAll('profiles');
            } catch (\Exception $e) {
                echo 'Error fetching all Profiles: ' . $e;
            } ?>
            <h1>Lista profiler</h1>
            <div class="table-responsive-lg">
                <form action="index.php" method="POST">
                    <table class="table">
                        <tr class="title">
                            <td>Förnamn</td>
                            <td>Efternamn</td>
                            <td>E-postadress</td>
                            <td>Telefonnummer</td>
                            <td>Personnummer</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php if (isset($profiles)): ?>
                            <?php foreach ($profiles as $p): ?>
                            <tr>
                                <td><?php echo $p->firstname; ?></td>
                                <td><?php echo $p->lastname; ?></td>
                                <td><?php echo $p->email; ?></td>
                                <td><?php echo $p->phone; ?></td>
                                <td><?php echo $p->ssn; ?></td>
                                <td><button type="submit" name="fetch" value="<?php echo $p->id; ?>"><i class="fas fa-pen"></i></button></button></td>
                                <td><button type="submit" name="delete" value="<?php echo $p->id; ?>"><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>