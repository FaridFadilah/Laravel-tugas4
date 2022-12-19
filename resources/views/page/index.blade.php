<x-app-layout>
  <x-slot:title>{{ __('Home') }}</x-slot>
  <x-slot:content>
    <div class="my-10 container px-10">
      <div class="flex flex-col gap-10 tracking-widest text-center items-center justify-center">
        {{-- @if(session()->all())
          <p class="p-3 bg-[#C0EEE4] border-2 border-l-[#1C315E] text-[#1C315E]">{{ $message }}</p>
        @endif --}}
        <h1 class="text-[#1C315E] text-4xl font-semibold">{{ __('Lorem ipsum dolor sit amet.') }}</h1>
        <p class="w-[750px] text-[#1C315E] ">{{ __('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam quaerat ullam debitis repellendus, repudiandae nisi? Quasi facere vel molestias cumque.') }}</p>
      </div>
    </div>
    <div class="my-8 p-5 mx-10 rounded-xl container border-2 border-[#1C315E]">
      <div class="flex items-center justify-between">
        <h1 class="text-[#1C315E] text-2xl font-semibold">{{ __('Product') }}</h1>
        <a href="{{ route("product.create") }}" class="p-3 rounded-lg border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] transition duration-200">{{ __('Tambah Produk') }}</a>
      </div>
      <div class="grid grid-cols-3 gap-5 my-5 items-center ">
        @foreach ($product as $item)
          <x-card :content="$item" />
        @endforeach
      </div>
      <div class="flex flex-col items-center justify-center">
        {{-- {{ $product->previousCursor() }} --}}
        {{ $product->links() }}
        {{-- {{ $product->nextCursor() }} --}}
      </div>
    </div>
    <div class="my-8 p-5 mx-10 rounded-xl container border-2 border-[#1C315E]">
      <div class="flex items-center justify-between">
        <h1 class="text-[#1C315E] text-2xl font-semibold">{{ __('Blog') }}</h1>
        <a href="{{ route("blog.create") }}" class="p-3 rounded-lg border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] transition duration-200">{{ __('Tambah Blog') }}</a>
      </div>
      <div class="grid grid-cols-3 gap-5 my-5 items-center ">
        @foreach ($blog as $item)
          <x-card :content="$item"/>
        @endforeach
      </div>
      <div class="flex items-center justify-center">
        {{ $blog->links() }}
      </div>
    </div>
  </x-slot>
</x-app-layout>