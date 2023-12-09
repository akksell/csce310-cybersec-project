<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
      <table class="table table-bordered table-striped border-2 my-2" id="event-list">
      <thead>
         <tr>
            <th class="border-2 px-2">Event Name</th>
            <th class="border-2 px-2">Admin</th>
            <th class="border-2 px-2">Program Name</th>
            <th class="border-2 px-2">Start Date</th>
            <th class="border-2 px-2">Start Time</th>
            <th class="border-2 px-2">Location</th>
            <th class="border-2 px-2">End Date</th>
            <th class="border-2 px-2">End Time</th>
            <th class="border-2 px-2">Event Type</th>
         </tr>
      </thead>
      <tbody>
         <?php if($events): ?>
         <?php foreach($events as $event): ?>
         <tr>
            <td class="border-2 px-2"><?php echo $event['Event_Name']; ?></td>
            <td class="border-2 px-2"><?php echo "{$event['First_Name']} {$event['Last_Name']}"; ?></td>
            <td class="border-2 px-2"><?php echo $event['name']; ?></td>
            <td class="border-2 px-2"><?php echo $event['Start_Date']; ?></td>
            <td class="border-2 px-2"><?php echo $event['Start_Time']; ?></td>
            <td class="border-2 px-2"><?php echo $event['Location']; ?></td>
            <td class="border-2 px-2"><?php echo $event['End_Date']; ?></td>
            <td class="border-2 px-2"><?php echo $event['End_Time']; ?></td>
            <td class="border-2 px-2"><?php echo $event['Event_Type']; ?></td>
            <td>
            <form action=<?php echo '/event_tracking/destroy/'.$event['Event_ID'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">
               <button type="submit">Remove</button>
            </form>
            </td>
         </tr>
         <?php endforeach; ?>
         <?php endif; ?>
      </tbody>
   </table>
</div>
<?= $this->endSection() ?>