<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table-fixed w-2/3 border  my-2" id="application-list">
       <thead>
          <tr class="border-2">
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
          <tr class="border-2">
             <?php if ($user->hasPermission('admin')): ?>
             <td class="text-center"><?php echo $application['First_Name']; ?></td>
             <td class="text-center"><?php echo $application['Last_Name']; ?></td>
             <?php endif; ?>
             <td class="text-center"><?php echo $application['name']; ?></td>
             <td class="text-center">
              <?php 
                if ($application['status'] == 2){echo "Pending";} 
                elseif ($application['status'] == 1){echo "Accepted";}
                else{echo "Rejected";}
              ?>
             </td>
             <td class="text-center">
              <?php if ($user->hasPermission('student')): ?>
                <a href="<?php echo base_url('application/edit/'.$application['app_num'].'/'.$application['program_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                <a href="<?php echo base_url('application/delete/'.$application['app_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
              <?php endif; ?>
              <a href="<?php echo base_url('document/show/'.$application['app_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">View Documents</a>
              <?php if ($user->hasPermission('admin')): ?>
                <a href="<?php echo base_url('application/review/'.$application['app_num'].'/'.$application['program_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Review</a>
              <?php endif; ?>
             </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
    <div class="h-10 pt-2">
      <?php if($user->hasPermission('student')): ?>
         <a href="<?php echo base_url('application/create');?>" class="btn btn-primary btn-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Apply</a>
      <? endif;?>
   </div>
</div>
<?= $this->endSection() ?>