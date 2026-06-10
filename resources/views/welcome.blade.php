    @include('partials.navbar')
        
        <livewire:home-slider />

<section id="home-about" class="w-full py-24 px-12 md:px-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
        
        <div data-aos="fade-right">
            
            <h2 class="text-3xl md:text-4xl font-black uppercase text-slate-900 tracking-tight mb-5 leading-tight">
                {{ __('home.about_title_1') }} <br class="hidden xl:block">
                <span class="text-red-800">{{ __('home.about_title_2') }}</span>
            </h2>
            
            <div class="w-12 h-[2px] bg-red-800 mb-8"></div>
            
            <p class="text-sm md:text-base leading-relaxed text-slate-500 mb-8 text-justify md:text-left">
                {!! __('home.about_desc') !!}
            </p>

            <a href="/profil" class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-wider text-red-800 hover:text-[#002d62] transition-colors group">
                {{ __('home.about_btn') }}
                <span class="transform group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        <div class="relative" data-aos="fade-left" data-aos-delay="200">
            <div class="absolute -top-4 -right-4 w-full h-full bg-slate-50 border border-slate-200 rounded-2xl -z-10"></div>
            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-red-50 rounded-full blur-2xl -z-10"></div>
            
            <div class="overflow-hidden rounded-2xl shadow-lg border border-slate-100 relative group">
                <img src="path-ke-gambar-anda.jpg" alt="GeoINHance Project" class="w-full h-auto object-cover aspect-[4/3] group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/30 to-transparent pointer-events-none"></div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="w-full py-24 px-12 md:px-20 bg-white">
    <div class="text-center mb-24" data-aos="fade-up">
        <span class="inline-block px-4 py-1.5 rounded-full border border-red-100 bg-red-50 text-red-800 text-[11px] font-extrabold uppercase tracking-[0.3em] shadow-sm mb-4">
            {{ __('home.service_badge') }}
        </span>
        <h2 class="text-3xl md:text-4xl font-black uppercase text-slate-900 tracking-tight">
            {{ __('home.service_title_1') }}
        </h2>
        <div class="w-12 h-[2px] bg-red-800 mx-auto mt-5"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 lg:gap-24 w-full text-center">
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="100">
            <span class="material-symbols-outlined text-[85px] text-red-800">support_agent</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_1_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_1_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="200">
            <span class="material-symbols-outlined text-[85px] text-red-800">description</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_2_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_2_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="300">
            <span class="material-symbols-outlined text-[85px] text-red-800">payments</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_3_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_3_desc') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24 w-full md:max-w-[66%] mx-auto text-center mt-20">
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="400">
            <span class="material-symbols-outlined text-[85px] text-red-800">handshake</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_4_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_4_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="500">
            <span class="material-symbols-outlined text-[85px] text-red-800">model_training</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_5_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_5_desc') }}</p>
        </div>
    </div>
</section>

<section class="w-full bg-white py-24 border-t border-b border-slate-100" x-data="{ 
    activeBranch: 'bandung',
    branches: {
        jakarta: {
            title: '{{ __('home.net_jkt_title') }}',
            desc: '{{ __('home.net_jkt_desc') }}',
            img: 'https://images.unsplash.com/photo-1577495508048-b635879837f1?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[67.5%] left-[28%]'
        },
        bandung: {
            title: '{{ __('home.net_bdg_title') }}',
            desc: '{{ __('home.net_bdg_desc') }}',
            img: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[70%] left-[29.5%]'
        },
        surabaya: {
            title: '{{ __('home.net_sub_title') }}',
            desc: '{{ __('home.net_sub_desc') }}',
            img: 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[73%] left-[39%]'
        },
        Bali: {
            title: '{{ __('home.net_bali_title') }}',
            desc: '{{ __('home.net_bali_desc') }}',
            img: 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[79.5%] left-[44.5%]'
        }
    }
}">
    <div class="max-w-7xl mx-auto px-6 text-center mb-16" data-aos="fade-up">
        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.net_badge') }}</span>
        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('home.net_title') }}</h2>
        <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
        <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">{{ __('home.net_desc') }}</p>
    </div>

    <div class="w-full relative bg-slate-50 py-12 md:py-20 border-t border-b border-slate-100 flex items-center justify-center select-none overflow-hidden" data-aos="fade-up">
        <div class="w-full max-w-none relative px-0 m-0">
            <img src="https://simplemaps.com/static/svg/country/id/admin1/id.svg" class="w-full h-auto opacity-70 grayscale hover:grayscale-0 transition-all duration-1000 block p-0 m-0 transform md:scale-105" alt="GeoINHance Operational Map">
            
            <div class="absolute inset-0 w-full h-full p-0 m-0 transform md:scale-105">
                <template x-for="(branch, key) in branches" :key="key">
                    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 group z-10 hover:z-50" :class="branch.coords">
                        
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-4 w-72 bg-white rounded-2xl shadow-2xl border border-slate-100 p-4 opacity-0 scale-95 pointer-events-none group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 origin-bottom">
                            <div class="h-24 w-full overflow-hidden rounded-xl bg-slate-100 relative mb-3">
                                <img :src="branch.img" class="w-full h-full object-cover" :alt="branch.title">
                                <span class="absolute bottom-2 left-2 bg-red-800 text-white text-[7px] font-black uppercase tracking-widest px-2 py-0.5 rounded shadow">{{ __('home.net_tag') }}</span>
                            </div>
                            <h3 class="text-xs font-black text-slate-950 uppercase tracking-wide mb-1 leading-tight" x-text="branch.title"></h3>
                            <p class="text-slate-500 text-[10px] leading-relaxed mb-2" x-text="branch.desc"></p>
                            <span class="flex items-center gap-1 text-[8px] font-bold text-emerald-600 uppercase tracking-wider">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span> {{ __('home.net_active') }}
                            </span>
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 border-[6px] border-transparent border-t-white filter drop-shadow-[0_2px_2px_rgba(0,0,0,0.05)]"></div>
                        </div>

                        <button @mouseenter="activeBranch = key" @click="activeBranch = key" class="relative flex items-center justify-center focus:outline-none transition-transform duration-300 group-hover:scale-125">
                            <span class="absolute inline-flex h-8 w-8 rounded-full opacity-40 animate-ping" :class="activeBranch === key ? 'bg-red-600' : 'bg-[#002d62]/40'"></span>
                            <svg class="w-8 h-8 filter drop-shadow-md transition-colors duration-300" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" :class="activeBranch === key ? 'text-red-800' : 'text-[#002d62]'"/>
                            </svg>
                        </button>

                    </div>
                </template>
            </div>
        </div>
    </div>
</section>


<section class="bg-slate-50 py-24 px-6 border-b border-slate-100 overflow-hidden" x-data="{
    categories: [
        { name: '{{ __('home.partners.cat_govt') }}', count: '{{ __('home.partners.count_govt') }}' },
        { name: '{{ __('home.partners.cat_contractor') }}', count: '{{ __('home.partners.count_contractor') }}' },
        { name: '{{ __('home.partners.cat_private') }}', count: '{{ __('home.partners.count_private') }}' }
    ]
}">
    <div class="max-w-7xl mx-auto">
<div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.partners.badge') }}</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('home.partners.title') }}</h2>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">{{ __('home.partners.desc') }}</p>
        </div>

<div class="w-full relative py-4 mb-16 select-none" data-aos="fade-up" data-aos-delay="100">
    <div class="absolute inset-y-0 left-0 w-20 md:w-40 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
    <div class="absolute inset-y-0 right-0 w-20 md:w-40 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>

    <div class="flex w-max animate-marquee whitespace-nowrap items-center hover:[animation-play-state:paused]">
        
        <div class="flex gap-12 md:gap-16 items-center shrink-0 pr-12 md:pr-16">
            <img src="https://i.pinimg.com/originals/bf/b4/78/bfb4785acb3aa81935470bbf6cca8aa0.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Kementerian PUPR">
            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/7/73/Waskita_Karya.svg/1280px-Waskita_Karya.svg.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Waskita">
            <img src="https://ridergalau.id/wp-content/uploads/2026/01/Logo-Wijaya-Karya-WIKA.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="WIKA">
            <img src="https://www.rukamen.com/uploads/logo_developer/1548844165_9766489.jpeg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Adhi Karya">
            <img src="https://www.hutamakarya.com/storage/logo-site.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Hutama Karya">
            <img src="https://www.ptpp.co.id/_nuxt/img/site-logo.0b5b997.webp" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PT PP">
            <img src="https://yeka-agribisnis.com/assets/images/logo-sgu.webp" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="LAPI Ganesha Utama">
            <img src="https://upload.wikimedia.org/wikipedia/en/3/3c/PT_KCIC_logo.png?_=20230714001837" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="KCIC">
            <img src="https://archiindonesia.com/wp-content/uploads/2024/11/logo-msm.jpg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="MSM">
            <img src="https://archiindonesia.com/wp-content/uploads/2024/11/logo-ttn.jpg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="TTN">
            <img src="https://erp.brantas-abipraya.co.id/web/image/website/1/logo/ERP%20Brantas%20Abipraya?unique=4d25e81" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Abipraya">
            <img src="https://www.abadicon.com/wp-content/uploads/2024/07/LOGO-Agung-Sedayu-REVI.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Agung Sedayu Group">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg/1280px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="KAI">
            <img src="https://jjb.co.id/wp-content/uploads/2023/12/Logo-Jasa-Marga-Jogja-Bawen-3-05.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="JASAMARGA Jogja-Bawen">
            <img src="https://companieslogo.com/img/orig/JSMR.JK-b8d01527.png?t=1720244492" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="JASAMARGA">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d8/Logo_MedcoEnergi.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Medco Energi">
            <img src="https://astabumi.com/wp-content/uploads/2023/10/Offshore-work-indonesia.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Java Offshore">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PLN">
            <img src="https://suitmedia.com/_ipx/f_webp/https://suitmedia.static-assets.id/strapi/nindy-59514d4038.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="NINDYA">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/15/Keller_Group_logo.svg/960px-Keller_Group_logo.svg.png?_=20180221041352" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Keller">
            <img src="https://media.licdn.com/dms/image/v2/D560BAQFzirAL7A5B-Q/company-logo_200_200/B56ZuQ9vdJJgAM-/0/1767663663364/pt_sungai_tabuk_industri_logo?e=2147483647&v=beta&t=FPyv2Qh2B_4SSQhER4wPMqOoxSHkoi_eOTJ2phSofVE" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Sungai Tabuk Industri">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUTUrncf4T9v6GWW_5ncakOz6s3kijc1w8vA&s" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Cipta Graha Abadi">
            <img src="https://d1hbpr09pwz0sk.cloudfront.net/logo_url/pt-indec-internusa-b23056e0" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Indec Internusa">
            <img src="https://media.licdn.com/dms/image/v2/D560BAQHb99veC2XeIw/company-logo_200_200/company-logo_200_200/0/1709136202119?e=2147483647&v=beta&t=EAOPoH7uK1AetVkcIc0ENgQSduUqARs4lar-y16SJXA" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="MCM">
            <img src="https://geoforce-indonesia.com/images/logo/logo-geoforce.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="GeoForce">
            <img src="{{ asset('images/logo1.jpg') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Mátra Bumi Blambangan">
        </div>
        
        <div class="flex gap-12 md:gap-16 items-center shrink-0 pr-12 md:pr-16" aria-hidden="true">
            <img src="https://i.pinimg.com/originals/bf/b4/78/bfb4785acb3aa81935470bbf6cca8aa0.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Kementerian PUPR">
            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/7/73/Waskita_Karya.svg/1280px-Waskita_Karya.svg.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Waskita">
            <img src="https://ridergalau.id/wp-content/uploads/2026/01/Logo-Wijaya-Karya-WIKA.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="WIKA">
            <img src="https://www.rukamen.com/uploads/logo_developer/1548844165_9766489.jpeg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Adhi Karya">
            <img src="https://www.hutamakarya.com/storage/logo-site.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Hutama Karya">
            <img src="https://www.ptpp.co.id/_nuxt/img/site-logo.0b5b997.webp" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PT PP">
            <img src="https://yeka-agribisnis.com/assets/images/logo-sgu.webp" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="LAPI Ganesha Utama">
            <img src="https://upload.wikimedia.org/wikipedia/en/3/3c/PT_KCIC_logo.png?_=20230714001837" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="KCIC">
            <img src="https://archiindonesia.com/wp-content/uploads/2024/11/logo-msm.jpg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="MSM">
            <img src="https://archiindonesia.com/wp-content/uploads/2024/11/logo-ttn.jpg" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="TTN">
            <img src="https://erp.brantas-abipraya.co.id/web/image/website/1/logo/ERP%20Brantas%20Abipraya?unique=4d25e81" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Abipraya">
            <img src="https://www.abadicon.com/wp-content/uploads/2024/07/LOGO-Agung-Sedayu-REVI.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Agung Sedayu Group">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg/1280px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="KAI">
            <img src="https://jjb.co.id/wp-content/uploads/2023/12/Logo-Jasa-Marga-Jogja-Bawen-3-05.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="JASAMARGA Jogja-Bawen">
            <img src="https://companieslogo.com/img/orig/JSMR.JK-b8d01527.png?t=1720244492" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="JASAMARGA">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d8/Logo_MedcoEnergi.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Medco Energi">
            <img src="https://astabumi.com/wp-content/uploads/2023/10/Offshore-work-indonesia.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Java Offshore">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_PLN.png/960px-Logo_PLN.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PLN">
            <img src="https://suitmedia.com/_ipx/f_webp/https://suitmedia.static-assets.id/strapi/nindy-59514d4038.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="NINDYA">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/15/Keller_Group_logo.svg/960px-Keller_Group_logo.svg.png?_=20180221041352" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Keller">
            <img src="https://media.licdn.com/dms/image/v2/D560BAQFzirAL7A5B-Q/company-logo_200_200/B56ZuQ9vdJJgAM-/0/1767663663364/pt_sungai_tabuk_industri_logo?e=2147483647&v=beta&t=FPyv2Qh2B_4SSQhER4wPMqOoxSHkoi_eOTJ2phSofVE" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Sungai Tabuk Industri">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUTUrncf4T9v6GWW_5ncakOz6s3kijc1w8vA&s" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Cipta Graha Abadi">
            <img src="https://d1hbpr09pwz0sk.cloudfront.net/logo_url/pt-indec-internusa-b23056e0" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Indec Internusa">
            <img src="https://media.licdn.com/dms/image/v2/D560BAQHb99veC2XeIw/company-logo_200_200/company-logo_200_200/0/1709136202119?e=2147483647&v=beta&t=EAOPoH7uK1AetVkcIc0ENgQSduUqARs4lar-y16SJXA" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="MCM">
            <img src="https://geoforce-indonesia.com/images/logo/logo-geoforce.png" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="GeoForce">
            <img src="{{ asset('images/logo1.jpg') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Mátra Bumi Blambangan">
        </div>

    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6" data-aos="fade-up" data-aos-delay="200">
    <template x-for="cat in categories">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center justify-between group hover:border-red-800/40 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider mb-1" x-text="cat.count"></span>
                <h4 class="text-sm font-black text-slate-800 uppercase tracking-tight group-hover:text-red-800 transition-colors" x-text="cat.name"></h4>
            </div>
            <div class="h-10 w-10 rounded-full bg-slate-50 group-hover:bg-red-50 text-slate-400 group-hover:text-red-800 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </template>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        /* Menggunakan durasi 90s (90 detik) karena jumlah logo Anda banyak (24 pasang), 
           sehingga pergerakannya menjadi sangat smooth, lambat, dan nyaman dilihat */
        animation: marquee 90s linear infinite;
    }
</style>
    </div>
</section>

<style>

</style>

<section id="portfolio" class="bg-slate-100 py-24 px-6 border-t border-slate-200">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16" data-aos="fade-up">
            <div class="mb-6 md:mb-0">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.portfolio.badge') }}</span>
                <h2 class="text-5xl font-black text-slate-900 uppercase tracking-tighter">{{ __('home.portfolio.title') }}</h2>
            </div>
            <a href="#" class="text-red-800 font-bold text-sm border-b-2 border-red-800 pb-1 hover:text-slate-900 hover:border-slate-900 transition-all">
                {{ __('home.portfolio.link') }} &rarr;
            </a>
        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            <livewire:project-slider />
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- SECTION: LATEST BLOG & NEWS               -->
<!-- ========================================== -->
@isset($blogs)
<section class="py-16 bg-white" id="blog-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <span class="text-xs font-bold tracking-widest text-[#c80000] uppercase block mb-2">Our Blog</span>
            <div class="flex flex-wrap justify-between items-end">
                <div>
                    <h2 class="text-3xl font-extrabold text-[#0e1d32] tracking-tight uppercase">
                        {{ __('home.blog.title1') }} <span class="text-slate-900">{{ __('home.blog.title2') }}</span>
                    </h2>
                    <div class="w-12 h-1 bg-[#c80000] mt-3"></div>
                </div>
                
                <div class="flex space-x-2">
                    <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition">
                        &#10094;
                    </button>
                    <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition">
                        &#10095;
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @foreach($blogs as $blog)
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition duration-300">
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90" alt="{{ $blog->title }}">
                        <span class="absolute top-4 left-4 bg-[#c80000] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow-sm">
                            {{ $blog->category }}
                        </span>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-2">
                                {{ $blog->created_at ? $blog->created_at->format('d M Y') : '' }}
                            </span>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-3">
                                {{ $blog->title }}
                            </h3>
                            <p class="text-sm text-slate-500 leading-relaxed line-clamp-3 mb-5">
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                            </p>
                        </div>
                        
                        <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition">
                            Pelajari Selengkapnya
                            <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
@endisset

@include('partials.footer')

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        };
    </script>
    @livewireScripts
</body>
</html>