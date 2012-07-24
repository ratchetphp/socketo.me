<?php
    $metaTitle = 'Page not found';
    $metaDesc  = 'The page you are looking for does not exist';

    require __DIR__ . '/header.php';
?>

    <div class="container">
      <div class="hero-unit" style="text-align: center">
        <img src="/404.png" alt="404: Page not found" width="319" height="402">
      </div>

      <footer>
        <p>404 image courtesy of <a href="http://TheOatmeal.com">Matthew Inman</a></p>
      </footer>
    </div>

<?php
    require __DIR__ . '/footer.php';