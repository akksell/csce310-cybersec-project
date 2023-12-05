<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table table-bordered table-striped" id="event-list">
    <a href="<?php echo base_url('event/create');?>" class="btn btn-primary btn-sm">Create</a>
       <thead>
          <tr>
             <th>Event Name</th>
             <th>UIN</th>
             <th>Program Number</th>
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
             <td><?php echo $event['UIN']; ?></td>
             <td><?php echo $event['Program_Num']; ?></td>
             <td><?php echo $event['Start_Date']; ?></td>
             <td><?php echo $event['Start_Time']; ?></td>
             <td><?php echo $event['Location']; ?></td>
             <td><?php echo $event['End_Date']; ?></td>
             <td><?php echo $event['End_Time']; ?></td>
             <td><?php echo $event['Event_Type']; ?></td>
             <td>
              <a href="<?php echo base_url('event/show/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm">View</a>
              <a href="<?php echo base_url('event/edit/'.$event['Event_ID']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('event/delete/'.$event['Event_ID']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
</div>
<?= $this->endSection() ?>