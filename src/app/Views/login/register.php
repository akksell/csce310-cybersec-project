<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->include('shared/head_includes') ?>
    <title><?= esc($page_title) ?></title>
  </head>
  <body class="m-0 p-0">
    <div class="container mx-auto">
      <div class="flex flex-row justify-center">
        <div>
          <div class="flex flex-row justify-center">
            <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
              <li class="flex w-full items-center text-blue-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-600 after:border-1 after:inline-block after:mx-6" id="form-step-label">
                <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                  <span class="me-2">1.</span>
                  User <span class="hidden sm:inline-flex sm:ms-2">Information</span>
                </span>
              </li>
              <li class="flex items-center" id="form-step-label">
                <span class="flex items-center sm:after:hidden after:mx-2 after:text-gray-200">
                  <span class="me-2">2.</span>
                  Student <span class="hidden sm:inline-flex sm:ms-2">Information</span>
                </span>
              </li>
            </ol>
          </div>

          <form action="/register" method="POST" accept-charset="utf-8" class="flex flex-col items-center justify-center items-center gap-y-2 py-8">
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

            <div class="flex flex-col gap-4" id="multi-form-page">
              <div class="relative">
                <input type="text" name="Gender" id="gender-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="gender-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Gender</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="Hispanic_Latino" id="hispanic-latino-input" value class="peer" placeholder=" " />
                <label for="hispanic-latino-input" class="text-sm text-gray-500 duration-300 transform z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you Hispanic or Latino?</label>
              </div>
              <div class="relative">
                <select type="select" name="Race" id="race-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                  <option hidden disabled selected value>Select a Race</option>
                  <option value="American Indian">American Indian or Alaskan Native</option>
                  <option value="Asian">Asian</option>
                  <option value="Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                  <option value="White">White</option>
                  <option value="NA">I do not wish to provide this information</option>
                </select>
                <label for="race-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Race</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="US_Citizen" id="us-citizen-input" value class="peer" placeholder=" " />
                <label for="us-citizen-input" class="text-sm text-gray-500 duration-300 z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you a U.S. Citizen?</label>
              </div>
              <div class="relative">
                <input type="checkbox" name="First_Generation" id="first-gen-input" value class="peer" placeholder=" " />
                <label for="first-gen-input" class="text-sm text-gray-500 duration-300 z-10 peer-focus:text-blue-600 peer-placeholder-shown:scale-100">Are you a first generation College Student?</label>
              </div>
              <div class="relative">
                <input type="date" name="DoB" id="dob-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="dob-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Date of Birth</label>
              </div>
              <div class="relative">
                <input type="number" name="GPA" id="gpa-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="gpa-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">GPA</label>
              </div>
              <div class="relative">
                <input type="text" name="Major" id="major-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="major-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Major</label>
              </div>
              <div class="relative">
                <input type="text" name="Minor_1" id="minor-1-input" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="minor-1-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Minor #1</label>
              </div>
              <div class="relative">
                <input type="text" name="Minor_2" id="minor-2-input" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="minor-2-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Minor #2</label>
              </div>
              <div class="relative">
                <input type="text" name="Expected_Graduation" id="exp-grad-input" required minlength="4" maxlength="4" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="exp-grad-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Graduation Year</label>
              </div>
              <div class="relative">
                <input type="text" name="School" id="school-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="school-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">School</label>
              </div>
              <div class="relative">
                <select type="select" name="Classification" id="class-input" required class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                  <option hidden disabled selected value>Select Your Classification</option>
                  <option value="Freshman">Freshman</option>
                  <option value="Sophomore">Sophomore</option>
                  <option value="Junior">Junior</option>
                  <option value="Senior">Senior</option>
                </select>
                <label for="class-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Classification</label>
              </div>
              <div class="relative">
                <input type="tel" name="Phone" id="phone-input" required maxlength="10" minlength="10" class="block rounded border border-1 px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="phone-input" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Phone Number</label>
              </div>

              <button type="submit">Register</button>
            </div>
          </form>

          <div class="flex flex-row justify-between pb-12">
            <div>
              <button onClick="prev()">Previous</button>
            </div>
            <div>
              <button onClick="next()">Next</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
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
    showForm(currentIndex);
  </script>
</html>