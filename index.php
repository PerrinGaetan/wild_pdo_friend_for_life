<?php
require_once 'connec.php';

$pdo = new PDO(DNS, USERNAME, PWD);
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Friends</title>
</head>
<body>
    <h1>I'll be there for you</h1>

    <ul>
        <?php foreach ($friends as $friend) : ?>
            <li><?= $friend['firstname'] ?> : <?= $friend['lastname'] ?></li>
        <?php endforeach ?>
    </ul>

    <form class="form form-control container mt-4 " action="controlForm.php" method="post">
        <fieldset class="row">
            <legend>Rajouter des amis</legend>
            <label  class="col-10 gap-4 mx-auto mb-3" for="firstname">Your Firstname :
                <input class="col-8" type="text" name="firstname" id="firstname">
            </label>
            <label  class=" col-10 gap-4 mx-auto mb-3" for="lastname">Your Lastname :
                <input class="col-8" type="text" name="lastname" id="lastname">
            </label>
            <input class="btn btn-primary col-5 mx-auto" type="submit" value="Valider">
        </fieldset>
    </form>
</body>
</html>

