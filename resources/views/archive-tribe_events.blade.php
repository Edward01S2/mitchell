@extends('layouts.app')

@section('content')

  @include('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content])

  <div class="event-calendar">
    <?php 
      use Tribe\Events\Views\V2\Template_Bootstrap;
      echo tribe( Template_Bootstrap::class )->get_view_html();
    ?>
  </div>
  
  <div class="container px-6 pb-12 mx-auto lg:px-8 md:pt-8 lg:pt-12 xl:pb-16">
    <div class="flex flex-col divide-y divide-gray-200 posts-wrapper lg:max-w-4xl lg:mx-auto xl:max-w-5xl 2xl:max-w-6xl">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>

    {!! $pagi !!}
  </div>
  {{-- @dump($pagi) --}}

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection