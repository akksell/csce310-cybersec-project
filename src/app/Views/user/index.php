<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-col w-full items-center pt-12">
  <div class="flex flex-row w-3/4 mb-8 items-center justify-between">
    <h1 class="text-4xl">All Users</h1>
    <a href="/admin/users/new" class="bg-emerald-500 text-gray-100 rounded-md p-2 hover:bg-emerald-700 transition duration-175 ease-in-out"><i class="fas fa-plus-circle"></i> Admin</a>
  </div>
  <table class="table-auto border-collapse border w-3/4 rounded">
    <thead class="border border-1">
      <tr>
        <th class="border-r border-1 p-3">
          <p>UIN</p>
        </th>
        <th class="border-r border-1 p-3">
          <p>Last Name</p>
        </th>
        <th class="border-r border-1 p-3">
          <p>First Name</p>
        </th>
        <th class="border-r border-1 p-3">
          <p>Username</p>
        </th>
        <th class="border-r border-1 p-3">
          <p>Permissions</p>
        </th>
        <th class="">
          Quick Actions
        </th>
      </tr>
    </thead>
    <tbody>
      <? foreach ($userList as $u): ?>
        <tr class="border-b border-1">
          <td class="border-r border-1 p-2">
            <p><?= $u['UIN'] ?></p>
          </td>
          <td class="border-r border-1 p-2">
            <p><?= $u['Last_Name'] ?></p>
          </td>
          <td class="border-r border-1 p-2">
            <p><?= $u['First_Name'] ?></p>
          </td>
          <td class="border-r border-1 p-2">
            <p><?= $u['Username'] ?></p>
          </td>
          <td class="border-r border-1 p-2">
            <p><?= $u['User_Type'] ?></p>
          </td>
          <td class="p-2">
            <div class="flex flex-row justify-around">
              <a href="/admin/users/@<?= $u['Username'] ?>">View</a>
              <a href="/admin/users/@<?= $u['Username'] ?>/edit">Edit</a>
            </div>
          </td>
        </tr>
      <? endforeach ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>