<?php

/**
 * Categories
 */
?>

<div class="space-y-2">
    <?php
    if ($row = $db->fetch_All("category")) :
        foreach ($row as $data) :
    ?>
        <a href="#" data-id="<?php echo $data['cat_id']; ?>" class="category-id flex leading-4 items-center text-gray-700 font-semibold text-sm uppercase transition hover:text-blue-500">
                <span class="mr-2">
                    <i class="far fa-folder-open"></i>
                </span>
                <span><?php echo $data['cat_name']; ?></span>
                <p class="ml-auto font-normal">(12)</p>
        </a>
    <?php
        endforeach;
    endif;
    ?>
</div>