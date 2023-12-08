<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="">
    <form action="/register" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center ">
        <label for="firstname-input" class="flex flex-col">
          First Name
          <input type="text" name="First_Name" id="firstname-input" placeholder="John" class="" required/>
        </label>
        <label for="middleinitial-input" class="flex flex-col">
          Middle Initial
          <input type="text" name="M_Initial" id="middleinitial-input" maxlength="1" placeholder="D" class="" required />
        </label>
        <label for="lastname-input" class="flex flex-col">
          Last Name
          <input type="text" name="Last_Name" id="lastname-input" placeholder="Smith" class="" required/>
        </label>
      </div>
      <div class="flex flex-col gap-y-3">
        <label for="uin-input" class="flex flex-col">
          UIN
          <input type="tel" name="UIN" id="uin-input" maxlength="9" minlength="9" placeholder="123456789" class="" required />
        </label>
        <label class="flex flex-col">
          Email
          <input type="email" name="Email" id="email-input" placeholder="you@example.com" class="mt-2" required />
        </label>
        <label class="flex flex-col">
          Discord Username
          <input type="text" name="Discord_Name" id="discord-input" placeholder="Discord Username" class="" required />
        </label>
        <label class="flex flex-col">
          Username
          <input type="text" name="Username" id="username-input" placeholder="username" class="" required />
        </label>
        <label class="flex flex-col">
          Password
          <input type="password" name="Password" id="password-input" placeholder="password" class="" required />
        </label>
      </div>
      <button type="submit">Submit Application</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>