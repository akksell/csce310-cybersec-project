<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <h2><?= $user->First_Name . " " . $user->Last_Name ?></h2>
  <h4><?= $user->Username ?></h4>
</div>
<?= $this->endSection() ?>