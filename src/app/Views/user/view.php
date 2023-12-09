<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<? if (!$user): ?>
  <div>
    <h1>User Not Found</h1>
  </div>
<? else: ?>
  <div class="py-12 px-8">
    <div class="flex flex-col">
      <div class="flex flex-row justify-between items-start">
        <div>
          <? $typeColor = $user->hasPermission('admin') ? "bg-indigo-700" : "bg-sky-600" ?>
          <? $statColor = $user->Status === "active" ? "bg-emerald-500" : "bg-rose-500" ?>
          <h2 class="font-bold text-3xl flex items-center gap-2">
            <?= $user->First_Name . " " . $user->M_Initial . " " . $user->Last_Name ?>
            <span class="ml-2 font-normal text-sm py-2 px-3 rounded-full text-gray-100 <?= $typeColor ?>"><?= $user->User_Type ?></span>
            <span class="font-normal text-sm py-2 px-3 rounded-full text-gray-100 <?= $statColor ?>"><?= $user->Status ?> </span>
          </h2>
          <h3 class="text-2xl italic mb-2">@<?= $user->Username ?></h4>
        </div>
        <div class="flex flex-row items-start h-full gap-4 pt-2">
          <? if ($sessionUser->hasPermission('admin') && !$user->hasPermission('admin')): ?>
            <form action=<?= "/admin/users/promote/" . $user->UIN ?> method="POST" accept-charset="utf-8" class="">
              <button type="submit" class="">Promote to Admin</button>
            </form>
          <? endif ?>
          <a href=<?= $sessionUser && $user && $user->UIN === $sessionUser->UIN ? "/profile/edit" : "/admin/users/@" . $user->Username . "/edit" ?>>Edit Profile</a>
          <? if ($user->Status !== "deactivated"): ?>
            <button onClick="openCancelModal()">Deactivate Account</button>
          <? endif ?>
          <? if ($sessionUser->hasPermission('admin') && !$user->hasPermission('admin')): ?>
            <form action=<?= "/admin/users/" . $user->UIN . "/delete" ?> method="POST" accept-charset="utf-8">
              <button class="text-red-400 hover:text-red-600" type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
          <? endif ?>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">  
        <div class="p-4 shadow-md rounded-md">  
          <h3 class="font-bold text-lg">Contact</h3>
          <h4><i class="fas fa-envelope mr-2"></i><?= $user->Email ?></h4>
          <? if ($user->hasPermission('student')): ?>
            <h5><i class="fas fa-mobile-alt ml-1 mr-3"></i><?= $user->Phone ?></h5>
          <? endif ?>
          <h4><i class="fab fa-discord mr-2"></i><?= $user->Discord_Name ?></h4>
        </div>
        <? if ($user->hasPermission('student')): ?>
        <div class="p-4 shadow-md rounded-md">
          <h3 class="font-bold text-lg">Bio</h3>
          <h4><?= $user->Gender ?></h4>
          <h4><?= $user->Race ?></h4>
          <h4>🎂 <?= date_format(date_create($user->DoB), "M d, Y") ?></h4>
          <h4><?= $user->Hispanic_Latino ? "🇪🇸 Hispanic or Latino" : "Not Hispanic or Latino" ?></h4>
          <h4><?= $user->US_Citizen ? "🇺🇸 U.S. Citizen" : "👽 International" ?></h4>
          <h4><?= $user->First_Generation ? "🥇 First Generation Student" : ""?></h4>
        </div>
        <div class="p-4 shadow-md rounded-md">
          <h3 class="font-bold text-lg">School Info</h3>
          <h4 class="flex justify-between">School <span class="font-light text-gray-500"><?= $user->School ?></span></h4>
          <h4 class="flex justify-between">Major <span class="font-light text-gray-500"><?= $user->Major ?></span></h4>
          <h4 class="flex justify-between">Minor 1 <span class="font-light text-gray-500"><?= $user->Minor_1 ?></span></h4>
          <h4 class="flex justify-between">Minor 2 <span class="font-light text-gray-500"><?= $user->Minor_2 ?></span></h4>
          <h4 class="flex justify-between">GPA <span class="font-light text-gray-500"><?= $user->GPA ?></span></h4>
          <h4 class="flex justify-between">Classification <span class="font-light text-gray-500"><?= $user->Classification ?></span></h4>
          <h4 class="flex justify-between">Graduation <span class="font-light text-gray-500">'<?= # date_format(date_create('01/01/' . $user->Expected_Graduation), 'y') ?></span></h4>
        </div>
      <? endif ?>
      </div>
    </div>
  </div>
<? endif ?>
<?= $this->endSection() ?>

<?= $this->section('overlays') ?>
<div id="cancel-modal-container" class="w-screen h-screen flex backdrop-brightness-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
        <h3 class="text-xl font-semibold text-gray-700">
          Deactivate Account?
        </h3>
        <button type="button" onClick="closeCancelModal()" class="text-gray-400 bg-transparent hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>

      <div class="flex items-center justify-start px-4 py-2">
        <p>This action cannot be undone and you will no longer be able to access the TAMUCC System.</p>
      </div>

      <div class="flex items-center justify-end px-4 py-4">
        <button onClick="closeCancelModal()" class="px-4 py-2 rounded border mr-4 hover:bg-gray-200 transition-all ease-in-out duration-300">Cancel</button>
        <form action=<?= $sessionUser && $user && $user->UIN === $sessionUser->UIN ? "/profile/deactivate" : "/admin/users/" . $user->Username . "/deactivate" ?> method="POST" accept-charset="utf-8" class="px-4 py-2 rounded border bg-red-500 text-white hover:cursor-pointer hover:bg-red-700 transition-all ease-in-out duration-300">
          <button type="submit" class="">Deactivate</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  function openCancelModal() {
    var modal = document.querySelector('#cancel-modal-container');
    modal.classList.remove('hidden');
  }

  function closeCancelModal() {
    var modal = document.querySelector('#cancel-modal-container');
    modal.classList.add('hidden');
  }
</script>
<?= $this->endSection() ?>