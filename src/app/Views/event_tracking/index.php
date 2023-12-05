<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table table-bordered table-striped" id="event-list">
    <a href="<?php echo base_url('event_tracking/create');?>" class="btn btn-primary btn-sm">Create</a>
       <thead>
          <tr>
             <th>Event ID</th>
             <th>Student UIN</th>
          </tr>
       </thead>
       <tbody>
          <?php if($events_tracking): ?>
          <?php foreach($events_tracking as $event_tracking): ?>
          <tr>
             <td><?php echo $event_tracking['Event_ID']; ?></td>
             <td><?php echo $event_tracking['UIN']; ?></td>
             <td>
              <a href="<?php echo base_url('event_tracking/show/'.$event_tracking['ET_Num']);?>" class="btn btn-primary btn-sm">View</a>
              <a href="<?php echo base_url('event_tracking/edit/'.$event_tracking['ET_Num']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('event_tracking/delete/'.$event_tracking['ET_Num']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
</div>
<?= $this->endSection() ?>