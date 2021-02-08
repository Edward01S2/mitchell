<nav id="nav" x-data="{open: false}" class="absolute top-0 left-0 right-0 z-50 w-full bg-transparent">
  <div class="container px-6 py-2 mx-auto lg:px-8 md:py-6 lg:py-8">
    <div class="flex items-center justify-between">

      <div class="lg:flex-shrink-0">
        <div class="flex items-center flex-shrink-0 md:justify-center">
          <a href="<?php echo home_url('/'); ?>" class="hover:opacity-50">
            <img id="logo-main" class="w-auto h-16 md:h-20" src="<?php echo $logo['url']; ?>" alt="<?php echo e($siteName); ?>" />
          </a>
        </div>
      </div>

      <div class="items-center hidden nav-container md:flex md:space-x-6 xl:space-x-8">
        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->classes === 'nav-issues'): ?>
              <div class="group relative bg-c-blue-100 px-4 pr-2 py-1 transition duration-150 ease-in-out <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>" x-data="{drop: false}">
                <button class="flex items-center focus:outline-none" @click="drop = !drop">
                  <div class="text-sm text-white nav-text group-hover:font-bold font-whyte"><?php echo e($item->label); ?></div>
                  <svg class="w-6 h-6 ml-2 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
                <div :class="{'block': drop, 'hidden': !drop }" class="w-full" x-cloak>
                  <ul class="flex flex-col pt-2 pl-4 space-y-2">
                    <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a class="text-white" href="/<?php echo $item->slug; ?>"><?php echo $item->name; ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
            <?php else: ?>
              <a class="nav-link text-sm tracking-widest text-white focus:outline-none font-whyte group transition duration-150 ease-in-out border-transparent border-b-3 hover:border-white <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>" href="<?php echo e($item->url); ?>" target="<?php echo $item->target; ?>">
                <div class="nav-text group-hover:font-bold"><?php echo e($item->label); ?></div>
              </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button class="focus:outline-none">
          <svg class="w-5 h-5 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>

      <div class="flex items-center md:hidden">
        <!-- Mobile menu button -->
        <button @click="open = !open" class="inline-flex items-center justify-center p-1 mr-auto text-white transition duration-150 ease-in-out rounded-md bg-c-blue-100 focus:outline-none hover:text-c-red-100" aria-label="Main menu" aria-expanded="false">
          <!-- Icon when menu is closed. -->
          <svg :class="{'hidden': open, 'block': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <!-- Icon when menu is open. -->
          <svg :class="{'block': open, 'hidden': !open }" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

    </div>
  </div>

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div :class="{'block': open, 'hidden': !open }" class="shadow-md bg-c-blue-300 md:hidden" x-cloak>
    <div @click.away="open = false" class="py-8 md:px-2">
      <ul class="flex flex-col space-y-6">
        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->classes === 'nav-issues'): ?>
            <li class="group relative px-6 transition duration-150 ease-in-out flex items-center flex-wrap <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>" x-data="{drop: false}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="<?php echo e($item->url); ?>">
                <?php echo e($item->label); ?>

              </a>
              <button class="ml-6 focus:outline-none" @click="drop = !drop">
                <svg class="w-6 h-6 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              <div :class="{'block': drop, 'hidden': !drop }" class="w-full" x-cloak>
                <ul class="flex flex-col pt-2 pl-4 space-y-2">
                  <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="text-white" href="/<?php echo $item->slug; ?>"><?php echo $item->name; ?></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </li>
          <?php else: ?>
            <li class="group relative px-6 transition duration-150 ease-in-out <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="<?php echo e($item->url); ?>">
                <?php echo e($item->label); ?>

              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="relative px-6 transition duration-150 ease-in-out group">
          <a @click="open = false" class="items-center inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="/search">
            Search
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/partials/header.blade.php ENDPATH**/ ?>