<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
      <table class="table table-bordered table-striped" id="event-list">
      <thead>
         <tr>
            <th>Event Name</th>
            <th>Student</th>
            <th>Program Name</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Location</th>
            <th>End Date</th>
            <th>End Time</th>
            <th>Event Type</th>
         </tr>
      </thead>
      <tbody>
         <?php if($events): ?>
         <?php foreach($events as $event): ?>
         <tr>
            <td><?php echo $event['Event_Name']; ?></td>
            <td><?php echo "{$event['First_Name']} {$event['Last_Name']}"; ?></td>
            <td><?php echo $event['name']; ?></td>
            <td><?php echo $event['Start_Date']; ?></td>
            <td><?php echo $event['Start_Time']; ?></td>
            <td><?php echo $event['Location']; ?></td>
            <td><?php echo $event['End_Date']; ?></td>
            <td><?php echo $event['End_Time']; ?></td>
            <td><?php echo $event['Event_Type']; ?></td>
            <td>
            <a href="<?php echo base_url('event_tracking/delete/'.$event['ET_Num']);?>" class="btn btn-danger btn-sm">Remove</a>
            </td>
         </tr>
         <?php endforeach; ?>
         <?php endif; ?>
      </tbody>
   </table>
</div>
<?= $this->endSection() ?>