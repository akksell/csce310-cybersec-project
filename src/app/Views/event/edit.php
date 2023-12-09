<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="flex flex-row justify-center">
  <div class="">
    <form action=<?php echo "/event/update/".$event['Event_ID'] ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center my-2">

        <label for="eventname-input" class="flex flex-col text-center">
        <strong>Event Name</strong>
          <input type="text" name="Event_Name" id="name-input" placeholder="<?= $event['Event_Name']?>" value="<?= $event['Event_Name']?>" class="border-2 px-2" />
        </label>

        <label for="programs-input" class="flex flex-col text-center">
        <strong>Program</strong>
          <select name="Program_Num" id ="programs-input" class="border-2 px-2">
            <?php if($programs): ?>
              <?php foreach($programs as $program): ?>
                <option value= <?= $program['program_num'] ?>> <?= $program['name'] ?> </option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </label>

        <label for="sdate-input" class="flex flex-col text-center">
        <strong>Start Date</strong>
          <input type="date" name="Start_Date" id="startdate-input" placeholder="<?= $event['Start_Date']?>" value="<?= $event['Start_Date']?>" class="border-2 px-2" />
        </label>

        <label for="stime-input" class="flex flex-col text-center">
        <strong>Start Time</strong>
          <input type="time" name="Start_Time" id="starttime-input" placeholder="<?= $event['Start_Time']?>" value="<?= $event['Start_Time']?>" class="border-2 px-2" />
        </label>

        <label for="location-input" class="flex flex-col text-center">
        <strong>Location</strong>
          <input type="text" name="Location" id="location-input" placeholder="<?= $event['Location']?>" value="<?= $event['Location']?>" class="border-2 px-2" />
        </label>

        <label for="edate-input" class="flex flex-col text-center">
        <strong>End Date</strong>
          <input type="date" name="End_Date" id="enddate-input" placeholder="<?= $event['End_Date']?>" value="<?= $event['End_Date']?>" class="border-2 px-2" />
        </label>

        <label for="etime-input" class="flex flex-col text-center">
        <strong>End Time</strong>
          <input type="time" name="End_Time" id="enddate-input" placeholder="<?= $event['End_Time']?>" value="<?= $event['End_Time']?>" class="border-2 px-2" />
        </label>

        <label for="type-input" class="flex flex-col text-center">
        <strong>Event Type</strong>
          <input type="text" name="Event_Type" id="type-input" placeholder="<?= $event['Event_Type']?>" value="<?= $event['Event_Type']?>" class="border-2 px-2" />
        </label>
      </div>
      
      <button type="submit" class="btn btn-primary btn-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-2">Update Event</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>