<footer class="content-info">

  <div class="py-6 pb-8 bg-c-blue-300 md:py-4">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="md:flex md:justify-between md:items-center">
        <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:space-x-16">
          <a href="{!! home_url('/') !!}" class="flex items-center justify-center hover:opacity-50" target="_blank">
            <img id="logo-main" class="w-auto h-16 md:h-20" src="{!! $logo['url'] !!}" alt="{{ $siteName }}" />
            <span class="ml-4 font-medium leading-5 tracking-wide text-white uppercase font-whyte md:text-lg md:leading-snug lg:ml-8">{!! $logo_text !!}</span>
          </a>
          <div class="flex items-center justify-center">
            <img class="w-auto h-14 md:order-2 lg:h-16" src="{!! $afa_logo['url'] !!}" />
            <span class="ml-4 font-medium leading-5 tracking-wide text-white uppercase font-whyte md:text-lg md:leading-snug sm:ml-6 md:order-1 md:ml-0 md:mr-6">{!! $footer_text_2 !!}</span>
          </div>
        </div>
        @if($social)
          <div class="flex items-center justify-center mt-6 space-x-4 md:mt-0">
            @foreach($social as $item)
              <a href="{!! $item['url'] !!}" target="_blank" class="hover:opacity-75">
                @svg($item['icon']['url'], 'w-6 h-6 fill-current')
              </a>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>

  <div class="bg-c-gray-100">
    <div class="container px-6 mx-auto lg:px-8">

      <div class="grid grid-cols-2 gap-6 py-6 md:grid-cols-7 md:gap-8 lg:py-8 xl:py-16">

        <div id="subscribe" class="col-span-2 font-whyte md:col-span-3 md:col-start-5 xl:col-span-2">
          <div class="mb-3 nav-head lg:mb-6">Follow</div>
          <div class="mb-3 footer-form lg:mb-4">
            @include('partials.form', ['form' => $form])
          </div>
          <div class="text-black lg:pr-6 opacity-40">{!! $form_text !!}</div>
        </div>

        <div class="flex flex-col space-y-4 md:col-span-2 md:col-start-1 md:row-start-1 md:space-y-8 xl:grid xl:grid-cols-3 xl:space-y-0 xl:col-span-3 xl:gap-8">
          <div class="flex flex-col space-y-2">
            <a href="{!! $navigation[0]->url !!}" class="nav-head">{!! $navigation[0]->label !!}</a>
            @if($items = $navigation[0]->children)
              @foreach($items as $item)
                <a href="{!! $item->url !!}" class="nav-head">{!! $item->label !!}</a>
              @endforeach
            @endif
          </div>

          <div class="flex flex-col space-y-1">
            <a href="{!! $navigation[1]->url !!}" class="mb-2 nav-head">{!! $navigation[1]->label !!}</a>
            @if($items = $navigation[1]->children)
              @foreach($items as $item)
                <a href="{!! $item->url !!}" class="nav-sub">{!! $item->label !!}</a>
              @endforeach
            @endif
          </div>

          <div class="flex flex-col space-y-1">
            <a href="{!! $navigation[2]->url !!}" class="mb-2 nav-head">{!! $navigation[2]->label !!}</a>
            @if($items = $navigation[2]->children)
              @foreach($items as $item)
                <a href="{!! $item->url !!}" class="nav-sub">{!! $item->label !!}</a>
              @endforeach
            @endif
          </div>
        </div>

        <div class="flex flex-col space-y-4 md:col-span-2 md:col-start-3 md:row-start-1 md:space-y-8 xl:grid xl:grid-cols-2 xl:space-y-0 xl:col-span-2 xl:gap-8">
          <div class="flex flex-col space-y-1">
            <a href="{!! $navigation[3]->url !!}" class="mb-2 nav-head">{!! $navigation[3]->label !!}</a>
            @if($items = $navigation[3]->children)
              @foreach($items as $item)
                <a href="{!! $item->url !!}" class="nav-sub">{!! $item->label !!}</a>
              @endforeach
            @endif
          </div>

          <div class="flex flex-col space-y-1">
            <a href="{!! $navigation[4]->url !!}" class="mb-2 nav-head">{!! $navigation[4]->label !!}</a>
            @if($items = $navigation[4]->children)
              @foreach($items as $item)
                <a href="{!! $item->url !!}" class="nav-sub">{!! $item->label !!}</a>
              @endforeach
            @endif
          </div>
        </div>

      </div>

    </div>

    <div class="py-4 text-sm border-t border-gray-200 font-whyte md:py-5">
      <div class="container px-6 mx-auto lg:px-8">
        <div class="md:flex md:items-center md:justify-between lg:justify-center lg:space-x-20 xl:space-x-24">
          <div class="mb-2 text-center md:mb-0">
            <span>&copy; <?php echo esc_attr( date( 'Y' ) ); ?></span>
            {!! $copy !!}
          </div>
          <div class="flex justify-center space-x-4 md:space-x-6">
            @foreach($links as $link)
              <a href="{!! $link['link']['url'] !!}" class="text-c-gray-400 hover:underline">{!! $link['link']['title'] !!}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </div>

</footer>

{{-- @dump($links) --}}