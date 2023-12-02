<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="flex flex-col items-center">
    <form action="/login" method="POST" accept-charset="utf-8" class="flex flex-col items-center gap-y-2">
      <input type="text" name="username" id="username-input" placeholder="username" class="" />
      <input type="password" name="password" id="password-input" placeholder="password" class="" />
      <button type="submit">Sign In</button>
    </form>
  
    <a href="/reset-password" class="my-2">Forgot Password?</a>
  </div>
</div>
<?= $this->endSection() ?>