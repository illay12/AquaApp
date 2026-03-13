{{-- ═══════════════════════════════════════════════════════
     BANNER COOKIES GDPR
     Include în layouts/app.blade.php înainte de </body>:
     @include('components.cookie-banner')
═══════════════════════════════════════════════════════ --}}
@unless(request()->cookie('cookie_consent'))
<div id="cookie-banner" aria-live="polite" aria-label="Banner consimțământ cookies">
    <div class="cb-inner">
        <div class="cb-text">
            <div class="cb-title">
                <i class="bi bi-shield-lock-fill"></i>
                Folosim cookie-uri
            </div>
            <p class="cb-desc">
                Acest site folosește cookie-uri tehnice necesare pentru funcționarea corectă a serviciilor.
                Prin continuarea navigării sunteți de acord cu utilizarea acestora conform
                <a href="{{ url('/gdpr') }}" target="_blank">Politicii de confidențialitate</a> și
                <a href="{{ url('/cookies') }}" target="_blank">Politicii de Cookies</a>.
            </p>
        </div>
        <div class="cb-actions">
            <button id="cb-refuse" class="cb-btn cb-btn-outline" aria-label="Refuză cookie-urile opționale">
                Refuză
            </button>
            <button id="cb-accept" class="cb-btn cb-btn-primary" aria-label="Acceptă toate cookie-urile">
                <i class="bi bi-check-lg me-1"></i> Acceptă
            </button>
        </div>
    </div>
</div>

<style>
#cookie-banner {
    position: fixed;
    bottom: 0; left: 0; right: 0;
    z-index: 9999;
    padding: 0 1rem 1rem;
    pointer-events: none;
}
.cb-inner {
    max-width: 960px;
    margin: 0 auto;
    background: #fff;
    border: 1px solid #e4e9f0;
    border-radius: 16px;
    box-shadow: 0 -4px 40px rgba(0,0,0,.12), 0 8px 32px rgba(0,0,0,.08);
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    pointer-events: all;
    /* Animatie intrare */
    animation: cb-slide-up .35s cubic-bezier(.34,1.56,.64,1) both;
}
@keyframes cb-slide-up {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
}
.cb-text { flex: 1; min-width: 0; }
.cb-title {
    font-size: .9rem; font-weight: 800; color: #111;
    display: flex; align-items: center; gap: .45rem;
    margin-bottom: .3rem;
}
.cb-title i { color: var(--aqua-primary, #0077b6); }
.cb-desc {
    font-size: .8rem; color: #666; margin: 0; line-height: 1.55;
}
.cb-desc a {
    color: var(--aqua-primary, #0077b6); font-weight: 600; text-decoration: none;
}
.cb-desc a:hover { text-decoration: underline; }

.cb-actions {
    display: flex; gap: .6rem; flex-shrink: 0; align-items: center;
}
.cb-btn {
    padding: .65rem 1.4rem; border-radius: 9px;
    font-size: .85rem; font-weight: 800; font-family: inherit;
    cursor: pointer; border: none; white-space: nowrap;
    transition: background .15s, transform .1s, box-shadow .15s;
    display: flex; align-items: center;
}
.cb-btn:active { transform: scale(.97); }
.cb-btn-primary {
    background: var(--aqua-primary, #0077b6); color: #fff;
}
.cb-btn-primary:hover { background: #005f92; box-shadow: 0 4px 12px rgba(0,119,182,.3); }
.cb-btn-outline {
    background: transparent; color: #666;
    border: 1.5px solid #ddd;
}
.cb-btn-outline:hover { border-color: #aaa; color: #333; background: #f5f5f5; }

/* Animatie ieșire */
#cookie-banner.cb-hiding {
    animation: cb-slide-down .25s ease-in forwards;
}
@keyframes cb-slide-down {
    to { opacity: 0; transform: translateY(20px); }
}

/* Mobil */
@media(max-width:600px) {
    #cookie-banner { padding: 0 .75rem .75rem; }
    .cb-inner {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.1rem 1.1rem;
        border-radius: 14px;
    }
    .cb-actions { width: 100%; justify-content: flex-end; }
    .cb-btn { flex: 1; justify-content: center; }
}
</style>

<script>
(function() {
    const banner  = document.getElementById('cookie-banner');
    const btnOk   = document.getElementById('cb-accept');
    const btnNo   = document.getElementById('cb-refuse');

    function dismiss(value) {
        // Scrie cookie 1 an
        const expires = new Date();
        expires.setFullYear(expires.getFullYear() + 1);
        document.cookie = 'cookie_consent=' + value
            + '; expires=' + expires.toUTCString()
            + '; path=/; SameSite=Lax';

        banner.classList.add('cb-hiding');
        banner.addEventListener('animationend', function() {
            banner.remove();
        }, { once: true });
    }

    btnOk.addEventListener('click', function() { dismiss('accepted'); });
    btnNo.addEventListener('click', function() { dismiss('refused'); });
})();
</script>
@endunless
