<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CCard>
          <CCardHeader>
            <CRow>
              <CCol>
                <h3>1.1 User Survey Status</h3>
              </CCol>
            </CRow>
            <CForm inline>
              <CRow class="align-items-center">
                <CInput
                  class="ml-2"
                  v-model="query.account"
                  placeholder="User ID"
                >
                </CInput>
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
              <template #user_id="{ item }">
                <!-- <td v-if="item.term > 1">{{ item.account }}-{{ item.term }}</td> -->
                <td>{{ item.account }}</td>
              </template>
              <template #start_date="{ item }">
                <td>{{ item.start_date | moment("YYYY-MM-DD") }}</td>
              </template>
              <template #end_date="{ item }">
                <td>{{ item.end_date | moment("YYYY-MM-DD") }}</td>
              </template>
              <template #nth_day_current="{ item }">
                <td
                  v-if="
                    item.nth_day_current <= 3 && item.ema_completed_nth_day < 3
                  "
                  class="text-danger text-bold"
                >
                  {{ item.nth_day_current }}
                </td>
                <td
                  v-if="
                    item.nth_day_current > 3 && item.ema_completed_nth_day < 3
                  "
                  class="light-red-color"
                >
                  {{ item.nth_day_current }}
                </td>
                <td v-if="item.ema_completed_nth_day >= 3">
                  {{ item.nth_day_current }}
                </td>
              </template>
              <template #ema_completed_nth_day="{ item }">
                <td
                  v-if="
                    item.nth_day_current <= 3 && item.ema_completed_nth_day < 3
                  "
                  class="text-danger text-bold"
                >
                  {{ item.ema_completed_nth_day }}
                </td>
                <td
                  v-if="
                    item.nth_day_current > 3 && item.ema_completed_nth_day < 3
                  "
                  class="light-red-color"
                >
                  {{ item.ema_completed_nth_day }}
                </td>
                <td v-if="item.ema_completed_nth_day >= 3">
                  {{ item.ema_completed_nth_day }}
                </td>
              </template>
              <template #incentive_nth_day="{ item }">
                <td>{{ item.incentive_nth_day }}</td>
              </template>
              <template #incentive_total="{ item }">
                <td>{{ item.incentive_total }}</td>
              </template>
              <template #action="{ item }">
                <td>
                  <CButton block color="info" @click="overview(item.account_id)"
                    >Personal Overview Description</CButton
                  >
                  <CButton block color="info" @click="exportData"
                    >EMA Record Export</CButton
                  >
                  <!-- <span @click="editRow(item.id)" role="button">
                    <CIcon name="cil-pencil" />
                  </span>
                  <span @click="deleteRow(item.id)" role="button">
                    <CIcon name="cil-trash" />
                  </span> -->
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
        sort: "id,asc",
      },
      caption: "Smokers",
      fields: [
        "user_id",
        "start_date",
        "end_date",
        "nth_day_current",
        "ema_completed_nth_day",
        "incentive_nth_day",
        "incentive_total",
        "action",
      ],
      items: [],
      form: {
        sort: [
          {
            value: "id,desc",
            label: "Default",
          },
          {
            value: "start_date,desc",
            label: "IDs grouped",
          },
        ],
      },
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
  metaInfo() {
    return {
      title: "User Survey Status",
    };
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
    overview(id) {
      this.$router.push({ path: `/smokers/overview/${id}` });
    },
    exportData() {},
  },
};
</script>
<style scoped>
.light-red-color {
  color: palevioletred;
}
.text-bold {
  font-weight: bold;
}
</style>