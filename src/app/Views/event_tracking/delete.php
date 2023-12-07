<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <td><?php echo $event_tracking['Event_ID']; ?></td>
    <td><?php echo $event_tracking['UIN']; ?></td>
    <form action=<?php echo "/event_tracking/destroy/".$event_tracking['ET_Num'] ?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
        <button type="submit">Unjoin Event</button>
    </form>
</div>
<?= $this->endSection() ?>