<?php require('database.php');
//on appelle notre fichier de config
$id= null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("location:index.php");
} else {
    //on lance la connection et la requete
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) . $sql = "SELECT * FROM microservices where microservice_id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('./inc/header.php');
    ?>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Edition</h3>
            </div>

            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Microservice id</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['microservice_id']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Titre</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['titre']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Auteur</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['auteur']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Contenu</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['contenu']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">prix</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['prix']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Categorie ID</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['categorie_id']; ?>
                        </label>
                    </div>
                </div>$
                <div class="control-group">
                    <label class="control-label">Images</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['images']; ?>
                        </label>
                    </div>
                </div>
                <!-- <div class="control-group">
                    <label class="control-label">Url</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['url']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Comment</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['comment']; ?>
                        </label>
                    </div>
                </div> -->
                <div class="form-actions">
                    <a class="btn" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>