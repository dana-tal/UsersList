import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from "./Shared/Layout.vue";

import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/custom.css';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
  //  return pages[`./Pages/${name}.vue`]
    let page = pages[`./Pages/${name}.vue`];
   /* if (!page.default.layout)
    {
        page.default.layout = Layout;
    }*/
    page.default.layout = page.default.layout || Layout;
    return page;

  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
