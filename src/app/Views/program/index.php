<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table-fixed w-2/3 border" id="program-list">
       <thead>
          <tr>
             <th>Name</th>
             <th>Description</th>
          </tr>
       </thead>
       <tbody>
          <?php if($programs): ?>
          <?php foreach($programs as $program): ?>
          <tr class="border-2">
             <?php if($user->hasPermission('admin') || $program['is_accessible'] == '1'): ?>
              <td class="text-center"><?php echo $program['name']; ?></td>
              <td class="text-xs"><?php echo $program['description']; ?></td>
              <td>
             
             <td class="text-center">
              <a href="<?php echo base_url('program/show/'.$program['program_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
              <?php if($user->hasPermission('admin')): ?>
              <a href="<?php echo base_url('program/edit/'.$program['program_num']);?>" class="px-1 btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
              <a href="<?php echo base_url('program/delete/'.$program['program_num']);?>" class="px-1 btn btn-danger btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
              
              <form action=<?php echo "/program/activation/".$program['program_num'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
                  <div class="flex flex-col items-left justify-items-center">
                  <?php if($program['is_accessible'] == '1'):?>
                    <button type="submit" name="status" value="0" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Deactivate</button>
                  <?endif;?>
                  <?php if($program['is_accessible'] == '0'):?>
                    <button type="submit" name="status" value="1" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Activate</button>
                  <?endif;?>
                </div>
                </form>

              <?php endif;?>
              </td>
            <?php endif;?>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
  <div class="h-10 pt-2">
    <?php if($user->hasPermission('admin')): ?>
      <a href="<?php echo base_url('program/create');?>" class="btn btn-primary btn-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">New Program</a>
    <?php endif; ?>
    <?php if($user->hasPermission('student')): ?>
      <a href="<?php echo base_url('application/create');?>" class="btn btn-primary btn-sm text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Apply</a>
    <? endif;?>
  </div>
</div>


<?= $this->endSection() ?>