

<template>
    <section class="container">
        <div class="row">

            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2">
                                <h2>Books</h2>
                            </div>
                            <div class="col-8">
                              <TableSearch @setFilter="setFilter" />
                            </div>
                            <div class="col-2 text-end">
                                <a href="#" class="btn btn-warning"><i class="fa-solid fa-plus"></i>&nbsp;Create new book</a>                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                
                      <div v-if="!isLoading">
                        <table v-if="books.length" class="table table-condensed table-striped">
                            <thead>
                              <tr>
                                  <th scope="col">
                                    <SortableLink @sort="setOrder"
                                      text="ISBN"
                                      field="isbn"
                                      type="alpha"
                                      :orderby="orderby"
                                      :order="order" />
                                  </th>
                                  <th scope="col">
                                    <SortableLink @sort="setOrder"
                                      text="Title"
                                      field="title"
                                      type="alpha"
                                      :orderby="orderby"
                                      :order="order" />
                                  </th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Pages</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">
                                    <SortableLink @sort="setOrder"
                                      text="Year"
                                      field="year"
                                      type="amount"
                                      :orderby="orderby"
                                      :order="order" />
                                  </th>
                                  <th scope="col">Soldout</th>
                                  <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(book, index) in books">
                                    <th>{{ book.ISBN }}</th>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.pages }}</td>
                                    <td class="text-end">{{ book.price }}</td>
                                    <td>{{ book.year }}</td>
                                    <td>
                                        <button type="submit" :title="book.soldout ? 'stock' : 'soldout'" class="btn btn-outline" ><i class="fa-2x fa-solid fas fa-fw" :class="book.soldout ? 'fa-toggle-on' : 'fa-toggle-off'"></i></button>
                                    </td>
                                    <td class="text-end">
                                        <a :href="'/books/' +  book.id " class="btn btn-success" title="show"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h2 v-else>No items</h2>
                      </div>
                      <TableLoader v-else/>
                    </div>
                    <div class="card-footer text-end">
                        <b>{{ books.length }}</b> item/s
                    </div>
                </div>

            </div>
        </div>
    </section>

</template>
<script>
import axios from "axios";
import TableLoader from "../../components/TableLoader.vue";
import SortableLink from "../../components/SortableLink.vue";
import TableSearch from "../../components/TableSearch.vue";

export default {
  props: [],
  components: {
    TableLoader,
    SortableLink,
    TableSearch,
  },
  data() {
    return {
      books: [],
      isLoading: false,
      orderby: "title",
      order: "asc",
      search: "",
    };
  },

  created() {
    this.getItems();
  },
  methods: {
    getItems() {
      this.isLoading = true;
      axios
        .get(
          `/api/books?orderby=${this.orderby}&order=${this.order}&search=${this.search}`
        )
        .then((response) => {
          this.books = response.data;
        })
        .catch((error) => {
          console.log("Error", error);
        })
        .then(() => {
          this.isLoading = false;
        });
    },

    setFilter(value) {
      this.search = value;

      this.getItems();
    },

    setOrder(orderby, order) {
      this.orderby = orderby;
      this.order = order;
      this.getItems();
    },

  },
};
</script>

<style lang="scss">

</style>