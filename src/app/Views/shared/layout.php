<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('shared/head_includes') ?>
    <?= $this->renderSection('page_title') ?>
  </head>

  <body class="m-0 p-0">
    <div class="container mx-auto">
      <?= $this->renderSection('content') ?>
    </div>
  </body>
</html>