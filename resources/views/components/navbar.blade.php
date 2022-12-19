<nav class="bg-[#1C315E] py-5 px-10">
  <div class="flex items-center justify-between">
    <div class="flex text-[#C0EEE4] -tracking-tighter items-center gap-[2.5rem]">
      <a href="{{ route('home') }}" class="font-bold text-3xl">Laravel</a>
      <ul class="flex items-center gap-4 font-sans">
        <li>
          <a href="{{ route('product.index') }}" class="hover:underline">Product</a>
        </li>
        <li>
          <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a>
        </li>
      </ul>
    </div>
    <div class="flex items-center gap-5">
      <a href="{{-- route('login') --}}" class="py-1.5 px-3 border-2 border-[#C0EEE4] rounded-lg text-[#C0EEE4] hover:bg-[#C0EEE4] hover:text-[#1C315E] transition duration-200">login</a>
      <a href="{{-- route('login') --}}" class="py-1.5 px-3 border-2 border-[#C0EEE4] rounded-lg text-[#C0EEE4] hover:bg-[#C0EEE4] hover:text-[#1C315E] transition duration-200">register</a>
    </div>
  </div>
</nav>