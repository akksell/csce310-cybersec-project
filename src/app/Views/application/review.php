<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex flex-row justify-center">
  <div class="">
    <div class="font-bold flex flex-col items-center justify-items-center">
      <?= $program['name'] ?>
    </div>
    <div class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-col items-left justify-items-center">
        <div> </div>
        <label for="com_cert-input" class="flex flex-col">
        Have you completed any cybersecurity industry certifications via the Cybersecurity Center? 
          <p name="com_cert" id="com_cert" class="h-12 border-2"><?= $application['com_cert'] ?></p>
        </label>
        <label for="uncom_cert-input" class="flex flex-col">
        Are you currently enrolled in other uncompleted certifications sponsored by the Cybersecurity Center?
          <p name="uncom_cert" id="uncom_cert" class="h-12 border-2"><?= $application['uncom_cert'] ?></p>
        </label>
        <label for="purpose_statement-input" class="flex flex-col">
        Purpose Statement
          <p name="purpose_statement" id="purpose_statement" class="h-12 border-2"><?= $application['purpose_statement'] ?></p>
        </label>
      </div>
    </div>
    <form action=<?php echo "/application/update_status/".$app_num ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-left justify-items-center">
      <button type="submit" name="status" value="1" class="mx-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Accept</button>
      <button type="submit" name="status" value="0" class="mx-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Reject</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>