<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="flex flex-row justify-center">
  <div class="">
    <form action=<?php echo "/document/update/".$doc['doc_num'] ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
    <div class="flex flex-row items-center justify-items-center ">
        <label for="location-input" class="flex flex-col">
          Document Link
          <input type="text" name="link" id="location-input" placeholder=<?php echo $doc['link'] ?> value=<?php echo $doc['link'] ?> class="" />
        </label>

        <label for="type-input" class="flex flex-col">
          Document Type
          <input type="text" name="doc_type" id="type-input" placeholder=<?php echo $doc['doc_type'] ?> value=<?php echo $doc['doc_type'] ?> class="" />
        </label>
      </div>
      
      <button type="submit">Update Event</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>