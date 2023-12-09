<!-- Min Zhang -->
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if ($user->User_Type == 'student'): ?>
   <div class="flex flex-row justify-center">
      <a href="<?php echo base_url('document/create/'.$id);?>" class="btn btn-primary btn-sm  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 my-2">Add Document</a>
   </div>
<?php endif; ?>
<div class="flex flex-row justify-center my-2">
      <table class="table table-bordered table-striped boder-2 my-2" id="event-list">
      <thead>
         <tr>
            <th class="border-2 px-2">Document Link</th>
            <th class="border-2 px-2">Document Type</th>
         </tr>
      </thead>
      <tbody>
         <?php if($docs): ?>
         <?php foreach($docs as $doc): ?>
         <tr>
            <td class="border-2 px-2"><?php echo $doc['link']; ?></td>
            <td class="border-2 px-2"><?php echo $doc['doc_type']; ?></td>
            <?php if ($user->User_Type == 'student'): ?>
            <td class="border-2 px-2">
            <a href="<?php echo base_url('document/edit/'.$doc['doc_num']);?>" class="btn btn-primary btn-sm font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">Edit</a>
            <form action=<?php echo '/document/destroy/'.$doc['doc_num'];?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">
               <button type="submit">Delete</button>
            </form>
            </td>
            <?php endif; ?>
         </tr>
         <?php endforeach; ?>
         <?php endif; ?>
      </tbody>
   </table>
</div>
<?= $this->endSection() ?>