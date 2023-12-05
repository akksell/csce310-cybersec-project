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
             <th>Program Name</th>
             <th>Status</th>
          </tr>
       </thead>
       <tbody>
          <?php if($applications): ?>
          <?php foreach($applications as $application): ?>
          <tr>
             <td><?php echo $application['name']; ?></td>
             <td>
              <?php 
                if ($application['status'] == 0){echo "Pending";} 
                else{echo "Accepted";}
              ?>
             </td>
             <td>
              <a href="<?php echo base_url('application/edit/'.$application['app_num'].'/'.$application['program_num']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('application/delete/'.$application['app_num']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
</div>
<?= $this->endSection() ?>