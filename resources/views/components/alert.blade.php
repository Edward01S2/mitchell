<div {{ $attributes->merge(['class' => $type]) }}>
  <div class="px-4 py-3 font-medium font-whyte">
    {!! $message ?? $slot !!}
  </div>
</div>
