 <!-- Bottom Navigation -->
 <nav class="fixed bottom-3 px-2 left-1/2 -translate-x-1/2 w-full max-w-[480px] h-[60px] z-50">
    <div class="grid grid-cols-4 h-full bg-white border border-primary rounded-full">
        <a href="{{route('home')}}"
            wire:click="setActiveMenu('home')"
            class="flex flex-col items-center justify-center {{ $activeMenu === 'home' ? 'text-primary' : 'text-gray-600 hover:text-primary'}}">
            <i class="bi bi-house text-2xl mb-0.5"></i>
            <span style="font-size: xx-small;">Beranda</span>
        </a>
        <a href="{{route('shopping-cart')}}" 
            wire:click="setActiveMenu('shopping-cart')"
            class="flex flex-col items-center justify-center {{ $activeMenu === 'shopping-cart' ? 'text-primary' : 'text-gray-600 hover:text-primary'}}  transition-colors">
            <i class="bi bi-bag text-2xl mb-0.5"></i>
            <span style="font-size: xx-small;">Keranjang</span>
        </a>
        <a href="{{route('orders')}}" 
            wire:click="setActiveMenu('orders')"
            class="flex flex-col items-center justify-center {{ $activeMenu === 'orders' ? 'text-primary' : 'text-gray-600 hover:text-primary'}} transition-colors">
            <i class="bi bi-receipt text-2xl mb-0.5"></i>
            <span style="font-size: xx-small;">Pesanan</span>
        </a>
        <a href="{{route('profile')}}" 
            wire:click="setActiveMenu('profile')"
            class="flex flex-col items-center justify-center {{ $activeMenu === 'profile' ? 'text-primary' : 'text-gray-600 hover:text-primary'}} transition-colors">
            <i class="bi bi-person text-2xl mb-0.5"></i>
            <span style="font-size: xx-small;">Akun</span>
        </a>
    </div>
</nav>