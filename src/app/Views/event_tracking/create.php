<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="">
    <form action="/event_tracking/new" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center ">

        <label for="events-input" class="flex flex-col">
          Event
          <select name="Event_ID" id ="events-input" class="border-2">
            <?php if($events): ?>
              <?php foreach($events as $event): ?>
                <option value= <?= $event['Event_ID'] ?>> <?= $event['Event_Name'] ?> </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </label>

        <label for="uin-input" class="flex flex-col">
          Student UIN
          <input type="number" name="UIN" id="uin-input" placeholder="000000000" minlength=9 maxlength=9 class="" />
        </label>
      
      <button type="submit">Join Event</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>