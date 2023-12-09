<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex flex-row justify-center">
  <div class="">
    <div class="font-bold flex flex-col items-center justify-items-center">
      Application
    </div>
    <form action="/application/new" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-col items-left justify-items-center">
        <select name="program" id ="program" class="border-2">
          <?php if($programs): ?>
            <?php foreach($programs as $program): ?>
              <option value= <?= $program['program_num'] ?>> <?= $program['name'] ?> </option>
            <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <label for="com_cert-input" class="flex flex-col">
        Have you completed any cybersecurity industry certifications via the Cybersecurity Center? 
          <textarea name="com_cert" id="com_cert" class="h-12 border-2"></textarea>
        </label>
        <label for="uncom_cert-input" class="flex flex-col">
        Are you currently enrolled in other uncompleted certifications sponsored by the Cybersecurity Center?
          <textarea name="uncom_cert" id="uncom_cert" class="h-12 border-2"></textarea>
        </label>
        <label for="purpose_statement-input" class="flex flex-col">
        Purpose Statement
          <textarea name="purpose_statement" id="purpose_statement" class="h-12 border-2"></textarea>
        </label>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>