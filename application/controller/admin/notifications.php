<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once "header.php";?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="" class="simple-text logo-normal">
          ONLINE BOOK STORE
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user">
              <i class="material-icons">person</i>
              <p>Order Status</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="billinginfo">
              <i class="material-icons">content_paste</i>
              <p>Billing Details</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="tables">
              <i class="material-icons">content_paste</i>
              <p>Product List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="loginusers">
              <i class="material-icons">content_paste</i>
              <p>User List</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="notifications">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Notification</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" name="search_text" id="search_text" placeholder="Notification" class="form-control" />
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
              <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION["adminname"]; ?></a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../../application/view/adminlogout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h3 class="card-title">Messages</h3>
              <p class="card-category">You can Read your Here.
                <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
              </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="card-title">Your Messages</h4>
                  <div class="alert alert-info alert-with-icon" data-notify="container" id="result">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php require_once "footer.php";?>
     <script>
$(document).ready(function(){
    load_data();
    function load_data(query)
    {
        $.ajax({
            url:"https://myprojectspi.ga/application/controller/admin-function/notificationfetch",
            method:"post",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }
    
    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();            
        }
    });
});
</script>
</body>

</html>