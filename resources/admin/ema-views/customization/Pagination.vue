<template>
  <CPagination :active-page.sync="pagination.current_page" :pages="pagination.last_page" />
</template>
<script>
export default {
  name: "Pagination",
  props: {
    pagination: {
      current_page: 1,
      per_page: 1,
      first_page_url: "",
      last_page_url: "",
      prev_page_url: "",
      next_page_url: "",
      last_page: 1,
      path: "",
      links: [],
      from: 1,
      to: 1,
      total: 0,
    },
  },
  created() {
    console.log("pagination", this.pagination);
  },
  methods: {
    changePage(item) {
      console.log("item", item);
    },
  },
};
</script>