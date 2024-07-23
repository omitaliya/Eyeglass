<?php 
					include "header.php";
			 ?>

<style type="text/css">
	.rating {
  display: flex;
  flex-direction: row-reverse;
}

.star-rating input {
  display: none;
}

.rating label {
  color: #ddd;
  font-size: 35px;
  padding: 0 5px;
  cursor: pointer;
}

.rating input:checked ~ label {
  color: #FFC107;
}

</style>
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Feedback</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	<!--// header_top -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3layouts my-lg-4 my-4 text-center">We value your feedback!!
				
			</h3>
			<center>
			<div class="">
                    <!-- RD Mailform-->
                    <form method="POST" action="addfeedback.php" class="text-left">
                    <?php
                    if(isset($_GET['flag'])){
                      if($_GET['flag']==1)
                      {
                      	echo "<div class='alert alert-success'><strong>Thank You for sharing your experience with us!!</strong></div>";
                      }
                      elseif ($_GET['flag']==0) {
                        echo "<div class='alert alert-danger'><strong>Sorry Something went wrong please try again!!</strong></div>";
                      }
                    }
                	?>
                    <div class="rating">
                        <div class="star-input" style="    margin: auto; display: table; width: 350px;">
                          <input type="radio" name="rating" id="rating-5" value="5"  style="display: none;" required>
                          <label for="rating-5" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-4" value="4" style="display: none;">
                          <label for="rating-4" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-3" value="3" style="display: none;">
                          <label for="rating-3" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-2" value="2" style="display: none;">
                          <label for="rating-2" class="fas fa-star"></label>
                          <input type="radio" name="rating" id="rating-1" value="1" style="display: none;">
                          <label for="rating-1" class="fas fa-star"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="contacts-message" class="text-dark">Comment </label>
                        <textarea id="contacts-message" name="message" data-constraints="@Required" style="max-height: 150px;" class="form-control" required></textarea>
                      </div>
                      <?php 
                          if(isset($_SESSION['useremail'])){
                      ?>
                          <div class="text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="w3view-cart" style="background-color: black; color: white;" >Give Feedback</button>
                          </div>
                      <?php
                          }else{
                      ?>
                      	<a href="#"><h3 style="color: black;text-align: center;">You need to Login first to give Feedback.</h3></a><br/>
                          <div class="text-center text-sm-left">
                            <button type="submit" name="formsubmit" class="w3view-cart" style="background-color: black; color: white;"  disabled="">Give Feedback</button>
                          </div>
                      <?php
                          }
                      ?>
                    </form>
                  </div>
			</center>
		</div>
	</div>
	<!-- top Products -->
	
				
				<?php 
					include "footer.php";
			 ?>