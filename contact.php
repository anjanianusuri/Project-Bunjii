<?php include('header.php');?>
<style>
.address {
    background: url(../images/cover.jpg) no-repeat center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
}

.address-grid,
.address-right {
    background-color: #fff;
    -webkit-box-shadow: 0px 2px 13px -1px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 2px 13px -1px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 2px 13px -1px rgba(0, 0, 0, 0.15);
}

.address h4 {
    font-size: 23px;
    color: #ffb66b;
    font-weight: 600;
}

.address-info p a {
    color: #999;
}

.address-info p span {
    display: block;
}

.address input[type="text"],
.address input[type="email"],
.address textarea {
    color: #000;
    outline: none;
    font-size: 15px;
    padding: 11px;
    border: none;
    letter-spacing: 1px;
    border-bottom: solid 1px rgba(0, 0, 0, 0.15);
}

.address textarea {
    min-height: 10em;
    resize: none;
}

.address button {
    border: none;
    outline: none;
    color: #fff;
    width: 100%;
    padding: 11px 0;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 16px;
    background: #0abde3;
    border-radius: 0px;
}

.address button:hover {
    opacity: .8;
}

.map iframe {
    width: 100%;
    min-height: 400px;
    position: relative;
    display: inherit;
}

.map {
    position: relative;
}
</style>


<div class="address py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-center text-bl mb-5">
				<span class="mt-2">Get in touch with BUNJII</span>
			</h3>
			<div class="row address-row pt-xl-5 pt-lg-4">
				<div class="col-lg-6">
					<div class="address-right p-sm-5 p-4">
						<div class="address-info wow fadeInRight animated" data-wow-delay=".5s"> 
							<h4 class="mb-3">Address</h4>
							<p>Brisbane,
								<span>QLD, Australia</span>
							</p>
						</div>
						<div class="address-info address-mdl wow fadeInRight animated my-sm-5 my-4" data-wow-delay=".7s">
							<h4 class="mb-3">Phone </h4>
							<p>+00 000 000</p>
							<p>+00 000 000</p>
						</div>
						<div class="address-info agileits-info wow fadeInRight animated" data-wow-delay=".6s">
							<h4 class="mb-3">Mail</h4>
							<p>
								<a href="anjani.anusuri@my.jcu.edu.au"> anjani.anusuri@my.jcu.edu.au</a>
							</p>
							<p>
								<a href="bhargav.bandi@my.jcu.edu.au"> bhargav.bandi@my.jcu.edu.au</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 address-left wow agile fadeInLeft animated mt-lg-0 mt-5" data-wow-delay=".5s">
					<div class="address-grid p-sm-5 p-4">
						<h4 class="wow fadeIndown animated mb-3" data-wow-delay=".5s">Get In Touch</h4>
						<form action="contact_code.php" method="post">
							<div class="form-group">
								<input type="text" placeholder="Name" name="name" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="email" placeholder="Email" name="email" class="form-control" required="">
							</div>
							<div class="form-group">
								<textarea placeholder="Message" name="message" class="form-control" required=""></textarea>
							</div>
							<button type="submit" class="btn">SEND</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="map mt-5">
		<iframe src="https://maps.google.com/maps?q=Brisbane%2C%20QLD%2C%20Australia&t=&z=13&ie=UTF8&iwloc=&output=embed"	style="border:0"></iframe>
	</div>
<?php include('footer.php');?>