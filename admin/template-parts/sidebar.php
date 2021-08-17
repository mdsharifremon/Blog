<?php

/**
 * Template Sidebar Menu
 */

function menu_active($param)
{
    $page_name = basename($_SERVER['PHP_SELF'], '.php');
    if ($param === $page_name) {
        echo 'active';
    }
}


?>

<div class="sidebar bg-gray-800">
    <ul class="nav-list">
        <li>
            <a href="dashboard.php" class="<?php menu_active('dashboard'); ?>">
                <i class='fa fa-th-large'></i>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="taxonomy.php" class="<?php menu_active('taxonomy'); ?>">
                <i class='fa fa-tags'></i>
            </a>
            <span class="tooltip">Taxonomy</span>
        </li>
        <li>
            <a href="users.php" class="<?php menu_active('users'); ?>">
                <i class='fa fa-users'></i>
            </a>
            <span class="tooltip">Users</span>
        </li>
        <li>
            <a href="message.php" class="<?php menu_active('message'); ?>">
                <i class='fa fa-envelope'></i>
            </a>
            <span class="tooltip">Messages</span>
        </li>
        <li>
            <a href="#">
                <i class='fa fa-file-alt'></i>
            </a>
            <span class="tooltip">File Manager</span>
        </li>
        <li>
            <a href="#">
                <i class='fa fa-list-alt'></i>
            </a>
            <span class="tooltip">Order</span>
        </li>
        <li>
            <a href="#">
                <i class='fa fa-heart'></i>
            </a>
            <span class="tooltip">Saved</span>
        </li>
        <li>
            <a href="settings.php" class="<?php menu_active('settings'); ?>">
                <i class='fa fa-cogs'></i>
            </a>
            <span class="tooltip">Setting</span>
        </li>
    </ul>
</div>