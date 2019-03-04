<!--header-->
<?php

// On inclus le fichier header.php sur la page
include(__DIR__.'./partials/header.php');
?>
<div class="container">
<?php
$query = $db->query('SELECT * FROM book');
$book = $query->fetchAll();
?>
  <?php
foreach($book as $books){?>
  <div class="row d-flex">
    <div class="col-lg-6 col-md-6 mb-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top " src="./img/<?php echo $books['cover'];?>" alt="<?= $books['title']; ?>">
        <div class="card-body">
          <h3 class="card-title"><?php echo $books['title'];?></h3>
          <h4 class="card-date"><?php echo $books['release_date'];?></h4>
          <h5 class ="card-isbn"><?php echo $books['isbn'];?></h5> 
          <p class="card-price"><?php echo $books['price'];?></p>
         
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>


<?php
  // On inclus le fichier footer.php sur la page

include(__DIR__.'./partials/footer.php');
?>