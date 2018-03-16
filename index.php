<?php
// include functions for curl method
include 'functions.php';
//saving xml data to file as experiment
$content = file_get_contents('http://www.andy-huynh.com:5000/postsxml/');
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/savedxml.xml","w");
fwrite($fp, $content);
fclose($fp);
//load file
$xml = simplexml_load_file('savedxml.xml');
//send data to session for other areas to use
$_SESSION['xml'] = $xml;
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

<?php include 'partials/header.php';
?>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <?php
          //str_rep function is located in functions.php.
          //used for clean urls. removes extra variables like ! and replaces spaces with -
          foreach ($xml->xpath('//article') as $article):?>
            <div class="blog-post" style="word-wrap: break-word;">
              <div class="row">
                <?php if ($article->cover == "None"): ?>
                  <!-- Do Nothing if cover not available -->
                <?php else: ?>
                <div class="col-sm-3">
                  <a href="#" onclick="read('<?php echo $article->id ?>','<?php echo str_rep($article->title)?>')">
                  <img src="<?php echo $article->cover ?>" style="width:100%; height:auto;"></img></a><br/></div>
                <?php endif ?>
                <div class="col-sm">
                  <a href="#" class="my-link" onclick="read('<?php echo $article->id ?>','<?php echo str_rep($article->title)?>')"><h2>
                  <strong><?php echo $article->title ?></strong></h2></a>
                  <?php echo substr(strip_tags($article->body) ,0, 200) . ' ...'; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
        <?php include 'partials/sidebar.php'; ?>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

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
