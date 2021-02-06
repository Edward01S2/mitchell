{{--
  Template Name: Container Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('blocks.hero', ['bg' => $bg, 'title' => $title])

    <div class="container px-6 mx-auto lg:px-8">
      <div class="py-12 lg:py-20 xl:py-24">
        <div class="mx-auto prose lg:prose-lg lg:max-w-3xl">
          @include('partials.content-page')
        </div>
      </div>
    </div>

  @endwhile
@endsection
