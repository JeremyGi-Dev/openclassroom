<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mini-chat</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<form action="minichat_post.php" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
        <label>Pseudo <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_COOKIE['pseudo'])) {echo htmlspecialchars($_COOKIE['pseudo']);} else {echo "";} ?>" class="form-control" /></label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <label>Message <input type="text" name="message" id="message" class="form-control" /></label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'lol');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_creation, \'%d/%m/%Y %Hh%imin%ss\') AS date FROM chat ORDER BY ID DESC LIMIT 0, 10');

?>
<div class="container">
    <h2>Mini Chat</h2>
    <p>Discutons jusqu'a la fin de la nuit !!</p>
    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Pseudo</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
<?php

while ($donnees = $reponse->fetch())
{
   // echo '<p>' . '[ ' .  . ' ]' . ' ' . '<strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
?>
      <tr>
        <td> <?= htmlspecialchars($donnees['date']); ?></td>
        <td><?= '<strong>' . htmlspecialchars($donnees['pseudo']); ?> </strong></td>
        <td><?= htmlspecialchars($donnees['message']); ?></td>
      </tr>

<?php } ?>

        </tbody>
    </table>
</div>

<?php $reponse->closeCursor(); ?>

</body>
</html>