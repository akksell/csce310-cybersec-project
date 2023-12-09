<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div>
    <div class="flex flex-row justify-start py-4">
      Create a New Admin
    </div>

    <form action="/admin/users/new" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 py-4">
      <div class="flex flex-col items-center justify-items-center gap-4" id="multi-form-page">
        <div class="relative">
          <input type="text" name="First_Name" id="firstname-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="firstname-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">First Name</label>
        </div>
        <div class="relative">
          <input type="text" name="M_Initial" id="middleinitial-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="middleinitial-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Middle Initial</label>
        </div>
        <div class="relative">
          <input type="text" name="Last_Name" id="lastname-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="lastname-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Last Name</label>
        </div>
        <div class="relative">
          <input type="tel" name="UIN" id="uin-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="uin-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">UIN</label>
        </div>
        <div class="relative">
          <input type="email" name="Email" id="email-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="email-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Email</label>
        </div>
        <div class="relative pb-4 border-b border-1">
          <input type="text" name="Discord_Name" id="discord-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="discord-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Discord Username</label>
        </div>
        <div class="relative">
          <input type="text" name="Username" id="username-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="username-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Username</label>
        </div>
        <div class="relative">
          <input type="password" name="Password" id="password-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="password-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Password</label>
        </div>
      </div>

      
        <button type="submit">Create User</button>
      </div>
    </form>

  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  var currentIndex = 0;
  var elements = document.querySelectorAll("#multi-form-page");
  var labels = document.querySelectorAll("#form-step-label");

  function showForm() {
    for (var i = 0; i < elements.length; i++) {
      elements[i].classList.add('hidden');
    }
    elements[currentIndex].classList.remove('hidden');
  }

  function prev() {
    currentIndex -= 1;
    if (currentIndex < 0) {
      currentIndex = 0;
    }

    labels[currentIndex + 1].classList.remove('text-blue-600');
    showForm(currentIndex);
  }

  function next() {
    currentIndex += 1;
    if (currentIndex >= elements.length) {
      currentIndex = elements.length - 1;
    }
    labels[currentIndex].classList.add('text-blue-600');
    showForm(currentIndex);

  }
  console.log(elements);
  showForm(currentIndex);
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>