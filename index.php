<?php
    $page_title = 'Home';
    $home = 'active';
    $facilities = '';
    $about = '';
    $contact = '';
    require_once ("initialize.php");
    include ('header.php');

    $displayVenueSQL = "select * from venue LIMIT 3";
    $venueResult = mysqli_query($conn, $displayVenueSQL);

?>

<div class="homepage">
  <div class="container mainscreen">
    <div class="row">
      <div class="introcontent col-md-8">
        <h1>BOOK ANY FACILITY WITH US</h1>
        <?php  if(isset($_SESSION['name'])){
            $name = $_SESSION['name'];
            echo "<h2 class='text-primary'>Welcome $name</h2>"; }?>
        <p><italic>Bunjii is the leading solution for managing sports facilities and good choice for the customers to book a venue online. We're proud of our rock-solid data-security standards, industry-leading uptime and performance and our über-helpful support </italic></p>
          <p><italic>So throw away that notepad and signup to enjoy a smarter way to manage your bookings!</italic></p>
      </div>
      <div class="container col-md-4">
        <h1>SEARCH</h1>
        <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <form class="mainform" action="search.php">
          <input class = "form-control" type="text" id="sport" name="sport" placeholder="Search" />
          <input class="btn btn-primary" type="submit" name="submit" id="submit" style="position: absolute; left: 40%"/>
        </form>
      </div>
    </div>
  </div>
</div>
<section>
  <div class="container">
    <h1>FACILITIES</h1>
    <hr class="bg-primary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    <div class="row">
    <?php while ($venue = mysqli_fetch_assoc($venueResult)) {

        $venueid = $venue['venue_id'];

        $gallerysql = "select * from gallery where venue_id = '$venueid' and image_id = 1";
        $galleryResult = mysqli_query($conn, $gallerysql);

      ?>

    <div class="card" style="width:21rem; margin: 20px;">
      <img class="card-img-top" src="include/uploads/<?php

      $gallery = mysqli_fetch_assoc($galleryResult);

      if ($gallery['venue_image'] == ""){
         echo "default.jpg";}
        else {
          echo $gallery['venue_image'];
        }?>" />
      <div class="card-body">
        <h2><?php echo $venue['venue_name']; ?></h2>
        <p><?php echo substr($venue['venue_desc'], 0, 140); ?></p>
        <a href="facilitiesdetail.php?id=<?php echo $venue['venue_id'];?>" class="text-primary">View >></a>
      </div>
    </div>
   <?php } ?>
    </div>
  </div>
</section>


<?php include ('footer.php'); ?>
