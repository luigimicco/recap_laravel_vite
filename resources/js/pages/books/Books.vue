

<template>
    <section class="container">
        <div class="row">

            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Books</h2>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="btn btn-warning"><i class="fa-solid fa-plus"></i>&nbsp;Create new book</a>                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                
                      <div v-if="!isLoading">
                        <table v-if="books.length" class="table table-condensed table-striped">
                            <thead>
                              <tr>
                                  <th scope="col">ISBN</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Pages</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Year</th>
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

export default {
  props: [],
  components: {
    TableLoader
  },
  data() {
    return {
      books: [],
      isLoading: false,
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
          `/api/books`
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

  },
};
</script>

<style lang="scss">

</style>