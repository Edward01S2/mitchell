<div class="">
  <div class="relative z-10">
    <div class="relative z-10 h-40 bg-center bg-cover bg-c-gray-200 md:h-72 lg:h-96 xl:h-108" style="background-image: url('{!! $bg !!}')"></div>
    <div class="absolute inset-0 z-20 w-full h-full bg-black opacity-40"></div>
  </div>
  <article @php(post_class('relative md:max-w-2xl md:mx-auto md:shadow-article md:-mt-24 z-30 md:mb-16 lg:max-w-4xl lg:-mt-40 xl:max-w-6xl lg:mb-20 xl:mb-24 xl:-mt-48'))>
    <header>
      <div class="bg-c-gray-50">
        <h1 class="p-6 text-2xl font-medium entry-title md:text-center md:text-3xl md:p-8 lg:text-4xl lg:max-w-3xl lg:leading-tight lg:mx-auto lg:py-12 xl:text-6xl xl:max-w-4xl">
          {!! $title !!}
        </h1>
      </div>

      <div class="px-6 py-4 text-sm bg-white border-b border-gray-100 md:flex md:justify-end md:items-center md:space-x-6 md:px-8 xl:py-6 lg:space-x-8 xl:px-12">
        @if(get_the_author() !== 'admin')      
          <p class="text-gray-600 byline author vcard font-whyte">
            <span>{{ __('Author:', 'sage') }}</span>
            <span class="uppercase">{{ get_the_author() }}</span>
          </p>
        @endif
        <time class="text-gray-600 uppercase updated font-whyte" datetime="{{ get_post_time('c', true) }}">
          {{ get_the_date() }}
        </time>  
      </div>
    </header>

    <div class="container px-6 pt-3 pb-8 mx-auto entry-content md:p-8 lg:max-w-3xl lg:py-12 xl:max-w-4xl">
      <div class="prose max-w-none">
        @php(the_content())
      </div>
    </div>

    <div class="pb-12 text-center text-gray-600 lg:pb-20 xl:pb-24">
      <div class="mb-4 lg:text-lg">Share Article</div>
      <div class="flex justify-center space-x-4 a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-title="{!! $title  !!}">
        <a class="image-share a2a_button_facebook">
          @svg('images.Facebook', 'w-6 h-6 fill-current')
        </a>
        <a class="image-share a2a_button_linkedin">
          @svg('images.Linkedin', 'w-6 h-6 fill-current')
        </a>
        <a class="image-share a2a_button_twitter">
          @svg('images.Twitter', 'w-6 h-6 fill-current')
        </a>
        <a class="image-share a2a_button_pinterest">
          @svg('images.Pinterest', 'w-6 h-6 fill-current')
        </a>
      </div>
    </div>

  </article>
</div>
