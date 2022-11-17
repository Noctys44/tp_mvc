<?php

require_once('../index.php');
require_once('../Model/User.php');
require_once('../Model/UserManager.php');
require_once('../Model/pdo.php');

// require_once('../Controller/autoload.php');

$manager = new UserManager($pdo);

if($_POST)
{
    $user = new User(
        [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'tel' => $_POST['tel'],
            'email' => $_POST['email']
        ]
        );

        if($user->isUserValid())
        {
            $manager->insertUser($user);
            $success = '<div class="alert alert-success" role="alert">L\'utilisateur a bien été enregistré</div>';
        } else {
            $erreurs = $user->getErreurs();
        }
}

?>


<h1 class="text-center fw-bold dislay-3 text-info">Inscription</h1>

<?php if(isset($message)) echo $success; ?>

<form action="" method="POST">
    <div class="container">
    
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom">
        <div id="nom" class="form-text">
            <?php if(isset($erreurs) && in_array(User::NOM_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
            ?>
        </div>

        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom">
            <?php if(isset($erreurs) && in_array(User::PRENOM_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
            ?>

        <label for="tel" class="form-label">Tel</label>
        <input type="text" class="form-control" name="tel" id="tel">
            <?php if(isset($erreurs) && in_array(User::TEL_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
            ?>

        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
            <?php if(isset($erreurs) && in_array(User::EMAIL_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le nom est invalide </div>';
            ?>

        <input type="submit" class="btn btn-outline-primary btn-lg mt-2" value="S'inscrire">
    </div>
</form>

</body>
</html>
