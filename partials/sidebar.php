<div>
<div class="sidebar-module">
  <div class="head-color text-center"><h4 class="text-light">About</h4></div>
  <p>  I'm a developer living in California. I like to build things. <br/><a href="http://www.andy-huynh.com">andy-huynh.com</a></p>
</div>
<div class="sidebar-module">
  <div class="head-color text-center"><h4 class="text-light">Latest Post</h4></div>
  <ol class="list-unstyled">
    <?php
    $xml = $_SESSION['xml'];
    foreach($xml->xpath('//Lart') as $latest){
      echo '<li style="padding-bottom: 5px;"><a href="#" class="my-link" onclick="read('. "'" . $latest->id . "','" . str_rep($latest->title) . "'" . ')">' . $latest->title . '</a></li>';
    }
    ?>
  </ol>
</div>
</div>
