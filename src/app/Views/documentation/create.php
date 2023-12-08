<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="">
    <form action=<?php echo "/document/new/".$id ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center ">
        <label for="location-input" class="flex flex-col">
          Document Link
          <input type="text" name="link" id="location-input" placeholder="resume.pdf" class="" />
        </label>

        <label for="type-input" class="flex flex-col">
          Document Type
          <input type="text" name="doc_type" id="type-input" placeholder="PDF" class="" />
        </label>
      </div>
      
      <button type="submit">Add Document</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>