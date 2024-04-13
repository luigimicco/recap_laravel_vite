import { createApp } from 'vue/dist/vue.esm-bundler.js'
import BooksTable from "./Books.vue";

const rootComponent = createApp({
  data() {
    return {
    };
  },
  components: {
    'books-table': BooksTable,
  },
},);

rootComponent.mount('#books');