<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table table-bordered table-striped" id="application-list">
       <thead>
          <tr>
             <?php if ($user->hasPermission('admin')): ?>
             <th>First Name</th>
             <th>Last Name</th>
             <?php endif; ?>
             <th>Program Name</th>
             <th>Status</th>
          </tr>
       </thead>
       <tbody>
          <?php if($applications): ?>
          <?php foreach($applications as $application): ?>
          <tr>
             <?php if ($user->hasPermission('admin')): ?>
             <td><?php echo $application['First_Name']; ?></td>
             <td><?php echo $application['Last_Name']; ?></td>
             <?php endif; ?>
             <td><?php echo $application['name']; ?></td>
             <td>
              <?php 
                if ($application['status'] == 2){echo "Pending";} 
                elseif ($application['status'] == 1){echo "Accepted";}
                else{echo "Rejected";}
              ?>
             </td>
             <td>
              <?php if ($user->hasPermission('student')): ?>
                <a href="<?php echo base_url('application/edit/'.$application['app_num'].'/'.$application['program_num']);?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="<?php echo base_url('application/delete/'.$application['app_num']);?>" class="btn btn-danger btn-sm">Delete</a>
              <?php endif; ?>
              <a href="<?php echo base_url('document/show/'.$application['app_num']);?>" class="btn btn-primary btn-sm">View Documents</a>
              <?php if ($user->hasPermission('admin')): ?>
                <a href="<?php echo base_url('application/review/'.$application['app_num'].'/'.$application['program_num']);?>" class="btn btn-primary btn-sm">Review</a>
              <?php endif; ?>
             </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
</div>
<?= $this->endSection() ?>