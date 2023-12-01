<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <td><?php echo $program['name']; ?></td>
    <td><?php echo $program['description']; ?></td>
    <a href="<?php echo base_url('program/destroy/'.$program['program_num']);?>" class="btn btn-primary btn-sm">Confirm Delete</a>
</div>
<?= $this->endSection() ?>