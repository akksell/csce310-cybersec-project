<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="">
    <form action="/event/new" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center ">
        <label for="firstname-input" class="flex flex-col">
          Name
          <input type="text" name="name" id="name-input" placeholder="Event Name" class="" />
        </label>

        <label for="description-input" class="flex flex-col">
          Description
          <input type="text" name="description" id="description-input" placeholder="Program Description" class="" />
        </label>
      </div>
      
      <button type="submit">Create Program</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>