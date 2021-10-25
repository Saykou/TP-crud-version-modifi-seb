<?php require 'database.php';
$id = null;
if (!empty($_GET['microservice_id'])) {
    $microservice_id = $_REQUEST['microservice_id'];
}
if (null == $id) {
    header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // on initialise nos erreurs
    $microservice_idError = null;
    $titreError = null;
    $auteurError = null;
    $contenueError = null;
    $prixError = null;
    $categorie_idError = null;
    $imageError = null;
    // $commentError = null;
    // $metierError = null;
    // $urlError = null;


    // On assigne nos valeurs
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $contenu = $_POST['contenu'];
    $prix = $_POST['prix'];
    $categorie_id = $_POST['categorie_id'];
    $image = $_POST['image'];
    // $pays = $_POST['pays'];
    // $comment = $_POST['comment'];
    // $metier = $_POST['metier'];
    // $url = $_POST['url'];
    // On verifie que les champs sont remplis 
    $valid = true;
    if (empty($titre)) {
        $titreError = 'Please enter Titre';
        $valid = false;
    }
    if (empty($auteur)) {
        $auteurError = 'Please enter auteur';
        $valid = false;
    }
    if (empty($contenu)) {
        $contenuError = 'Please enter contenu ';
        $valid = false;
    } 
    if (empty($prix)) {
        $prixError = 'Please enter your prix';
        $valid = false;
    }
    if (empty($categorie_id)) {
        $categorie_idError = 'Please enter phone';
        $valid = false;
    }
    if (empty($image)) {
        $imageError = 'Please entré une image';
        $valid = false;
    }
    // if (!isset($pays)) {
    //     $paysError = 'Please select a country';
    //     $valid = false;
    // }
    // if (empty($comment)) {
    //     $commentError = 'Please enter a description';
    //     $valid = false;
    // }
    // if (!isset($metier)) {
    //     $metierError = 'Please select a job';
    //     $valid = false;
    // }
    // if (empty($url)) {
    //     $urlError = 'Please enter website url';
    //     $valid = false;
    // }
     // mise à jour des donnés
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE microservices SET microservice_id = ?,titre = ?,auteur = ?,contenu = ?, prix = ?, categorie_id = ?, images = ? WHERE microservice_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($titre, $auteur, $contenu, $prix, $categorie_id,$microservice_id,$images));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM microservices where microservice_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $titre = $data['titre'];
    $auteur = $data['auteur'];
    $contenu = $data['contenu'];
    $prix = $data['prix'];
    $categorie_id = $data['categorie_id'];
    $images = $data['images'];
    // $pays = $data['pays'];
    // $comment = $data['comment'];
    // $metier = $data['metier'];
    // $url = $data['url'];
    Database::disconnect();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud-Update</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Modifier un contact</h3>
        </div>
        <form method="post" action="update.php?id=<?php echo $microservice_id; ?>">
            <div class="control-group <?php echo !empty($titreError) ? 'error' : ''; ?>">
                <label class="control-label">Titre</label>
                <div class="controls">
                    <input name="titre" type="text" placeholder="titre" value="<?php echo !empty($titre) ? $titre : ''; ?>">
                    <?php if (!empty($titreError)) : ?>
                        <span class="help-inline"><?php echo $titreError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($auteurError) ? 'error' : ''; ?>">
                <label class="control-label">Auteur</label>
                <div class="controls">
                    <input type="text" name="auteur" value="<?php echo !empty($auteur) ? $auteur : ''; ?>">
                    <?php if (!empty($auteurError)) : ?>
                        <span class="help-inline"><?php echo $auteurError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($contenuError) ? 'error' : ''; ?>">
                <label class="control-label">contenu</label>
                <div class="controls">
                    <input type="text" name="contenu" value="<?php echo !empty($contenu) ? $age : ''; ?>">
                    <?php if (!empty($contenuError)) : ?>
                        <span class="help-inline"><?php echo $contenuError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($prixError) ? 'error' : ''; ?>">
                <label class="control-label">prix </label>
                <div class="controls">
                    <input name="prix" type="text" placeholder="prix" value="<?php echo !empty($prix) ? $prix : ''; ?>">
                    <?php if (!empty($prixError)) : ?>
                        <span class="help-inline"><?php echo $prixError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($categorie_idError) ? 'error' : ''; ?>">
                <label class="control-label">categorie id</label>
                <div class="controls">
                    <input name="categorie_id" type="text"  value="<?php echo !empty($categorie_id) ? $categorie_id : ''; ?>">
                    <?php if (!empty($categorie_idError)) : ?>
                        <span class="help-inline"><?php echo $categorie_idError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($imagesError) ? 'error' : ''; ?>">
                <label class="control-label">images</label>
                <div class="controls">
                    <input name="images" type="text"  value="<?php echo !empty($images) ? $images : ''; ?>">
                    <?php if (!empty($imagesError)) : ?>
                        <span class="help-inline"><?php echo $imagesError; ?></span>
                    <?php endif; ?>
                </div>
            </div>


            <!-- <div class="control-group<?php echo !empty($paysError) ? 'error' : ''; ?>">
                <select name="pays">
                    <option value="paris">Paris</option>
                    <option value="londres">Londres</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
                <?php if (!empty($paysError)) : ?>
                    <span class="help-inline"><?php echo $paysError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group<?php echo !empty($metierError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">Metier</label>
                <div class="controls">
                    Dev : <input type="checkbox" name="metier" value="dev" <?php if (isset($metier) && $metier == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="metier" value="integrateur" <?php if (isset($metier) && $metier == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="metier" value="reseau" <?php if (isset($metier) && $metier == "reseau") echo "checked"; ?>>
                </div>
                <?php if (!empty($metierError)) : ?>
                    <span class="help-inline"><?php echo $metierError; ?></span>
                <?php endif; ?>
            </div>
            <div class="control-group  <?php echo !empty($urlError) ? 'error' : ''; ?>">
                <label class="control-label">Siteweb</label>
                <div class="controls">
                    <input type="text" name="url" value="<?php echo !empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)) : ?>
                        <span class="help-inline"><?php echo $urlError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                <label class="control-label">Commentaire </label>
                <div class="controls">
                    <textarea rows="4" cols="30" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)) : ?>
                        <span class="help-inline"><?php echo $commentError; ?></span>
                    <?php endif; ?>
                </div>
            </div> -->
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="index.php">Retour</a>
            </div>
        </form>
    </div>
</body>

</html>