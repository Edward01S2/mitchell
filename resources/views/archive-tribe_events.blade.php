@extends('layouts.app')

@section('content')

  @include('blocks.hero', ['bg' => $bg, 'title' => $title, 'content' => $content])

  <div class="event-calendar">
    <?php 
      use Tribe\Events\Views\V2\Template_Bootstrap;
      echo tribe( Template_Bootstrap::class )->get_view_html();
    ?>
  </div>
  
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! $pagi !!}
  {{-- @dump($pagi) --}}

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection