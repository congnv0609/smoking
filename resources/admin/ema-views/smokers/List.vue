<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CCard>
          <CCardHeader>
            <CForm inline>
              <CRow class="align-items-center">
                  <CInput class="ml-2" v-model="query.account" placeholder="User ID"> </CInput>
                  <CSelect
                    class="ml-2"
                    horizontal
                    :value.sync="query.sort"
                    :options="form.sort"
                    placeholder="Please select"
                  />
                <CCol col="4" sm="4" md="2" xl>
                  <CButton block color="info" @click="getList">Search</CButton>
                </CCol>
              </CRow>
            </CForm>
          </CCardHeader>
          <CCardBody>
            <CDataTable
              :striped="true"
              :small="false"
              :items="items"
              :fields="fields"
              :items-per-page="query.size"
            >
              <template #UserID="{ item }">
                <td>{{ item.account }}</td>
              </template>
              <template #startDate="{ item }">
                <td>{{ item.startDate | moment("YYYY-MM-DD HH:mm") }}</td>
              </template>
              <template #endDate="{ item }">
                <td>{{ item.endDate | moment("YYYY-MM-DD HH:mm") }}</td>
              </template>
              <template #nth_day_current="{ item }">
                <td>{{ item.nth_day_current }}</td>
              </template>
              <template #ema_completed_nth_day="{ item }">
                <td>{{ item.ema_completed_nth_day }}</td>
              </template>
              <template #incentive_nth_day="{ item }">
                <td>{{ item.incentive_nth_day }}</td>
              </template>
              <template #incentive_total="{ item }">
                <td>{{ item.incentive_total }}</td>
              </template>
              <template #updated_at="{ item }">
                <td>{{ item.updated_at | moment("YYYY-MM-DD HH:mm") }}</td>
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
import { smokers } from "../../helpers/smoker";
export default {
  name: "Smokers",
  data() {
    return {
      last_page: 1,
      query: {
        account: undefined,
        page: 1,
        size: 20,
        sort: 'id,desc'
      },
      caption: "Smokers",
      fields: [
        "id",
        "UserID",
        "term",
        "startDate",
        "endDate",
        "nth_day_current",
        "ema_completed_nth_day",
        "incentive_nth_day",
        "incentive_total",
        "updated_at",
        "action",
      ],
      items: [],
      form: {
        sort: [
          {
            value: 'id,desc',
            label: 'Default'
          },
          {
            value: 'startDate,desc',
            label: 'IDs grouped'
          },
        ]
      }
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
          this.items = res.data;
          this.last_page = res.last_page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    editRow(id) {
      this.$router.push({ path: `/smokers/edit/${id}` });
    },
    deleteRow(id) {
      console.log("delete", id);
    },
  },
};
</script>