<div class="<?php echo e($block->classes); ?> split-gradient" x-data="{ tab: 'mission' }">
  <div class="lg:flex lg:container lg:mx-auto lg:px-8">
    <div class="bg-c-blue-300 lg:w-1/4">
      <div class="container px-6 py-4 mx-auto lg:hidden">
        <select name="about-tab" id="about-tab" x-model="tab" class="block w-full rounded font-whyte sm:max-w-xs sm:ml-auto">
          <option value="mission">Mission</option>
          <option value="staff">Staff</option>
          <option value="fellows">Fellows</option>
          <option value="careers">Careers</option>
        </select>
      </div>
      <div class="hidden lg:block">
        <div class="flex flex-col items-start -ml-8 text-lg font-medium text-white font-whyte">
          <button class="flex items-center justify-between w-full py-3 pl-8 pr-12 xl:pr-16 rounded-l-md focus:outline-none hover:bg-white hover:text-c-blue-300 hover:bg-opacity-75" x-on:click="tab = 'mission'" :class="{ 'bg-white text-c-blue-300 hover:bg-opacity-100': tab === 'mission' }">
            <span>Mission</span>
            <svg class="w-5 h-5 transform fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{ 'rotate-90': tab === 'mission' }">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
          <button class="flex items-center justify-between w-full py-3 pl-8 pr-12 xl:pr-16 rounded-l-md focus:outline-none hover:bg-white hover:text-c-blue-300 hover:bg-opacity-75" x-on:click="tab = 'staff'" :class="{ 'bg-white text-c-blue-300 hover:bg-opacity-100': tab === 'staff' }">
            <span>Staff</span>
            <svg class="w-5 h-5 transform fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{ 'rotate-90': tab === 'staff' }">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
          <button class="flex items-center justify-between w-full py-3 pl-8 pr-12 xl:pr-16 rounded-l-md focus:outline-none hover:bg-white hover:text-c-blue-300 hover:bg-opacity-75" x-on:click="tab = 'fellows'" :class="{ 'bg-white text-c-blue-300 hover:bg-opacity-100': tab === 'fellows' }">
            <span>Fellows</span>
            <svg class="w-5 h-5 transform fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{ 'rotate-90': tab === 'fellows' }">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
          <button class="flex items-center justify-between w-full py-3 pl-8 pr-12 xl:pr-16 rounded-l-md focus:outline-none hover:bg-white hover:text-c-blue-300 hover:bg-opacity-75" x-on:click="tab = 'careers'" :class="{ 'bg-white text-c-blue-300 hover:bg-opacity-100': tab === 'careers' }">
            <span>Careers</span>
            <svg class="w-5 h-5 transform fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" :class="{ 'rotate-90': tab === 'careers' }">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="container px-6 mx-auto bg-white lg:pl-12 lg:w-3/4 xl:pl-16">
      <div class="pt-8 pb-12 lg:pt-12 xl:pt-16">

        <div x-show="tab === 'mission'">
          <div class="prose max-w-none lg:prose-lg lg:leading-snug">
            <?php echo $content; ?>

          </div>
          <div class="grid grid-rows-3 gap-6 py-8">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="flex flex-col border border-gray-300 sm:flex-row">
                <div class="sm:w-2/5">
                  <img class="object-cover w-full h-40 sm:h-48" src="<?php echo $item['image']['url']; ?>" alt="">
                </div>
                <div class="p-6 sm:w-3/5 sm:flex sm:items-center">
                  <div>
                    <h3 class="mb-2 text-2xl sm:text-3xl"><?php echo $item['title']; ?></h3>
                    <p class="lg:text-lg"><?php echo $item['content']; ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="prose max-w-none lg:prose-lg lg:leading-snug">
            <?php echo $content2; ?>

          </div>
        </div>

        <div x-show="tab === 'staff'" x-cloak>
          <div class="flex flex-col space-y-12">
            <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="flex flex-col sm:flex-row sm:space-x-6 md:space-x-8 xl:space-x-12" x-data="{ drop: false }">
                <div class="mb-4 sm:w-1/3 xl:w-1/4">
                  <img class="object-cover w-64 mx-auto h-72 sm:w-full sm:h-56 md:h-72 lg:h-64 xl:h-72" src="<?php echo $item['image']['url']; ?>" alt="">
                </div>
                <div class="sm:w-2/3 xl:w-3/4">
                  <h3 class="text-xl md:text-2xl"><?php echo $item['name']; ?></h3>
                  <div class="mb-4 text-lg font-whyte"><?php echo $item['title']; ?></div>
                  
                  <div class="flex space-x-4 lg:space-x-8">
                    <div>
                      <a href="mailto:<?php echo $item['email']; ?>" class="inline-flex items-center mb-2 text-c-blue-100">
                        <span class="mr-1 font-whyte">Email</span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </a>
                    
                      <div class="flex space-x-4">
                        <div>
                          <div class="leading-tight prose max-w-none lg:prose-lg lg:leading-tight" :class="{ 'line-clamp-4' : !drop, 'line-clamp-none block overflow-visible' : drop }">
                            <?php echo $item['bio']; ?>

                          </div>
                          <?php if($dl = $item['download']): ?>
                            <a href="<?php echo $dl['url']; ?>" class="inline-block px-6 py-2 mt-4 text-sm text-white rounded-md bg-c-gray-300 font-whyte">Download Bio</a>
                          <?php endif; ?>
                        </div>
                        <div class="mt-6 text-center sm:hidden">
                          <button x-on:click="drop = !drop" class="p-1 focus:outline-none" :class="{'bg-c-blue-100': drop, 'bg-c-blue-200': !drop }">
                            <svg class="w-5 h-5 text-white fill-current"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" :class="{'hidden': drop, 'block': !drop }"/>
                              <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" :class="{'hidden': !drop, 'block': drop }" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="hidden text-center sm:block">
                      <button x-on:click="drop = !drop" class="p-1 focus:outline-none" :class="{'bg-c-blue-100': drop, 'bg-c-blue-200': !drop }">
                        <svg class="w-8 h-8 text-white fill-current"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" :class="{'hidden': drop, 'block': !drop }"/>
                          <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" :class="{'hidden': !drop, 'block': drop }" />
                        </svg>
                      </button>
                    </div>

                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        <div x-show="tab === 'fellows'" x-cloak>
          <div class="flex flex-col space-y-12">
            <?php if($fellows): ?>
              <?php $__currentLoopData = $fellows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col sm:flex-row sm:space-x-6 md:space-x-8 xl:space-x-12" x-data="{ drop: false }">
                  <div class="mb-4 sm:w-1/3 xl:w-1/4">
                    <img class="object-cover w-64 mx-auto h-72 sm:w-full sm:h-56 md:h-72 lg:h-64 xl:h-72" src="<?php echo $item['image']['url']; ?>" alt="">
                  </div>
                  <div class="sm:w-2/3 xl:w-3/4">
                    <h3 class="text-xl md:text-2xl"><?php echo $item['name']; ?></h3>
                    <div class="mb-4 text-lg font-whyte"><?php echo $item['title']; ?></div>
                    
                    <div class="flex space-x-4 lg:space-x-8">
                      <div>
                        <a href="mailto:<?php echo $item['email']; ?>" class="inline-flex items-center mb-2 text-c-blue-100">
                          <span class="mr-1 font-whyte">Email</span>
                          <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                          </svg>
                        </a>
                      
                        <div class="flex space-x-4">
                          <div>
                            <div class="leading-tight prose max-w-none lg:prose-lg lg:leading-tight" :class="{ 'line-clamp-4' : !drop, 'line-clamp-none block overflow-visible' : drop }">
                              <?php echo $item['bio']; ?>

                            </div>
                            <?php if($dl = $item['download']): ?>
                              <a href="<?php echo $dl['url']; ?>" class="inline-block px-6 py-2 mt-4 text-sm text-white rounded-md bg-c-gray-300 font-whyte">Download Bio</a>
                            <?php endif; ?>
                          </div>
                          <div class="mt-6 text-center sm:hidden">
                            <button x-on:click="drop = !drop" class="p-1 focus:outline-none" :class="{'bg-c-blue-100': drop, 'bg-c-blue-200': !drop }">
                              <svg class="w-5 h-5 text-white fill-current"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" :class="{'hidden': drop, 'block': !drop }"/>
                                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" :class="{'hidden': !drop, 'block': drop }" />
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="hidden text-center sm:block">
                        <button x-on:click="drop = !drop" class="p-1 focus:outline-none" :class="{'bg-c-blue-100': drop, 'bg-c-blue-200': !drop }">
                          <svg class="w-8 h-8 text-white fill-current"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" :class="{'hidden': drop, 'block': !drop }"/>
                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" :class="{'hidden': !drop, 'block': drop }" />
                          </svg>
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

        <div x-show="tab === 'careers'" x-cloak>
          <div class="flex flex-col divide-y career-container">
            <?php if($careers): ?>
              <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-8 career-item" x-data="{ drop: false }">
                  <div class="flex sm:space-x-4 lg:space-x-12">
                    <div>
                      <h3 class="text-xl md:text-2xl"><?php echo $item['title']; ?></h3>
                      <div class="mb-4 font-whyte">Posted: <?php echo $item['date']; ?></div>
                      <div class="leading-tight prose max-w-none lg:prose-lg lg:leading-tight" :class="{ 'line-clamp-4' : !drop, 'line-clamp-none block overflow-visible' : drop }">
                        <?php echo $item['description']; ?>

                      </div>
                    </div>
                    <div>
                      <div class="mt-4">
                        <button x-on:click="drop = !drop" class="p-1 focus:outline-none" :class="{'bg-c-blue-100': drop, 'bg-c-blue-200': !drop }">
                          <svg class="w-5 h-5 text-white fill-current sm:h-8 sm:w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" :class="{'hidden': drop, 'block': !drop }"/>
                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" :class="{'hidden': !drop, 'block': drop }" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="about-issues" x-show="tab === 'mission'" x-cloak>
    <?php echo $__env->make('blocks.issues-block', ['title' => 'Issues', 'issues' => $issues, 'images' => false, 'bg' => $issues_bg], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

</div>
<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/blocks/about.blade.php ENDPATH**/ ?>