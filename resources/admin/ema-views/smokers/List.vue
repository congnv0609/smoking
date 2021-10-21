<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CCard>
          <CCardHeader>
            <CIcon name="cil-grid" /> {{ caption }}
            <div class="card-header-actions">
              <a
                href="#"
                class="card-header-action"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">Export</small>
              </a>
            </div>
          </CCardHeader>
          <CCardBody>
            <CDataTable
              :striped="true"
              :small="false"
              :items="items"
              :fields="fields"
            >
              <template #action="{ item }">
                <td>
                  <span @click="editRow(item.id)" role="button">
                    <CIcon name="cil-pencil" />
                  </span>
                  <span  @click="deleteRow(item.id)" role="button">
                    <CIcon name="cil-trash" />
                  </span>
                </td>
              </template>
            </CDataTable>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="12">
        <CPagination :active-page.sync="query.page" :pages="last_page" />
      </CCol>
    </CRow>
  </div>
</template>
<script>
import { smokers } from "../../helpers/smoker";
export default {
  name: "Smokers",
  data() {
    return {
      last_page: 1,
      query: {
        page: 1,
        size: 20,
      },
      caption: "Smokers",
      fields: ["id", "account", "term", "startDate", "endDate", "action"],
      items: [],
    };
  },
  mounted() {
    this.getList();
  },
  watch: {
    "query.page": function (val, oldVal) {
      return this.getList();
    },
  },
  methods: {
    getList() {
      smokers(this.query)
        .then((res) => {
          console.log("list", res)
          this.items = res.data;
          this.last_page = res.last_page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    editRow(id) {
      this.$router.push({path: `/smokers/edit/${id}`})
    },
    deleteRow(id) {
      console.log("delete", id);
    },
  },
};
</script>