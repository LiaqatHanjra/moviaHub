import { reactive } from 'vue';

const HIDE_DELAY_MS = 250;

export const loaderState = reactive({ visible: false });

let pendingRequests = 0;
let routeLoading = false;
let hideTimer = null;

function sync() {
    if (pendingRequests > 0 || routeLoading) {
        clearTimeout(hideTimer);
        hideTimer = null;
        loaderState.visible = true;
        return;
    }

    // Delay hiding so a page's mounted() requests can start before the loader drops
    if (!hideTimer) {
        hideTimer = setTimeout(() => {
            hideTimer = null;
            if (pendingRequests === 0 && !routeLoading) {
                loaderState.visible = false;
            }
        }, HIDE_DELAY_MS);
    }
}

export function requestStarted() {
    pendingRequests++;
    sync();
}

export function requestFinished() {
    pendingRequests = Math.max(0, pendingRequests - 1);
    sync();
}

export function routeStarted() {
    routeLoading = true;
    sync();
}

export function routeFinished() {
    routeLoading = false;
    sync();
}
