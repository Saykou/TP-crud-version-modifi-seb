<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
require 'database.php';
$microservice_id = 0;
if (!empty($_GET['id'])) {
    $microservice_id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $microservice_id = $_POST['id'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM microservices  WHERE microservice_id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($microservice_id));
    Database::disconnect();
    header("Location: index.php");
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
                <h3>Delete a user</h3>
            </div>
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $microservice_id; ?>" />
                Are you sure to delete ?
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="index.php">No</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>