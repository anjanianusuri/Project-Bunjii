<?php
    $page_title = 'Home';
    $home = '';
    $facilities = 'active';
    $about = '';
    $contact = '';
    require_once ("initialize.php");
    include ('header.php');

    $displayVenueSQL = "select * from venue";
    $venueResult = mysqli_query($conn, $displayVenueSQL);
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col">
          <h1>SPORTS FACILITIES</h1>
          <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <div class="row">
          <?php while ($venue = mysqli_fetch_assoc($venueResult)) { ?>

          <div class="card" style="width:21rem; margin: 20px;">
            <img class="card-img-top" src="include/uploads/<?php echo $venue['venue_image'];?>" />
            <div class="card-body">
              <h2><?php echo $venue['venue_name']; ?></h2>
              <p><?php echo substr($venue['venue_desc'], 0, 140); ?></p>
              <a href="facilitiesdetail.php?id=<?php echo $venue['venue_id'];?>" class="text-primary">View >></a>
            </div>
          </div>
         <?php } ?>
          </div>
      </div>
    </div>
  </div>
</main>

<?php include ('footer.php'); ?>
