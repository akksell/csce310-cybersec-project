<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('shared/head_includes') ?>
    <?= $this->renderSection('page_title') ?>
  </head>



  <nav class="bg-red-950 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="logo.png" class="h-8" alt="CSS Logo" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-red-950 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <a href="/program" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Programs</a>
        </li>
        <li>
          <a href="/event" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Events</a>
        </li>
        <li>
          <a href="/application" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Applications</a>
        </li>
        <?php if(sessionUser()->hasPermission('admin')): ?>
          <li>
            <a href="/admin/users" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Users</a>
          <li>
        <?php endif; ?>
          <a href="/profile" class="block py-2 px-3 text-white hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:border-b-2 md:hover:border-b-white md:p-0 dark:text-white md:dark:hover:border-b-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

  
  <body class="m-0 p-0">
    <div class="container mx-auto">
      <?= $this->renderSection('content') ?>
    </div>
  </body>
</html>