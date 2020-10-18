        <?



        require 'config.php';
        require 'header.php';
        require 'sidebar.php';


        $msg = '';
        if (isset($_POST['updateCate'])) {
        $name = isset($_POST['name'])?$_POST['name']:"";

        $id = $_POST['pid'];

        $msg = updateCate($name, $id);
        if ($msg) {
        header('location: categories.php');
        }
        }
        ?>
        <div id="main-content">
        <!-- Main Content Section with everything -->
        <noscript> 
        <!-- Show a notification if the user has disabled javascript -->
        <div class="notification error png_bg">
        <div>
        Javascript is disabled or is not supported by your browser.
        Please 
        <a href="http://browsehappy.com/" title="Upgrade to a better browser">
        upgrade</a> your browser or 
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
        <h3>Products</h3>
        <ul class="content-box-tabs">

        <li><a href="#tab2" class="default-tab">Add</a></li>
        </ul>
        <div class="clear"></div>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">

        <?php
        $id = $_GET['id'];
        // echo $id;
        $row = fetchSpecificCate($id);
        ?>
        <div class="tab-content default-tab" id="tab2">
        <form action="edit.php" method="post">
        <input type="hidden" name="pid" 
        value="<?php echo $row['category_id'] ?>">
        <fieldset> 

        <p>
        <label>Name</label>
        <input class="text-input small-input" type="text" 
        id="small-input" name="name" 
        value="<?php echo $row['name'] ?>" required /> 

        </p>

        <p>
        <input class="button" type="submit" value="Update"
        name="updateCate" />
        <a href="categories.php" class="button">Back</a>
        </p>
        </fieldset>
        <div class="clear"></div>
        <!-- End .clear -->
        </form>