<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bolão Copa FIFA 2026 – Vieira</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@700;900&family=Barlow:wght@400;600&display=swap" rel="stylesheet">

        <style>
            body { font-family: 'Barlow', sans-serif; }
            .font-bebas      { font-family: 'Bebas Neue', sans-serif; }
            .font-barlow-cond{ font-family: 'Barlow Condensed', sans-serif; }

            /* Fundo escuro temático */
            .bg-copa {
                background: linear-gradient(160deg, #0a0a0a 0%, #111827 45%, #0a0a0a 100%);
            }

            /* Estrelas */
            .stars-wrap { position:fixed; inset:0; pointer-events:none; z-index:0; overflow:hidden; }
            .star {
                position:absolute; border-radius:9999px; background:white;
                animation: twinkle 2s infinite alternate;
            }
            @keyframes twinkle {
                from { opacity:.15; transform:scale(1); }
                to   { opacity:.9;  transform:scale(1.6); }
            }

            /* Anéis giratórios atrás da logo */
            .ring-glow {
                position:absolute; inset:-16px; border-radius:9999px;
                border: 2px solid rgba(201,168,79,.35);
                animation: spinRing 12s linear infinite;
            }
            .ring-glow-2 {
                position:absolute; inset:-32px; border-radius:9999px;
                border: 1px solid rgba(201,168,79,.15);
                animation: spinRing 20s linear infinite reverse;
            }
            @keyframes spinRing {
                from { transform:rotate(0deg); }
                to   { transform:rotate(360deg); }
            }

            /* Brilho da logo */
            .logo-glow {
                box-shadow: 0 0 60px 20px rgba(201,168,79,.2),
                            0 0 120px 40px rgba(201,168,79,.08);
                border-radius:9999px;
            }

            /* Texto dourado gradiente */
            .text-gold-gradient {
                background: linear-gradient(135deg,#f5d97a,#c9a84f,#ffdf00,#c9a84f);
                -webkit-background-clip:text;
                -webkit-text-fill-color:transparent;
                background-clip:text;
            }

            /* Barra tricolor Brasil */
            .stripe-bar {
                height:5px;
                background: linear-gradient(90deg,
                    #009c3b 33.3%, #ffdf00 33.3% 66.6%, #009c3b 66.6%);
            }

            /* Card glassmorphism */
            .glass-card {
                background: rgba(255,255,255,.04);
                border: 1px solid rgba(201,168,79,.2);
                border-radius:1.25rem;
                backdrop-filter:blur(12px);
            }

            /* Badge pill */
            .badge-pill {
                background: rgba(0,40,80,.55);
                border: 1px solid rgba(201,168,79,.35);
                border-radius:9999px;
                color:#f5d97a;
                font-family:'Barlow Condensed',sans-serif;
                font-weight:700;
                font-size:.82rem;
                letter-spacing:.06em;
                padding:.35rem 1rem;
                display:inline-flex;
                align-items:center;
                gap:6px;
            }

            /* Countdown */
            .cd-box {
                background:rgba(0,0,0,.45);
                border:1px solid rgba(201,168,79,.2);
                border-radius:.6rem;
                min-width:60px;
                text-align:center;
                padding:.45rem .75rem;
            }
            .cd-num { font-family:'Bebas Neue',sans-serif; font-size:1.9rem; color:#ffdf00; line-height:1; display:block; }
            .cd-lbl { font-size:.6rem; letter-spacing:.15em; text-transform:uppercase; color:rgba(255,255,255,.4); display:block; }

            /* CTA */
            .btn-cta {
                font-family:'Barlow Condensed',sans-serif;
                font-weight:700;
                font-size:1rem;
                letter-spacing:.12em;
                text-transform:uppercase;
                background:linear-gradient(135deg,#ffdf00,#c9a84f);
                color:#0a0a0a;
                border:none;
                border-radius:9999px;
                padding:.75rem 2rem;
                text-decoration:none;
                display:inline-block;
                transition:all .3s ease;
                box-shadow:0 4px 20px rgba(255,223,0,.3);
            }
            .btn-cta:hover {
                transform:translateY(-2px) scale(1.04);
                box-shadow:0 8px 28px rgba(255,223,0,.45);
                color:#0a0a0a;
                text-decoration:none;
            }

            /* Animações de entrada */
            @keyframes fadeSlideUp {
                from { opacity:0; transform:translateY(28px); }
                to   { opacity:1; transform:translateY(0); }
            }
            @keyframes fadeIn {
                from { opacity:0; }
                to   { opacity:1; }
            }
            .anim-1 { animation: fadeIn       .8s .1s ease-out both; }
            .anim-2 { animation: fadeSlideUp  .8s .3s ease-out both; }
            .anim-3 { animation: fadeSlideUp  .8s .5s ease-out both; }
            .anim-4 { animation: fadeSlideUp  .8s .7s ease-out both; }
            .anim-5 { animation: fadeSlideUp  .8s .9s ease-out both; }
            .anim-6 { animation: fadeSlideUp  .8s 1.1s ease-out both; }

            /* Divisor dourado */
            .divider-gold { display:flex; align-items:center; gap:10px; justify-content:center; }
            .divider-line-gold { height:1px; width:50px; background:linear-gradient(90deg,transparent,rgba(201,168,79,.6)); }
            .divider-line-gold.r { background:linear-gradient(90deg,rgba(201,168,79,.6),transparent); }

            /* Botões de auth */
            .auth-btn {
                display:inline-block;
                padding:.375rem 1.25rem;
                border-radius:.25rem;
                font-size:.875rem;
                line-height:1.5;
                text-decoration:none;
                transition:all .2s;
                font-family:'Barlow',sans-serif;
            }
            .auth-btn-outline {
                color:rgba(255,255,255,.75);
                border:1px solid rgba(255,255,255,.15);
            }
            .auth-btn-outline:hover {
                color:#fff;
                border-color:rgba(201,168,79,.5);
                background:rgba(201,168,79,.07);
                text-decoration:none;
            }
            .auth-btn-filled {
                color:#0a0a0a;
                background:linear-gradient(135deg,#ffdf00,#c9a84f);
                border:1px solid transparent;
                font-weight:600;
            }
            .auth-btn-filled:hover {
                transform:translateY(-1px);
                box-shadow:0 4px 16px rgba(255,223,0,.35);
                color:#0a0a0a;
                text-decoration:none;
            }
        </style>
    </head>

    <body class="bg-copa min-h-screen flex flex-col text-white">

        {{-- Estrelas animadas --}}
        <div class="stars-wrap" id="stars" aria-hidden="true"></div>

        {{-- Barra superior tricolor --}}
        <div class="stripe-bar w-full relative z-10"></div>

        {{-- ===== HEADER COM AUTH (estrutura original mantida) ===== --}}
        <header class="relative z-10 w-full px-6 py-4">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-3 max-w-6xl mx-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-btn auth-btn-filled">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn auth-btn-outline">
                            Acessar
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-btn auth-btn-filled">
                                Registre-se
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        {{-- ===== HERO PRINCIPAL ===== --}}
        <main class="relative z-10 flex-1 flex flex-col items-center justify-center px-4 py-10 text-center">

            {{-- Logo oficial FIFA 2026 --}}
            <div class="anim-1 relative mb-6 inline-flex items-center justify-center">
                <div class="ring-glow"></div>
                <div class="ring-glow-2"></div>
                <div class="logo-glow relative">
                    <img
                        src="{{ asset('storage/FIFA2026.webp') }}"
                        alt="Logo FIFA World Cup 2026"
                        class="w-52 h-52 object-contain rounded-full"
                        style="background:#0a0a0a;"
                    >
                </div>
            </div>

            {{-- Subtítulo --}}
            <p class="anim-2 font-barlow-cond font-bold tracking-widest uppercase text-white/70 text-base mb-1">
                Bolão Oficial
            </p>

            {{-- Título principal --}}
            <h1 class="anim-2 font-bebas leading-none mb-1"
                style="font-size:clamp(2.5rem,8vw,5rem); color:#ffdf00;
                       text-shadow:3px 3px 0 rgba(0,0,0,.5),0 0 40px rgba(255,223,0,.25);">
                Copa do Mundo FIFA 2026
            </h1>

            {{-- Nome Vieira dourado --}}
            <h2 class="anim-3 font-bebas text-gold-gradient leading-none mb-4"
                style="font-size:clamp(3rem,10vw,6rem); letter-spacing:.08em;">
                Vieira
            </h2>

            {{-- Divisor --}}
            <div class="anim-3 divider-gold mb-4">
                <div class="divider-line-gold"></div>
                <span style="font-size:1.1rem;">⚽</span>
                <div class="divider-line-gold r"></div>
            </div>

            {{-- Badges --}}
            <div class="anim-4 flex flex-wrap gap-2 justify-center mb-5">
                <span class="badge-pill">🇺🇸🇨🇦🇲🇽 EUA · Canadá · México</span>
                <span class="badge-pill">📅 Jun – Jul 2026</span>
                <span class="badge-pill">🏆 48 Seleções</span>
            </div>

            {{-- Countdown --}}
            <div class="anim-5 mb-6">
                <p class="text-xs tracking-widest uppercase text-white/40 mb-2">
                    Contagem regressiva para o apito inicial
                </p>
                <div class="flex gap-2 justify-center">
                    <div class="cd-box"><span class="cd-num" id="cd-d">--</span><span class="cd-lbl">Dias</span></div>
                    <div class="cd-box"><span class="cd-num" id="cd-h">--</span><span class="cd-lbl">Horas</span></div>
                    <div class="cd-box"><span class="cd-num" id="cd-m">--</span><span class="cd-lbl">Min</span></div>
                    <div class="cd-box"><span class="cd-num" id="cd-s">--</span><span class="cd-lbl">Seg</span></div>
                </div>
            </div>

            {{-- Card de boas-vindas --}}
            <article class="anim-5 glass-card px-8 py-6 max-w-xl w-full mb-7 text-left">
                <p class="text-white/85 leading-relaxed mb-3" style="font-size:1.02rem;">
                    Seja muito bem-vindo ao
                    <strong class="text-yellow-300 font-semibold">Bolão Copa FIFA 2026 – Vieira</strong>! 🎉
                    Prepare-se para a maior festa do futebol mundial, agora com
                    <strong class="text-yellow-300 font-semibold">48 seleções</strong>
                    e mais emoção do que nunca.
                </p>
                <p class="text-white/85 leading-relaxed mb-3" style="font-size:1.02rem;">
                    Lance seus palpites, acompanhe a classificação e torça muito pela
                    sua seleção favorita levantar o troféu. Que vença o melhor...
                    e o mais sortudo! 😄
                </p>
                <p class="text-white/85 leading-relaxed" style="font-size:1.02rem;">
                    Boa sorte a todos, e que o melhor
                    <strong class="text-yellow-300 font-semibold">Bolão Vieira</strong> vença! 🏆⚽
                </p>
            </article>

            {{-- CTA inteligente (auth-aware) --}}
            <div class="anim-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-cta">
                        Ir para o Dashboard 🎯
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-cta">
                        Participar do Bolão 🎯
                    </a>
                @endauth
            </div>

        </main>

        {{-- Barra inferior tricolor --}}
        <div class="stripe-bar w-full relative z-10"></div>

        {{-- Rodapé --}}
        <footer class="relative z-10 text-center py-3 text-xs tracking-widest text-white/25">
            &copy; {{ date('Y') }} Bolão Copa Vieira &middot; Todos os direitos reservados
        </footer>

        <script>
            // ---- Estrelas animadas ----
            (function() {
                const wrap = document.getElementById('stars');
                for (let i = 0; i < 90; i++) {
                    const s = document.createElement('div');
                    s.className = 'star';
                    const sz = Math.random() < 0.25 ? 3 : 2;
                    s.style.cssText = [
                        'left:'   + (Math.random()*100).toFixed(2) + '%',
                        'top:'    + (Math.random()*100).toFixed(2) + '%',
                        'width:'  + sz + 'px',
                        'height:' + sz + 'px',
                        'animation-delay:'    + (Math.random()*4).toFixed(2) + 's',
                        'animation-duration:' + (1.5+Math.random()*2.5).toFixed(2) + 's',
                    ].join(';');
                    wrap.appendChild(s);
                }
            })();

            // ---- Contagem regressiva — 11 Jun 2026 ----
            const target = new Date('2026-06-11T16:00:00Z');
            function pad(n) { return String(Math.max(0,n)).padStart(2,'0'); }
            function tick() {
                const diff = target - Date.now();
                if (diff <= 0) {
                    ['cd-d','cd-h','cd-m','cd-s'].forEach(id =>
                        document.getElementById(id).textContent = '00');
                    return;
                }
                document.getElementById('cd-d').textContent = pad(Math.floor(diff/86400000));
                document.getElementById('cd-h').textContent = pad(Math.floor((diff%86400000)/3600000));
                document.getElementById('cd-m').textContent = pad(Math.floor((diff%3600000)/60000));
                document.getElementById('cd-s').textContent = pad(Math.floor((diff%60000)/1000));
            }
            tick();
            setInterval(tick, 1000);
        </script>

    </body>
</html>