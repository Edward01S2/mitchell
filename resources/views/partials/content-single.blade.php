<article @php(post_class())>
  <div class="h-40 bg-center bg-cover bg-c-blue-100" style="background-image: url('{!! $bg !!}')">
  </div>

  <header class="">
    <h1 class="p-6 pb-5 text-2xl font-medium entry-title bg-c-gray-50">
      {!! $title !!}
    </h1>

    <div class="px-6 py-4 pb-3 text-sm border-b border-gray-100">
      @if($show_author)      
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

  <div class="container px-6 pt-3 pb-8 mx-auto entry-content">
    <div class="prose max-w-none">
      @php(the_content())
    </div>
  </div>

  <div class="pb-12 text-center text-gray-600">
    <div class="mb-4">Share Article</div>
    <div class="flex justify-center space-x-4 a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-title="{!! $title  !!}">
      <a class="image-share a2a_button_facebook">
        @svg('images.Facebook', 'w-6 h-6 fill-current lg:w-8 lg:h-8')
      </a>
      <a class="image-share a2a_button_linkedin">
        @svg('images.Linkedin', 'w-6 h-6 fill-current lg:w-8 lg:h-8')
      </a>
      <a class="image-share a2a_button_twitter">
        @svg('images.Twitter', 'w-6 h-6 fill-current lg:w-8 lg:h-8')
      </a>
      <a class="image-share a2a_button_pinterest">
        @svg('images.Pinterest', 'w-6 h-6 fill-current lg:w-8 lg:h-8')
      </a>
    </div>
  </div>

</article>
