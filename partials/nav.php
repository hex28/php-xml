<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <?php
      foreach ($xml->xpath('//link') as $link) {
        if ($link->href == '/blog'){
        echo '<a class="nav-link" href="/">' . $link->text . '</a>';
        }else {
        echo '<a class="nav-link" href="http://www.andy-huynh.com' . $link->href . '">' . $link->text . '</a>';
      }
      };
      ?>
    </nav>
  </div>
</div>
