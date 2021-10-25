   <?php require 'database.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        //on initialise nos messages d'erreurs;
        $titreError = '';
        $auteurError = '';
        $contenuError = '';
        $prixError = '';
        $categorie_idError = '';
        $images = '';
        $titre = htmlentities(trim($_POST['titre']));
        $auteur = htmlentities(trim($_POST['auteur']));
        $contenu = htmlentities(trim($_POST['contenu']));
        $prix = (float) htmlentities(trim($_POST['prix']));
        $categorie_id = htmlentities(trim($_POST['categorie_id']));
        $images = htmlentities(trim($_POST['images']));
        $valid = true;


        if (empty($titre)) {
            $titreError = 'Please enter titre';
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
            $categorie_idError = 'Please enter categorie id';
            $valid = false;
        }
        if (empty($images)) {
            $imagesError = 'Please enter image';
            $valid = false;
        }
        // si les données sont présentes et bonnes, on se connecte à la base
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO microservices (titre,auteur,contenu,prix, categorie_id, images) values(?, ?, ?, ? , ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($titre, $auteur, $contenu, $prix, $categorie_id, $images));
            Database::disconnect();
            header("Location: index.php");
        }
    }
    ?>
   <!DOCTYPE html>
   <html>

   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title>Crud</title>
       <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>

   <body>
       <div class="container">
           <div class="row">
               <h3>Ajouter un contact</h3>
           </div>
           <form method="post" action="add.php">
               <div class="control-group <?php echo !empty($titreError) ? 'error' : ''; ?>">
                   <label class="control-label">titre</label>
                   <div class="controls">
                       <input name="titre" type="text" placeholder="titre" value="<?php echo !empty($titre) ? $titre : ''; ?>">
                       <?php if (!empty($titreError)) : ?>
                           <span class="help-inline"><?php echo $titreError; ?></span>
                       <?php endif; ?>
                   </div>
               </div>
               <div class="control-group<?php echo !empty($auteurError) ? 'error' : ''; ?>">
                   <label class="control-label">auteur</label>
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
                       <input type="date" name="contenu" value="<?php echo !empty($contenu) ? $contenu : ''; ?>">
                       <?php if (!empty($contenuError)) : ?>
                           <span class="help-inline"><?php echo $contenuError; ?></span>
                       <?php endif; ?>
                   </div>
               </div>
               <div class="control-group <?php echo !empty($prixError) ? 'error' : ''; ?>">
                   <label class="control-label">prix</label>
                   <div class="controls">
                       <input name="prix" type="text" placeholder="prix" value="<?php echo !empty($prix) ? $prix : ''; ?>">
                       <?php if (!empty($prixError)) : ?>
                           <span class="help-inline"><?php echo $prixError; ?></span>
                       <?php endif; ?>
                   </div>
               </div>
               <div class="control-group <?php echo !empty($categorie_idError) ? 'error' : ''; ?>">
                   <label class="control-label">Categorie_id</label>
                   <div class="controls">
                       <input name="categorie_id" type="text" placeholder="Categorie_id" value="<?php echo !empty($categorie_id) ? $categorie_id : ''; ?>">
                       <?php if (!empty($categorie_idError)) : ?>
                           <span class="help-inline"><?php echo $categorie_idError; ?></span>
                       <?php endif; ?>
                   </div>
               </div>

               <div class="control-group <?php echo !empty($imagesError) ? 'error' : ''; ?>">
                   <label class="control-label">images</label>
                   <div class="controls">
                       <input name="images" type="text" placeholder="images" value="<?php echo !empty($images) ? $images : ''; ?>">
                       <?php if (!empty($imagesError)) : ?>
                           <span class="help-inline"><?php echo $imagesError; ?></span>
                       <?php endif; ?>
                   </div>
               </div>

               <div class="form-actions">
                   <input type="submit" class="btn btn-success" name="submit" value="submit">
                   <a class="btn" href="index.php">Retour</a>
               </div>
           </form>
       </div>
   </body>

   </html>