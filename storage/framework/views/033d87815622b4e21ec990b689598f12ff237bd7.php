<form role="search" method="get" class="search-form" action="<?php echo e(home_url('/')); ?>">
  <label>
    <span class="sr-only">
      <?php echo e(_x('Search for:', 'label', 'sage')); ?>

    </span>

    <input
      type="search"
      class="px-3 py-1 border"
      placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'sage'); ?>"
      value="<?php echo e(get_search_query()); ?>"
      name="s"
    >
  </label>

  <input
    type="submit"
    class="px-3 py-1 text-white bg-indigo-500 cursor-pointer"
    value="<?php echo e(esc_attr_x('Search', 'submit button', 'sage')); ?>"
  >
</form>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/forms/search.blade.php ENDPATH**/ ?>