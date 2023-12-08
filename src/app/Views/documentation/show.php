<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if ($user->User_Type == 'student'): ?>
   <div class="flex flex-row justify-center">
      <a href="<?php echo base_url('document/create/'.$id);?>" class="btn btn-primary btn-sm">Add Document</a>
   </div>
<?php endif; ?>
<div class="flex flex-row justify-center">
      <table class="table table-bordered table-striped" id="event-list">
      <thead>
         <tr>
            <th>Document Link</th>
            <th>Document Type</th>
         </tr>
      </thead>
      <tbody>
         <?php if($docs): ?>
         <?php foreach($docs as $doc): ?>
         <tr>
            <td><?php echo $doc['link']; ?></td>
            <td><?php echo $doc['doc_type']; ?></td>
            <td>
            <?php if ($user->User_Type == 'student'): ?>
            <a href="<?php echo base_url('document/edit/'.$doc['doc_num']);?>" class="btn btn-primary btn-sm">Edit</a>
            <form action=<?php echo '/document/destroy/'.$doc['doc_num'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
               <button type="submit">Delete</button>
            </form>
            <?php endif; ?>
            </td>
         </tr>
         <?php endforeach; ?>
         <?php endif; ?>
      </tbody>
   </table>
</div>
<?= $this->endSection() ?>