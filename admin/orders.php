            <?php
            include 'header.php';
            include 'sidebar.php';
            include 'config.php';


            $msg = '';

            if (isset($_POST['addOrder'])) {
            $pid = isset($_POST['id'])?$_POST['id']:"";
            $cartdata = isset($_POST['Cart_Data'])?$_POST['Cart_Data']:"";
            $total = isset($_POST['Total'])?$_POST['Total']:"";
            $status = isset($_POST['status'])?$_POST['status']:"";
            $datetime = isset($_POST['datetime'])?$_POST['datetime']:"";

            $sql = "INSERT INTO orders(`id`, `Cart_data`, `Total`,`status`,`datetime`)VALUES('$pid', '$cartdata', '$total', '$status', '$datetime')" ;

            mysqli_query($conn, $sql);

            }
            if (isset($_POST['delete'])) {
            $id = $_POST['pid'];
            $msg = delCategory($id);
            }
            ?>
            <div id="main-content">
            <!-- Main Content Section with everything -->
            <noscript> 
            <!-- Show a notification if the user has disabled javascript -->
            <div class="notification error png_bg">
            <div>
            Javascript is disabled or is not supported by your browser.
            Please <a href="http://browsehappy.com/" 
            title="Upgrade to a better browser">upgrade</a>
            your browser or 
            <a href="http://www.google.com/support/bin/answer.py?answer=23852" 
            title="Enable Javascript in your browser">enable</a> 
            Javascript to navigate the interface properly.
            </div>
            </div>
            </noscript>
            <!-- Page Head -->
            <h2>Welcome John</h2>
            <p id="page-intro">What would you like to do?</p>
            <div class="clear"></div> 
            <!-- End .clear -->
            <div class="content-box">
            <!-- Start Content Box -->
            <div class="content-box-header">
            <h3>Manage Orders</h3>
            <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Manage</a></li> 
            <!-- href must be unique and match the id of target div -->
            <li><a href="#tab2">Add</a></li>
            </ul>
            <div class="clear"></div>
            </div> <!-- End .content-box-header -->
            <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this
            div's tab -->
            <?php if ($msg) : ?>
            <div class="notification success png_bg">
            <a href="#" class="close">
            <img src="resources/images/icons/cross_grey_small.png" 
            title="Close this notification" alt="close" /></a>
            <div>
            <?php echo $msg; ?>
            </div>
            </div>
            <?php endif; ?>
            <table>
            <thead>
            <tr>
            <th>
            <input class="check-all" type="checkbox" />
            </th>
            <th>Sr. No.</th>
            <th>Id</th>
            <th>Cartdata</th>
            <th>total</th>
            <th>status</th>
            <th>Datetime</th>
            <!-- <th>Column 4</th>
            <th>Column 5</th> -->
            </tr>
            </thead>
            <tfoot>
            <tr>
            <td colspan="6">
            <div class="bulk-actions align-left">
            <select name="dropdown">
            <option value="option1">Choose an
            action...</option>
            <option value="option2">Edit</option>
            <option value="option3">Delete</option>
            </select>
            <a class="button" href="#">Apply to selected
            </a>
            </div>
            <div class="pagination">
            <a href="#" title="First Page">&laquo; First
            </a>
            <a href="#" title="Previous Page">&laquo; 
            Previous</a>
            <a href="#" class="number" title="1">1</a>
            <a href="#" class="number" title="2">2</a>
            <a href="#" class="number current" title="3">
            3</a>
            <a href="#" class="number" title="4">4</a>
            <a href="#" title="Next Page">Next &raquo;
            </a>
            <a href="#" title="Last Page">Last &raquo;
            </a>
            </div> 
            <!-- End .pagination -->
            <div class="clear"></div>
            </td>
            </tr>
            </tfoot>
            <tbody>
            <?php 
            $sql = "SELECT * FROM orders";
            $res = mysqli_query($conn, $sql);
            $sr = 1;
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
            <td><input type="checkbox" /></td>
            <td><?php echo $sr++; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><a href="#" title="title">
            <?php echo $row['Cart_Data']; ?></a></td>
            <td><?php echo $row['Total']; ?></a></td>
            <td><?php echo $row['status']; ?></a></td>
            <td><?php echo $row['datetime']; ?></a></td>
            <!-- <td>Consectetur adipiscing</td>
            <td>Donec tortor diam</td> -->
            <td>
            <!-- Icons -->
            <a href="edit.php?id=<?php// echo $row['category_id'] ?>"
            title="Edit"><img 
            src="resources/images/icons/pencil.png" 
            alt="Edit" /></a>
            <form action="orders.php" method="post"
            style="display:inline;">
            <input type="hidden" name="pid" 
            value="<?php// echo $row['category_id'] ?>">
            <button type="submit" name="delete"
            style="border:none; background: transparent;
            cursor: pointer;">
            <img src="resources/images/icons/cross.png" 
            alt="Delete" />
            </button>
            </form>
            <!-- <a href="" title="Delete"><img 
            src="resources/images/icons/cross.png" 
            alt="Delete" /></a> -->
            <a href="#" title="Edit Meta">
            <img src="resources/images/icons/hammer_screwdriver.png" 
            alt="Edit Meta" /></a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
            </div> 
            <!-- End #tab1 -->
            <div class="tab-content" id="tab2">
            <form action="orders.php" method="post">
            <fieldset> 
            <!-- Set class to "column-left" or "column-right" 
            on fieldsets to divide the form into columns -->
            <p>
            <label>id</label>
            <input class="text-input small-input" type="number" 
            id="small-input" name="id" required />
            </p>
            <p>
            <label>Cart_Data</label>
            <input class="text-input small-input" type="text" 
            id="small-input" name="cartdata" required /> 

            </p>
            <p>
            <label>Total</label>
            <input class="text-input small-input" type="number" 
            id="small-input" name="total" required />  
            </p>
            <p>
            <label>status</label>
            <input class="text-input small-input" type="text" 
            id="small-input" name="status" required />  
            </p>
            <p>
            <label>datetime</label>
            <input class="text-input small-input" type="text" 
            id="small-input" name="datetime" required />  
            </p>

            <p>
            <input class="button" type="submit" value="Submit" 
            name="addOrder" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
            </form>
            </div> 
            <!-- End #tab2 -->
            </div> 
            <!-- End .content-box-content -->
            </div> 

            <?php
            require 'footer.php';
            ?>