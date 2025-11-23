import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { InertiaProgress } from "@inertiajs/progress";
import "../css/app.css";
import { createPinia } from "pinia";
// import AppLayoutWrapper from "./Pages/App.vue";
import { ZiggyVue } from "ziggy-js";
import { Ziggy } from "./ziggy";

// Fix: Override Ziggy URL at runtime to use current origin
if (typeof window !== "undefined") {
    Ziggy.url = window.location.origin;
}

const pinia = createPinia();

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");
        return (await pages[`./Pages/${name}.vue`]()).default;
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({
            // render: () =>
            //     h(AppLayoutWrapper, {}, { default: () => h(App, props) }),
        });

        vueApp.use(plugin);
        vueApp.use(pinia);
        vueApp.use(ZiggyVue, Ziggy);

        vueApp.mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });