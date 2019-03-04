<!--header-->
<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');

// On déclare les variables 
$title = null;
$isbn = null;
$price = null;
$release_date = null;
$cover = null;


// On recupere les informations
if (!empty($_POST)) { 
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'];
    $release_date = $_POST['release_date'];
    $cover = $_FILES['cover'];


    //On fait un tableau pour d'evnetuelles erreurs
    $errors = [];
        
    
// Vérifier le titre
if (empty($title)) {
    $errors['title'] = 'Le titre du livre n\'est pas rempli';
}
// Vérifier le numéro isbn
if (empty($isbn)) {
    $errors['isbn'] = 'Le numéro isbn n\'est pas rempli';
}
// Vérifier le prix
if (empty($price)) {
    $errors['price'] = 'Le prix n\'est pas affiché'; 
}

// Vérifier le prix
if (empty($release_date)) {
    $errors['release_date'] = 'La date n\'est pas affiché'; 
}


// Vérifier la couverture du livre
if (empty($cover)) {
$errors['cover'] = 'La couverture du livre n\'a pas été téléchargé '; 
}


// Upload de la la photo
if ($cover['error'] === 0) {
    // On récupére le fichier temporaire
    $tmpFile = $cover['tmp_name'];
    // On récupére le nom du fichier
    $fileName = $cover['name'];
    
    $fileName = substr(md5(time()), 0, 0) . ' ' . $fileName;
   
    move_uploaded_file($tmpFile, __DIR__.'./img/'.$fileName);
   
    $cover = $fileName;
    } else { 
     $cover = null;
    }

    // Si le formulaire est valide
    if (empty($errors)) {
        $query = $db->prepare('INSERT INTO book (title, isbn, price, release_date, cover) VALUES (:title, :isbn, :price, :release_date, :cover)');
        $query->bindValue(':title', $title);
        $query->bindValue(':isbn', $isbn);
        $query->bindValue(':price', $price);
        $query->bindValue(':release_date', $release_date);
        $query->bindValue(':cover', $cover);
        if ($query->execute()) {
            echo '<div class="alert alert-success">Le livre a bien été ajouté.</div>';
        }
    }
}
?>

<div class="container my-5">
<?php
        // S'il y a des erreurs
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            echo '<p>Le formulaire contient des erreurs</p>';
            echo '<ul>';
            foreach ($errors as $field => $error) {
                echo '<li>'.$field.' : '.$error.'</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    ?>
    <div class="row">
            <div class="col-md-6 offset-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">titre</label>
                        <input type="text" name="title" id="title" <?php echo $title; ?> class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nom">numéro ISBN</label>
                        <input type="text" name="isbn" id="isbn" <?php echo $isbn; ?> class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nom">prix</label>
                        <input type="text" name="price" id="price" <?php echo $price; ?> class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="release_date">année de publication</label>
                        <select name="release_date" id="release_date" class="form-control">
                        <?php
                           $dateActuel = date('Y');
                           for ($date = 1900; $date <= $dateActuel; $date++) { 
                             ?><option><?php echo $date ?></option>

                    <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="photo">couverture du livre</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div>
                    <button class="btn btn-dark btn-block">Ajouter un livre</button>
                </form>
            </div>
        </div>
    </div>
</div>










<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>