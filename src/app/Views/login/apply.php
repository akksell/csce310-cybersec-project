<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div class="">
    <form action="/apply" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2">
      <div class="flex flex-row items-center justify-items-center ">
        <label for="firstname-input" class="flex flex-col">
          First Name
          <input type="text" name="first_name" id="firstname-input" placeholder="John" class="" />
        </label>
        <label for="middleinitial-input" class="flex flex-col">
          Middle Initial
          <input type="text" name="middle_initial" id="middleinitial-input" maxlength="1" placeholder="D" class="" />
        </label>
        <label for="lastname-input" class="flex flex-col">
          Last Name
          <input type="text" name="last_name" id="lastname-input" placeholder="Smith" class="" />
        </label>
      </div>
      <div class="flex flex-col gap-y-3">
        <label for="uin-input" class="flex flex-col">
          First Name
          <input type="number" name="uin" id="uin-input" maxlength="9" placeholder="John" class="" />
        </label>
        <label class="flex flex-col">
          Email
          <input type="email" name="email" id="email-input" placeholder="you@example.com" class="mt-2" />
        </label>
        <label class="flex flex-col">
          Discord Username
          <input type="text" name="discord" id="discord-input" class="" />
        </label>
        <label class="flex flex-col">
          Username
          <input type="text" name="username" id="username-input" placeholder="username" class="" />
        </label>
        <label class="flex flex-col">
          Password
          <input type="password" name="password" id="password-input" placeholder="password" class="" />
        </label>
      </div>
      <button type="submit">Submit Application</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>