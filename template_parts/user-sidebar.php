<?php 
/**
 * User Sidebar Options
 * 
 */
?>
 
 <div class="login-option text-sm absolute top-10 -right-2 rounded shadow-lg p-4 w-80 bg-white hidden">
     <div class="mt-2 mb-4 flex justify-between">
         <span class="text-base">Dark Mode</span>
         <button class="dark-mode-btn border border-gray-600 bg-white text-gray-600 w-12 h-6 rounded-3xl">
             <i class="fa fa-sun text-xs"></i>
         </button>
     </div>
     <hr class="border border-b-0 border-gray-200">
     <p class="text-lg text-bold text-gray-600 mt-4 mb-2">Login to website</p>
     <form class="form">
         <input type="email" class="form-control outline-none px-2 py-2 w-full border rounded border-gray-100 focus:border-gray-300 mb-4" placeholder="Email">
         <input type="password" class="form-control outline-none px-2 py-2 w-full border rounded border-gray-100 focus:border-gray-300 mb-4" placeholder="Password">
         <div id="side-login-error"></div>
         <input type="submit" class="btn font-bold w-full bg-blue-500 hover:bg-blue-600 transiton-0.4 text-white" value="Login">

     </form>
     <p class="mt-3  text-center">
         <span>Do not have account?</span>&nbsp;
         <a href="login.php" class="underline text-blue-400">SignUp</a>
         <a href="forgot-pass.php" class="mt-1 mb-2 block underline text-blue-400 text-center">Forgot Password</a>
     </p>
 </div>