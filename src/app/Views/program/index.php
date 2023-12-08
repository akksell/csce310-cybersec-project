<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table table-bordered table-striped" id="program-list">
    <?php if($user->hasPermission('admin')): ?>
    <a href="<?php echo base_url('program/create');?>" class="btn btn-primary btn-sm">New Program</a>
    <?php endif; ?>
       <thead>
          <tr>
             <th>Name</th>
             <th>Description</th>
          </tr>
       </thead>
       <tbody>
          <?php if($programs): ?>
          <?php foreach($programs as $program): ?>
          <tr>
             <?php if($user->hasPermission('admin') || $program['is_accessible'] == '1'): ?>
              <td><?php echo $program['name']; ?></td>
              <td><?php echo $program['description']; ?></td>
              <td>
             
             <td>
              <a href="<?php echo base_url('program/show/'.$program['program_num']);?>" class="btn btn-primary btn-sm">View</a>
              <?php if($user->hasPermission('admin')): ?>
              <a href="<?php echo base_url('program/edit/'.$program['program_num']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('program/delete/'.$program['program_num']);?>" class="btn btn-danger btn-sm">Delete</a>
              
              <form action=<?php echo "/program/activation/".$program['program_num'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
                  <div class="flex flex-col items-left justify-items-center">
                  <?php if($program['is_accessible'] == '1'):?>
                    <button type="submit" name="status" value="0">Deactivate</button>
                  <?endif;?>
                  <?php if($program['is_accessible'] == '0'):?>
                    <button type="submit" name="status" value="1">Activate</button>
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
</div>
<?= $this->endSection() ?>