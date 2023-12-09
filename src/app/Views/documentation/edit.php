<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="flex flex-row justify-center">
  <div class="">
    <form action=<?php echo "/document/update/".$doc['doc_num'] ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
    <div class="flex flex-row items-center justify-items-center my-2">
        <label for="location-input" class="flex flex-col text-center">
          <strong>Document Link</strong>
          <input type="text" name="link" id="location-input" placeholder=<?php echo $doc['link'] ?> value=<?php echo $doc['link'] ?> class="border-2 px-2" />
        </label>

        <label for="type-input" class="flex flex-col text-center">
          <strong>Document Type</strong>
          <input type="text" name="doc_type" id="type-input" placeholder=<?php echo $doc['doc_type'] ?> value=<?php echo $doc['doc_type'] ?> class="border-2 px-2" />
        </label>
      </div>
      
      <button type="submit" class="btn btn-primary btn-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-2">Update Event</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>