import { reactive } from 'vue';

const eventBus = reactive({
    events: {}
});

export const EventBus = {
    emit(event, data) {
        if (eventBus.events[event]) {
            eventBus.events[event].forEach(callback => {
                callback(data);
            });
        }
    },
    on(event, callback) {
        if (!eventBus.events[event]) {
            eventBus.events[event] = [];
        }
        eventBus.events[event].push(callback);
    },
    off(event, callback) {
        if (!eventBus.events[event]) return;
        eventBus.events[event] = eventBus.events[event].filter(cb => cb !== callback);
    },
    trigger(event) {
        if (eventBus.events[event]) {
            eventBus.events[event].forEach(callback => callback());
        }
    }
};
