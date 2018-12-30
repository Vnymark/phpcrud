<div id="content">
    <div class="row justify-content-md-center">
        <div class="col-md-auto center">
            <?php require_once __DIR__ . '/../includes/functions.php'; ?>
            <?php

            /**
             * @throws Exception
             */
            try {
                $profile = new classes\Profile();
                $profiles = $profile->fetchAll('profiles', '`firstname` ASC');
            } catch (\Exception $e) {
                echo 'Error fetching all Profiles: ' . $e;
            } ?>

            <table class="table">
                <tr class="title">
                    <td>Förnamn</td>
                    <td>Efternamn</td>
                    <td>E-postadress</td>
                    <td>Telefonnummer</td>
                    <td>Personnummer</td>
                </tr>
                <?php foreach ($profiles as $p): ?>
                <tr>
                    <td><?php echo $p->firstname; ?></td>
                    <td><?php echo $p->lastname; ?></td>
                    <td><?php echo $p->email; ?></td>
                    <td><?php echo $p->phone; ?></td>
                    <td><?php echo $p->ssn; ?></td>
                </tr>
                <?php endforeach;?>
            </table>


        </div>
    </div>
</div>