<template>
  <div :class="linkClass" @click="$emit('sort', field, linkOrder)">
    <span type="button">{{ text }}</span
    ><i :class="'fas ' + linkIcon"></i>
  </div>
</template>
<script>
export default {
  props: ["text", "field", "type", "orderby", "order"],
  emits: ["sort"],
  data() {
    return {};
  },
  computed: {
    linkClass() {
      if (this.field == this.orderby) return "";
      else return "";
    },
    linkOrder() {
      if (this.field == this.orderby && this.order == "asc") return "desc";
      else return "asc";
    },
    linkIcon() {
      let icon = "fa-sort";
      if (this.type == null) {
        if (this.field == this.orderby && this.order == "asc") {
          icon = "fa-sort-down";
        } else if (this.field == this.orderby) {
          icon = "fa-sort-up";
        }
      } else if (this.type == "alpha") {
        if (this.field == this.orderby && this.order == "asc") {
          icon = "fa-sort-alpha-down";
        } else if (this.field == this.orderby) {
          icon = "fa-sort-alpha-up";
        }
      } else if (this.type == "numeric") {
        if (this.field == this.orderby && this.order == "asc") {
          icon = "fa-sort-numeric-down";
        } else if (this.field == this.orderby) {
          icon = "fa-sort-numeric-up";
        }
      } else if (this.type == "amount") {
        if (this.field == this.orderby && this.order == "asc") {
          icon = "fa-sort-amount-down";
        } else if (this.field == this.orderby) {
          icon = "fa-sort-amount-up";
        }
      }
      return icon;
    },
  },
  mounted() {},
};
</script>

<style scoped>
</style>