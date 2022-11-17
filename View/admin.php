<?php

require_once('../index.php');
require_once('../Model/User.php');
require_once('../Model/UserManager.php');
require_once('../Model/pdo.php');


$userManager = new UserManager($pdo);
$allUser = $userManager->getAllUsers();
// $updateUser = $userManager->updateUser();
// $deleteUser = $userManager->deleteUser();
// $getUserId = $userManager->getUserById($id);


?>

<h1 class="text-center">Gestion des membres</h1>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Tel</th>
            <th class="text-center">Email</th>
            <th class="text-center">Update</th>    
            <th class="text-center">Delete</th>
        </tr>
            <?php while ($row = $allUser->fetch(PDO::FETCH_ASSOC)) {?> 
            <tr>
                <td class="text-center"> <?php echo $row["nom"]; ?></td>
                <td class="text-center"> <?php echo $row["prenom"]; ?></td>
                <td class="text-center"> <?php echo $row["tel"]; ?></td>
                <td class="text-center"> <?php echo $row["email"]; ?></td>
            </tr>
            <?php } ?>
    </table>
</div>


