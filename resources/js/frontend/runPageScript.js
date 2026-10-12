function loadScript(src) {
    return new Promise((resolve) => {
        const existing = document.querySelector(`script[data-mh="${src}"]`);
        if (existing) {
            if (existing.dataset.loaded) {
                resolve();
                return;
            }
            existing.addEventListener('load', () => resolve(), { once: true });
            existing.addEventListener('error', () => resolve(), { once: true });
            return;
        }

        const el = document.createElement('script');
        el.src = src;
        el.dataset.mh = src;
        el.onload = () => {
            el.dataset.loaded = '1';
            resolve();
        };
        el.onerror = () => {
            el.dataset.loaded = 'err';
            resolve();
        };
        document.body.appendChild(el);
    });
}

function decodeInline(inlineB64) {
    const bytes = Uint8Array.from(atob(inlineB64), (char) => char.charCodeAt(0));
    return new TextDecoder().decode(bytes);
}

export async function bootPage(externals = [], inlineB64 = '') {
    for (const src of externals) {
        await loadScript(src);
    }

    if (!inlineB64) {
        return;
    }

    const el = document.createElement('script');
    el.textContent = decodeInline(inlineB64);
    document.body.appendChild(el);
}
