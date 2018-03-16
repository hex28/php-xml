<?php
// include functions for curl method
include 'functions.php';
//start session to pass data to xml session variable
$url = 'http://www.andy-huynh.com:5000/postxml/' . $_GET["id"];
//use curl method to get and convert data to simplexml
//xml data put into variable $xml
curl($url);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $xml->response->title ?></title>

    <!-- Load Style sheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- Load Font-awesome Style sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Load Prism Style sheets -->
    <link rel="stylesheet" href="/css/prism.css">

      <!-- Core Transpile build -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.runtime.min.js"></script>
    <script src="/js/prism.js"></script>
  </head>

  <?php include 'partials/header.php'; ?>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">

        <h2><?php echo $xml->response->title ?></h2>

        by . <?php echo $xml ->info->owner ?> on

        <em>
        <?php $date = new DateTime();
        $date->setTimestamp((int) $xml->response->date); echo $date->format('m/d/Y') ?>
        </em>

        <?php echo $xml->response->body ?>

        <br/><br/>

      <div id="blog_social_media"></div>
      <div id="blog_comments"></div>
      </div>

      <div class="col-sm-3 offset-sm-1 blog-sidebar">
        <?php include 'partials/sidebar.php'; ?>
      </div>

    </div> <!-- /.row -->
  </div><!-- /.container -->

<?php include 'partials/footer.php'; ?>


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</body>

  <!-- load scripts build -->
  <script src="/js/function.js"></script>
  <script src="/js/jsx_bundle.js"></script>
</html>
