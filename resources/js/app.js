import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import DefaultLayout from './layouts/DefaultLayout.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const page = resolvePageComponent(`./pages/${name}.vue`, import.meta.glob('./pages/**/*.vue'));
    page.then((module) => {
      module.default.layout = module.default.layout || DefaultLayout;
    });
    return page;
  },
  setup({ el, App, props, plugin }) {
    const VueApp = createApp({ render: () => h(App, props) });
    VueApp.config.globalProperties.$route = route;

    VueApp.use(plugin).use(ZiggyVue, Ziggy).mount(el);
  },
  progress: {
    color: '#4B5563',
  },
});

router.on('start', (event) => {
  sessionStorage.setItem('prev', event.detail.visit.url);
});
