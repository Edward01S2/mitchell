<div class="{{ $block->classes }}">
  <div class="bg-gray-900 bg-center bg-cover" style="background-image:url({!! $bg['url'] !!});">
    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-24 text-center text-white md:py-28 lg:py-32 xl:py-40 2xl:py-48">
        <h3 class="mb-8 text-2xl md:text-3xl lg:text-4xl xl:text-5xl">{!! $title !!}</h3>
        <div class="max-w-xs mx-auto md:max-w-sm xl:max-w-md">
          <div class="mb-4 text-black signup-form">
            @include('partials.form', ['form' => $form])
          </div>
          <div class="lg:px-8 xl:px-12 consent">{!! $consent !!}</div>
        </div>
      </div>
    </div>
  </div>
</div>
