<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center h-screen">
  <div class="flex flex-col items-center justify-center h-full">
    <form action="/login" method="POST" accept-charset="utf-8" class="flex flex-col items-center gap-y-2">
      <div class="relative">
        <input type="text" name="Username" id="username-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="username-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Username</label>
      </div>
      <div class="relative">
          <input type="text" name="Password" id="password-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="password-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Password</label>
        </div>
      <button type="submit" class="px-4 py-2 rounded border border-1 w-full bg-slate-800 text-gray-100 hover:bg-slate-700 transition ease-in-out duration-175 mb-4">Sign In</button>
    </form>
  
    <span class="my-2">Don't have an account? <a href="/register" class="hover:text-blue-500 text-blue-800 transition ease-in-out duration-175">Register Now</a></span>

    <? if (isset($errors)): ?>
    <div class="mt-8">
      <ol class="">
        <? foreach ($errors as $err): ?>
          <li class="text-red-500"><?= $err ?></li>
        <? endforeach ?>
      </ol>
    </div>
    <? endif ?>
  </div>
</div>
<?= $this->endSection() ?>