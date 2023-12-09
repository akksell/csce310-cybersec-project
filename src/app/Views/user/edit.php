<?= $this->extend('shared/layout') ?>

<?= $this->section('page_title') ?>
<title><?= esc($page_title) ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex flex-row justify-center">
  <div>
    <? if (isset($errors)): ?>
      <div class="mt-8">
        <ol class="">
          <? foreach ($errors as $err): ?>
            <li class="text-red-500"><?= $err ?></li>
          <? endforeach ?>
        </ol>
      </div>
    <? endif ?>

    <div class="flex flex-row justify-center">
      <h1>Edit <?= $user->Username ?>'s Profile</h1>
    </div>


    <? $action = $user && $sessionUser && $user->UIN === $sessionUser->UIN ? '/profile/update' : '/admin/users/' . $user->Username . '/update' ?>

    <form action="<?= $action ?>" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 py-8">
      <div class="flex flex-row gap-x-12">  
        <div class="flex flex-col items-center justify-items-center gap-4" id="multi-form-page">
          <div class="relative">
            <input type="text" name="First_Name" id="firstname-input" value="<?= $user->First_Name ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="firstname-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">First Name</label>
          </div>
          <div class="relative">
            <input type="text" name="M_Initial" id="middleinitial-input" value="<?= $user->M_Initial ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="middleinitial-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Middle Initial</label>
          </div>
          <div class="relative">
            <input type="text" name="Last_Name" id="lastname-input" value="<?= $user->Last_Name ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="lastname-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Last Name</label>
          </div>
          <div class="relative">
            <input type="tel" name="UIN" id="uin-input" value="<?= $user->UIN ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="uin-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">UIN</label>
          </div>
          <div class="relative">
            <input type="email" name="Email" id="email-input" value="<?= $user->Email ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="email-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Email</label>
          </div>
          <div class="relative pb-4 border-b border-1">
            <input type="text" name="Discord_Name" id="discord-input" value="<?= $user->Discord_Name ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="discord-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Discord Username</label>
          </div>
          <div class="relative">
            <input type="text" name="Username" id="username-input" value="<?= $user->Username ?>" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="username-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Username</label>
          </div>
        </div>

        <? if ($user->hasPermission('student')): ?>
          <div class="flex flex-col gap-4" id="multi-form-page">
            <div class="relative">
              <input type="text" name="Gender" id="gender-input" required value="<?= $user->Gender ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="gender-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Gender</label>
            </div>
            <div class="relative">
              <input type="checkbox" name="Hispanic_Latino" id="hispanic-latino-input" <?= $user->Hispanic_Latino ? "checked" : "" ?> value class="peer" placeholder=" " />
              <label for="hispanic-latino-input" class="text-sm text-gray-500 duration-300 transform z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you Hispanic or Latino?</label>
            </div>
            <div class="relative">
              <select type="select" name="Race" id="race-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <option <?= $user->Race === "American India" ? "selected" : '' ?> value="American Indian">American Indian or Alaskan Native</option>
                <option <?= $user->Race === "Asian" ? "selected" : '' ?> value="Asian">Asian</option>
                <option <?= $user->Race === "Pacific Islander" ? "selected" : '' ?> value="Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                <option <?= $user->Race === "White" ? "selected" : '' ?> value="White">White</option>
                <option <?= $user->Race === "NA" ? "selected" : '' ?> value="NA">I do not wish to provide this information</option>
              </select>
              <label for="race-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Race</label>
            </div>
            <div class="relative">
              <input type="checkbox" name="US_Citizen" <?= $user->US_Citizen ? "checked" : "" ?> id="us-citizen-input" value class="peer" placeholder=" " />
              <label for="us-citizen-input" class="text-sm text-gray-500 duration-300 z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you a U.S. Citizen?</label>
            </div>
            <div class="relative">
              <input type="checkbox" name="First_Generation" id="first-gen-input" <?= $user->First_Generation ? "checked" : "" ?> class="peer" placeholder=" " />
              <label for="first-gen-input" class="text-sm text-gray-500 duration-300 z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you a first generation College Student?</label>
            </div>
            <div class="relative">
              <input type="date" name="DoB" id="dob-input" required value="<?= $user->DoB ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="dob-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Date of Birth</label>
            </div>
            <div class="relative">
              <input type="text" name="GPA" id="gpa-input" required pattern="[0-9]\.[0-9]{2}" maxlength="4" value="<?= $user->GPA ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="gpa-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">GPA</label>
            </div>
            <div class="relative">
              <input type="text" name="Major" id="major-input" required value="<?= $user->Major ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="major-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Major</label>
            </div>
            <div class="relative">
              <input type="text" name="Minor_1" id="minor-1-input" value="<?= $user->Minor_1 ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="minor-1-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Minor #1</label>
            </div>
            <div class="relative">
              <input type="text" name="Minor_2" id="minor-2-input" value="<?= $user->Minor_2 ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="minor-2-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Minor #2</label>
            </div>
            <div class="relative">
              <input type="text" name="Expected_Graduation" id="exp-grad-input" required  value="<?= $user->Expected_Graduation ?>" minlength="4" maxlength="4" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="exp-grad-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Graduation Year</label>
            </div>
            <div class="relative">
              <input type="text" name="School" id="school-input" required value="<?= $user->School ?>" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="school-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">School</label>
            </div>
            <div class="relative">
              <select type="select" name="Classification" id="class-input" required value="<?= $user->Classification ?>"class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <option <?= $user->Classification === "Freshman" ? "selected" : '' ?> value="Freshman">Freshman</option>
                <option <?= $user->Classification === "Sophomore" ? "selected" : '' ?> value="Sophomore">Sophomore</option>
                <option <?= $user->Classification === "Junior" ? "selected" : '' ?> value="Junior">Junior</option>
                <option <?= $user->Classification === "Senior" ? "selected" : '' ?> value="Senior">Senior</option>
              </select>
              <label for="class-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Classification</label>
            </div>
            <div class="relative">
              <input type="tel" name="Phone" id="phone-input" required value="<?= $user->Phone ?>" maxlength="10" minlength="10" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="phone-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Phone Number</label>
            </div>
          </div>
        <? endif ?>
      </div>

      <button type="submit">Save Changes</button>
    </form>
    
    <div class="flex flex-col items-center justify-center">
      <? $updatePassAction = ($user->UIN !== $sessionUser->UIN && $sessionUser->hasPermission('admin')) ? "/admin/users/" . $user->UIN . "/updatePassword" : "/profile/updatePassword" ?>
      <form action=<?= $updatePassAction?> method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center gap-4">
        <? if (!$sessionUser->hasPermission('admin') || $user->UIN === $sessionUser->UIN): ?>  
          <div class="relative pb-4 border-b border-1">
              <input type="password" name="OldPassword" id="oldpass-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="oldpass-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Old Password</label>
          </div>
        <? endif ?>
        <div class="relative">
          <input type="password" name="NewPassword" id="newpass-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="newpass-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">New Password</label>
        </div>
        <div class="relative">
          <input type="password" name="ConfirmNewPassword" id="confnewpass-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="confnewpass-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Confirm New Password</label>
        </div>

        <button type="submit">Change Password</button>
      </form>
    </div>
    
  </div>
</div>
<?= $this->endSection() ?>