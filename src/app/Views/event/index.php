<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
   <?php if ($user->User_Type == 'admin'): ?>
   <a href="<?php echo base_url('event/create');?>" class="btn btn-primary btn-sm">Create</a>
   <?php endif; ?>
   <?php if ($user->User_Type == 'student'): ?>
      <a href="<?php echo site_url('event_tracking');?>" class="btn btn-primary btn-sm">View Joined Events</a>
   <?php endif; ?>
</div>
<div class="flex flex-row justify-center">
      
      <table class="table table-bordered table-striped" id="event-list">
      
      <thead>
         <tr>
            <th>Event Name</th>
            <th>Admin</th>
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
            <?php if ($user->User_Type == 'admin'): ?>
               <a href="<?php echo base_url('event/show/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm">View</a>
               <a href="<?php echo base_url('event/edit/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm">Edit</a>
               <a href="<?php echo base_url('event/delete/'.$event['Event_ID']);?>" class="btn btn-danger btn-sm">Delete</a>
            <?php endif; ?>
            <?php if ($user->User_Type == 'student'): ?>
               <form action=<?php echo '/event_tracking/new/'.$event['Event_ID'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
                  <button type="submit">Join</button>
               </form>
            <?php endif; ?>
            </td>
         </tr>
         <?php endforeach; ?>
         <?php endif; ?>
      </tbody>
   </table>
</div>
<?= $this->endSection() ?>