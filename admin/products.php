			<?php include('header.php'); ?>
			<?php include('sidebar.php'); ?>
			<?php include('config.php'); ?>
			<?php
			if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = "DELETE FROM products WHERE id = '$id' ";
			mysqli_query($conn, $sql);
			}
			?>

			<div id="main-content"> <!-- Main Content Section with everything -->

			<noscript> <!-- Show a notification if the user has disabled javascript -->
			<div class="notification error png_bg">
			<div>
			Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
			</div>
			</div>
			</noscript>

			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>



			<div class="clear"></div> <!-- End .clear -->

			<div class="content-box"><!-- Start Content Box -->

			<div class="content-box-header">

			<h3>Product Manage</h3>

			<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">MANAGE</a></li> <!-- href must be unique and match the id of target div -->
			<li><a href="#tab2">ADD</a></li>
			</ul>

			<div class="clear"></div>

			</div> <!-- End .content-box-header -->

			<div class="content-box-content">

			<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->



			<table>

			<thead>
			<tr>
			<th><input class="check-all" type="checkbox" /></th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Category</th>
			<th>Tags</th>
			<th>Description</th>
			<th>Action</th>
			</tr>

			</thead>

			<tfoot>
			<tr>
			<td colspan="6">
			<div class="bulk-actions align-left">
			<select name="dropdown">
			<option value="option1">Choose an action...</option>
			<option value="option2">Edit</option>
			<option value="option3">Delete</option>
			</select>
			<a class="button" href="#">Apply to selected</a>
			</div>

			<div class="pagination">
			<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
			<a href="#" class="number" title="1">1</a>
			<a href="#" class="number" title="2">2</a>
			<a href="#" class="number current" title="3">3</a>
			<a href="#" class="number" title="4">4</a>
			<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
			</div> <!-- End .pagination -->
			<div class="clear"></div>
			</td>
			</tr>
			</tfoot>

			<tbody>
			<?php
			$sql = "SELECT * FROM products";
			$res = mysqli_query($conn, $sql);
			while($data = mysqli_fetch_assoc($res)) {
			?>
			<tr>
			<td><input type="checkbox" /></td>
			<td><?php echo $data['Name'] ?></td>
			<td><a href="#" title="title"><?php echo  $data['Price'] ?></a></td>
			<td><img src="productImage/<?php echo $data['Image'] ?>" alt="" height="100" width="100"></td>
			<td><?php echo $data['Category'] ?></td>
			<td><?php echo $data['Tags'] ?></td>
			<td><?php echo $data['Description'] ?></td>
			<td>
			<!-- Icons -->
			<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
			<a href="products.php?id=<?php echo $data['id'] ?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
			<!-- <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> -->
			</td>
			</tr>
			<?php } ?>

			</tbody>

			</table>

			</div> <!-- End #tab1 -->

			<div class="tab-content" id="tab2">

			<form action="sisup.php" method="post" enctype="multipart/form-data">

			<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

			<p>
			<label>Name</label>
			<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input"/> 
			</p>

			<p>
			<label>Price</label>
			<input class="text-input small-input" type="text" id="small-input" name="small-input"/>  <!-- Classes for input-notification: success, error, information, attention -->
			</p>

			<p>
			<label>Image</label>
			<input class="text-input small-medium" type="file" id="small-medium" name="small-medium"/>
			</p>

			<p>
			<label>Category</label>
			<select name="dropdown" class="small-input">
			<option value="1">Men</option>
			<option value="2">Women</option>
			<option value="3">Kids</option>
			<option value="4">Electronics</option>
			<option value="5">Sports</option>
			</select >
			</p>
			<p>
			<label>Tags</label>
			<input type="checkbox" name="fashion[]" value="fashion" /> Fashion
			<input type="checkbox" name="fashion[]" value="ecommerce" /> Ecommerce
			<input type="checkbox" name="fashion[]" value="shop" /> Shop
			<input type="checkbox" name="fashion[]" value="handbag" /> Hand Bag
			<input type="checkbox" name="fashion[]" value="laptop"/> Laptop
			<input type="checkbox" name="fashion[]" value="headphone" /> Headphone
			</p>

			<p>

			<p>
			<label>Description</label>
			<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
			</p>

			<p>
			<input class="button" type="submit" value="Submit" name="submit" />
			</p>

			</fieldset>

			<div class="clear"></div><!-- End .clear -->

			</form>

			</div> <!-- End #tab2 -->        

			</div> <!-- End .content-box-content -->

			</div> <!-- End .content-box -->




			<div class="clear"></div>


			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
			<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
			Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
			</div>
			</div>

			<div class="notification information png_bg">
			<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
			Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
			</div>
			</div>

			<div class="notification success png_bg">
			<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
			Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
			</div>
			</div>

			<div class="notification error png_bg">
			<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
			Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
			</div>
			</div>
			-->
			<!-- End Notifications -->

			<?php include('footer.php'); ?>
