<footer class="bg-[#001a33] text-white pt-20 pb-10 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-white/10 pb-16">
        <div class="col-span-1 md:col-span-2">
            <div class="flex items-center mb-6">
                <div class="bg-red-800 p-2 rounded-lg mr-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="font-black text-2xl tracking-tighter uppercase">Geo<span class="text-red-800">INHance</span></span>
            </div>
            <p class="text-slate-400 leading-relaxed mb-8 max-w-sm">
                {{ __('footer.desc') }}
            </p>
            <div class="flex space-x-4">
                <a href="https://www.linkedin.com/company/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-youtube"></i></a>
                <a href="https://www.tiktok.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>

        <div>
            <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">
                {{ __('footer.navigation') }}
            </h4>
            <ul class="space-y-4 text-slate-400 text-sm">
                <li><a href="/" class="hover:text-white transition">{{ __('footer.home') }}</a></li>
                <li><a href="/#services" class="hover:text-white transition">{{ __('footer.services') }}</a></li>
                <li><a href="/#portfolio" class="hover:text-white transition">{{ __('footer.projects') }}</a></li>
                <li><a href="/karir" class="hover:text-white transition">{{ __('footer.career') }}</a></li>
                <li><a href="/kontak" class="hover:text-white transition">{{ __('footer.contact') }}</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">
                {{ __('footer.head_office') }}
            </h4>
            <p class="text-slate-400 text-sm leading-relaxed mb-4">
                {!! __('footer.address') !!}
            </p>
            <p class="text-slate-400 text-sm mb-2">
                {{ __('footer.phone') }}: +62 851 9044 1744
            </p>
            <p class="text-slate-400 text-sm text-red-500 font-bold">geoinhance.solusirekayasa@gmail.com</p>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] text-slate-500 uppercase tracking-[0.2em]">
        <p>{{ __('footer.copyright') }}</p>
        <div class="flex gap-4">
            <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">
                {{ __('footer.privacy_policy') }}
            </a>
            <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">
                {{ __('footer.terms_of_service') }}
            </a>
        </div>
    </div>
</footer>