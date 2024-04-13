<template>
  <div class="container">
    <div class="row">
      <div class="col mt-1 pl-3 pr-3">
        <div class="input-group input-group-sm">
          <input
            id="search"
            type="text"
            class="form-control"
            v-model="filter"
            placeholder="cerca ..."
            @keyup="onKeyup"
          />
          <div class="input-group-append">
            <button
              class="btn btn-outline-secondary"
              type="button"
              @click="onKeyup"
            >
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// search bar with delayed activation
export default {
  emits: ["setFilter"],
  data() {
    return {
      filter: "",
    };
  },
  mounted() {
    this.debounceFn = this.debounce(() => this.setFilter(), 800)
  },
  methods: {
    onKeyup() {
      this.debounceFn()
    },
    debounce(func, delay = 600, immediate = false) {
      let timeout
      return function () {
        const context = this
        const args = arguments        
        const later = function () {
          timeout = null
          if (!immediate) func.apply(context, args)
        }
        const callNow = immediate && !timeout
        clearTimeout(timeout)
        timeout = setTimeout(later, delay)
        if (callNow) func.apply(context, args)
      }
    },
    setFilter() {
      let filter = this.filter.trim();
      if (filter && filter.length > 2) {
        this.$emit("setFilter", filter);
      } else {
        this.$emit("setFilter", "");
      }
    },
  },
};
</script>

