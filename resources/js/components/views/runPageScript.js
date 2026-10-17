function loadScript(src) {
    return new Promise((resolve, reject) => {
        const existing = document.querySelector(`script[data-mh="${src}"]`);
        if (existing) {
            if (existing.dataset.loaded === '1') {
                resolve();
                return;
            }
            if (existing.dataset.loaded === 'err') {
                reject(new Error(`Failed to load script: ${src}`));
                return;
            }
            existing.addEventListener('load', resolve, { once: true });
            existing.addEventListener('error', () => reject(new Error(`Failed to load script: ${src}`)), { once: true });
            return;
        }

        const script = document.createElement('script');
        script.src = src;
        script.dataset.mh = src;
        script.onload = () => {
            script.dataset.loaded = '1';
            resolve();
        };
        script.onerror = () => {
            script.dataset.loaded = 'err';
            reject(new Error(`Failed to load script: ${src}`));
        };
        document.body.appendChild(script);
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

    const script = document.createElement('script');
    script.textContent = decodeInline(inlineB64);
    document.body.appendChild(script);
}
