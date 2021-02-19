<nav id="nav" x-data="{open: false, drop: false, search: false, state: '0'}" class="absolute top-0 left-0 right-0 z-50 w-full bg-transparent" :class="{'bg-transparent': !open, 'bg-white': search || drop}">
  <div class="container z-40 px-6 py-2 mx-auto lg:px-8">
    <div class="flex items-center justify-between">

      <div class="relative z-30 lg:flex-shrink-0">
        <div class="flex items-center flex-shrink-0 md:justify-center">
          <a href="<?php echo home_url('/'); ?>" class="hover:opacity-50">
            <img id="logo-main" class="w-auto h-16 md:h-20" src="<?php echo $logo['url']; ?>" alt="<?php echo e($siteName); ?>" />
          </a>
        </div>
      </div>

      <div class="items-center hidden nav-container md:flex md:space-x-6 xl:space-x-8">
        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->classes === 'nav-issues'): ?>

              <div class="group bg-c-blue-100 px-4 pr-2 py-1 transition duration-150 ease-in-out z-30 <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>">
                <button class="flex items-center focus:outline-none" @click="drop = !drop, open = true">
                  <div class="text-sm text-white nav-text group-hover:font-bold font-whyte"><?php echo e($item->label); ?></div>
                  <svg class="w-6 h-6 ml-2 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>

            <?php else: ?>
              <a class="nav-link text-sm tracking-widest focus:outline-none font-whyte group relative z-30 transition duration-150 ease-in-out border-transparent border-b-3 hover:border-white <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>" href="<?php echo e($item->url); ?>" target="<?php echo $item->target; ?>">
                <div :class="{'text-black': drop || search, 'text-white': !open, 'text-white' : !drop && !search }" class="nav-text group-hover:font-bold"><?php echo e($item->label); ?></div>
              </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(!is_search()): ?>
        <button class="z-30 focus:outline-none" @click="search = !search, open = true">
          <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{'text-black': drop || search, 'text-white': !open, 'text-white' : !drop && !search }">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
        </button>
        <?php endif; ?>
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

  

  
  <div :class="{'block': drop, 'hidden': !drop }" class="absolute top-0 left-0 right-0 z-20 w-full mt-24 bg-white border-t border-gray-200" x-cloak>
    <div class="container px-6 mx-auto lg:px-8">
      <ul @click.away="drop = false" class="relative grid grid-cols-3 gap-8 px-10 py-8 xl:px-16 xl:py-12">
        <button class="absolute top-0 right-0 mt-4 -mr-1 text-black focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="drop = false, open = false">
          <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="/issue/<?php echo $issue['slug']; ?>" class="flex flex-col border border-gray-300 hover:shadow-issue">
            <div class="p-6 py-4 lg:p-8 xl:p-10" style="background-color: <?php echo $issue['color']; ?>; color: <?php echo $issue['font']; ?>;">
              <h4 class="mb-0 text-xl text-center lg:text-left lg:mb-2 xl:text-2xl"><?php echo $issue['name']; ?></h4>
              <p class="hidden text-sm leading-tight lg:block lg:line-clamp-2 xl:text-base"><?php echo $issue['desc']; ?></p>
            </div>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>

  
  <div :class="{'block': search, 'hidden': !search }" class="absolute top-0 left-0 right-0 w-full mt-24 bg-c-black-100" x-cloak>
    <div class="container px-6 mx-auto lg:px-8">

      <div @click.away="search = false, open = false" class="relative flex items-center justify-center py-16">

        <button class="absolute top-0 right-0 mt-4 -mr-1 text-white focus:outline-none xl:-mr-2 hover:text-c-blue-200" @click="search = false, open = false">
          <svg class="w-8 h-8 xl:w-10 xl:h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div id="search-container" class="flex items-center w-full max-w-lg lg:max-w-xl xl:max-w-2xl">
          <div class="mr-4 text-2xl font-bold text-white font-whyte xl:text-3xl">Search:</div>
          <form action="<?php echo home_url();; ?>" role="search" method="post" id="searchform" class="relative flex-grow">
            <input type="text" id="s" name="s" value="" autocomplete="off" class="w-full py-2 pl-4 pr-6 focus:outline-none font-whyte" placeholder="Search Keyword">
            
            <button class="absolute bottom-0 right-0 mb-3 mr-4" type="submit" id="searchsubmit">
              <svg class="w-4 h-4 text-black fill-current hover:text-c-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!--
    Mobile menu, toggle classes based on menu state.

    Menu open: "block", Menu closed: "hidden"
  -->
  <div :class="{'block': open, 'hidden': !open }" class="shadow-md bg-c-black-100 md:hidden" x-cloak>
    <div @click.away="open = false" class="py-8 md:px-2">
      <ul class="flex flex-col space-y-6">
        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->classes === 'nav-issues'): ?>
            <li class="group relative px-6 transition duration-150 ease-in-out flex items-center flex-wrap <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>" x-data="{drop: false}">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="<?php echo e($item->url); ?>">
                <?php echo e($item->label); ?>

              </a>
              <button class="ml-6 focus:outline-none" @click="drop = !drop">
                <svg class="w-6 h-6 text-white transform fill-current" :class="{'rotate-180': drop }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              <div :class="{'block': drop, 'hidden': !drop }" class="w-full" x-cloak>
                <ul class="flex flex-col pt-3 pl-4 space-y-3">
                  <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="text-lg text-white font-whyte" href="/issue/<?php echo $item['slug']; ?>"><?php echo $item['name']; ?></a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </li>
          <?php else: ?>
            <li class="group relative px-6 transition duration-150 ease-in-out <?php echo e($item->classes ?? ''); ?> <?php echo e($item->active ? 'active' : ''); ?>">
              <a @click="open = false" class="inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="<?php echo e($item->url); ?>">
                <?php echo e($item->label); ?>

              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="relative px-6 transition duration-150 ease-in-out group">
          <a @click="open = false" class="items-center inline-block text-lg font-medium tracking-wider text-white transition duration-300 ease-in-out border-transparent font-whyte border-b-3 hover:font-bold hover:border-white focus:outline-none md:text-base" href="/search">
            Search
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/partials/header.blade.php ENDPATH**/ ?>