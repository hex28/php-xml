<?php
// include functions for curl method
include 'functions.php';
//start session to pass data to session 'xml' variable
session_start();
//use curl method to get and convert data to simplexml
//xml data put into variable $xml
curl('http://www.andy-huynh.com:5000/postsxml/')
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php echo $xml->info->owner ?></title>

    <!-- Load Style sheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- Load Font-awesome Style sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Core Transpile build -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  </head>

<?php include 'header.php';
?>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <?php
          //str_rep function is located in functions.php.
          //used for clean urls. removes extra variables like ! and replaces spaces with -
          foreach ($xml->xpath('//article') as $article){
            echo '<div class="blog-post" style="word-wrap: break-word;">';
            echo '<div class="row">';
            if ($article->cover == "None"){
                echo "";
            }else {
              echo '<div class="col-sm-3"><a href="#" + onclick="read(' . "'" . $article->id . "','" . str_rep($article->title) . "'" . ')"' .
                '><img src="' . $article->cover . '" style="width:100%; height:auto;"></img></a><br/></div>';
            }
            echo '<div class="col-sm">';
            echo '<a href="#" class="my-link" onclick="read('. "'" . $article->id . "','" . str_rep($article->title) . "'" . ')"><h2><strong>' . $article->title . '</strong></h2></a>';
            echo substr(strip_tags($article->body) ,0, 200) . ' ...';
            echo '</div></div></div>';
          }
          ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
        <?php include 'sidebar.php'?>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php include 'footer.php'?>

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
