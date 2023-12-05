<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
    <td><?php echo $event['Event_Name']; ?></td>
    <td><?php echo $event['UIN']; ?></td>
    <td><?php echo $event['Program_Num']; ?></td>
    <td><?php echo $event['Start_Date']; ?></td>
    <td><?php echo $event['Start_Time']; ?></td>
    <td><?php echo $event['Location']; ?></td>
    <td><?php echo $event['End_Date']; ?></td>
    <td><?php echo $event['End_Time']; ?></td>
    <td><?php echo $event['Event_Type']; ?></td>
</div>
<?= $this->endSection() ?>