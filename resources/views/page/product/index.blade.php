<x-app-layout>
  <x-slot:title>{{ __('Product') }}</x-slot>
  <x-slot:content>    
    <div class="my-8 p-5 mx-10 rounded-xl container border-2 border-[#1C315E]">
      <div class="flex items-center justify-between">
        <h1 class="text-[#1C315E] text-2xl font-semibold">{{ __('Product') }}</h1>
        <a href="{{ route("product.create") }}" class="p-3 rounded-lg border-2 border-[#1C315E] hover:bg-[#1C315E] hover:text-[#C0EEE4] transition duration-200">{{ __('Tambah Produk') }}</a>
      </div>
      <div class="grid grid-cols-3 gap-5 my-5 items-center ">
        @foreach ($data as $item)
          <x-card :content="$item" />
        @endforeach
      </div>
    </div>
  </x-slot>
</x-app-layout>