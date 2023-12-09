<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
   <?php if ($user->User_Type == 'admin'): ?>
   <a href="<?php echo base_url('event/create');?>" class="btn btn-primary btn-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-2">Create New Event</a>
   <?php endif; ?>
   <?php if ($user->User_Type == 'student'): ?>
      <a href="<?php echo site_url('event_tracking');?>" class="btn btn-primary btn-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-2">View Joined Events</a>
   <?php endif; ?>
</div>
<div class="flex flex-row justify-center">
      
      <table class="table table-bordered table-striped border-2" id="event-list">
      
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
            <?php if ($user->User_Type == 'admin'): ?>
               <a href="<?php echo base_url('event/show/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">View</a>
               <a href="<?php echo base_url('event/edit/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">Edit</a>
               <form action=<?php echo '/event/destroy/'.$event['Event_ID'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">
                  <button type="submit">Delete</button>
               </form>
            <?php endif; ?>
            <?php if ($user->User_Type == 'student'): ?>
               <form action=<?php echo '/event_tracking/new/'.$event['Event_ID'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">
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