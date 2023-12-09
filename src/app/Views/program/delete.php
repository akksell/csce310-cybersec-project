<!-- Evan Burriola -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <td><?php echo $program['name']; ?></td>
    <td><?php echo $program['description']; ?></td>
    <form action=<?php echo "/program/destroy/".$program['program_num'] ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete Program</button>
    </form>
</div>
<?= $this->endSection() ?>