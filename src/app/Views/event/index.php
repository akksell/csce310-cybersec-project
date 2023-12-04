<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <table class="table table-bordered table-striped" id="program-list">
    <a href="<?php echo base_url('program/create');?>" class="btn btn-primary btn-sm">Create</a>
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
             <td><?php echo $program['name']; ?></td>
             <td><?php echo $program['description']; ?></td>
             <td>
              <a href="<?php echo base_url('program/show/'.$program['program_num']);?>" class="btn btn-primary btn-sm">View</a>
              <a href="<?php echo base_url('program/edit/'.$program['program_num']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('program/delete/'.$program['program_num']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
</div>
<?= $this->endSection() ?>