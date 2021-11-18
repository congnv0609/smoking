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
              :items-per-page="query.size"
            >
              <template #date="{ item }">
                <td>{{ item.date | moment("YYYY-MM-DD") }}</td>
              </template>
              <template #popup_time="{ item }">
                <td>{{ item.popup_time | moment("YYYY-MM-DD HH:mm") }}</td>
              </template>
              <template #popup_time1="{ item }">
                <td>{{ item.popup_time1 | moment("YYYY-MM-DD HH:mm") }}</td>
              </template>
              <template #popup_time2="{ item }">
                <td>{{ item.popup_time2 | moment("YYYY-MM-DD HH:mm") }}</td>
              </template>
              <template #action="{ item }">
                <td>
                  <span @click="editRow(item.id)" role="button">
                    <CIcon name="cil-pencil" />
                  </span>
                  <span @click="deleteRow(item.id)" role="button">
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
import { emaList } from "../../helpers/ema";
export default {
  name: "emaList",
  data() {
    return {
      last_page: 1,
      query: {
        page: 1,
        size: 20,
        ema: 1,
      },
      caption: "Ema List",
      fields: [
        "id",
        "account_id",
        "date",
        "nth_day",
        "nth_popup",
        "popup_time",
        "popup_time1",
        "popup_time2",
        "attempt_time",
        "postponded_1",
        "postponded_2",
        "postponded_3",
      ],
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
      emaList(this.query)
        .then((res) => {
          this.items = res.data;
          this.last_page = res.last_page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    editRow(id) {
      this.$router.push({ path: `/ema/edit/${id}` });
    },
    deleteRow(id) {
      console.log("delete", id);
    },
  },
};
</script>