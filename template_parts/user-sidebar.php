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
    <?php if (!isset($user_id)) : ?>
        <p class="text-lg text-bold text-gray-600 mt-4 mb-2">Login to website</p>
        <form class="form" id="login-form">

            <input type="email" name="email" class="form-control outline-none px-2 py-2 w-full border rounded border-gray-100 focus:border-gray-300 mb-4" placeholder="Enter your email" autocomplete="off" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Enter Valid Email" value="<?php echo (isset($_COOKIE['email'])) ? $_COOKIE['email'] : ''; ?>" required="required">

            <input type="password" name="password" class="form-control outline-none px-2 py-2 w-full border rounded border-gray-100 focus:border-gray-300 mb-4" placeholder="Your Password" pattern=".{6,}" title="At least 6 or more characters needed" value="<?php echo (isset($_COOKIE['pass'])) ? $_COOKIE['pass'] : ''; ?>" required="required">
            
            <div class="remember mb-3">
                <input type="checkbox" class="check-input" name="remember" value="rem" id="remember">
                <label for="remember" class="remember-label cursor-pointer text-blue-500 text-base">&nbsp;Remember me</label>
            </div>

            <div id="login-error"></div>
            <input type="submit" id="login-btn" class="btn font-bold w-full bg-blue-500 hover:bg-blue-600 transiton-0.4 text-white" value="Login">

        </form>
        <p class="mt-3  text-center">
            <span>Do not have account?</span>&nbsp;
            <a href="login.php" class="underline text-blue-400">SignUp</a>
            <a href="forgot-pass.php" class="mt-1 mb-2 block underline text-blue-400 text-center">Forgot Password</a>
        </p>
    <?php else : ?>
        <div class="user-profile pt-3">
            <p class="text-base py-1 capitalize">
                <i class="fa fa-user text-blue-500"></i>
                <span>&nbsp;<?php echo $user_name; ?></span>
            </p>
            <p class="text-base py-1">
                <i class="fa fa-envelope text-blue-500"></i>
                <span>&nbsp;<?php echo $user_email; ?></span>
            </p>

            <a href="" class="block py-1 text-gray-600 hover:text-blue-600 transition-0.2 text-base">
                <i class="fa fa-eye text-blue-500"></i>
                <span>&nbsp;View Profile</span>
            </a>
            <a href="logout.php" class="block py-1 text-gray-600 hover:text-blue-600 transition-0.2 text-base">
                <i class="fas fa-sign-out-alt text-blue-500"></i>
                <span>&nbsp;Logout</span>
            </a>
        </div>
    <?php endif; ?>
</div>