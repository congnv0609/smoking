<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CCard>
          <CCardHeader>
            <CRow form class="form-group">
              <CCol sm="2"> Select Ema </CCol>
              <CInputRadioGroup
                class="col-sm-9"
                :options="options"
                :custom="true"
                :checked="query.ema"
                :inline="true"
                @update:checked="emaChange"
              />
            </CRow>
            <CRow>
              <CCol sm="2">Account</CCol>
                <CInput
                  class="ml-2"
                  v-model="query.account"
                  placeholder="Account"
                  @change="accountChange"
                ></CInput>
            </CRow>
          </CCardHeader>
          <CCardBody>
            <CDataTable
              :striped="true"
              :small="false"
              :items="items"
              :fields="fields"
              :items-per-page="query.size"
              :scrollX="true"
              :scrollY="true"
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
        size: 7,
        ema: 1,
        account: undefined,
      },
      caption: "Ema List",
      options: [
        {
          value: 1,
          label: "Ema 1",
        },
        {
          value: 2,
          label: "Ema 2",
        },
        {
          value: 3,
          label: "Ema 3",
        },
        {
          value: 4,
          label: "Ema 4",
        },
        {
          value: 5,
          label: "Ema 5",
        },
      ],
      fields: [],
      items: [],
    };
  },
  mounted() {
    this.getList();
  },
  watch: {
    "query.page": function (val, oldVal) {
      return this.getList(this.query.ema);
    },
  },
  methods: {
    getList() {
      emaList(this.query)
        .then((res) => {
          var fieldList = Object.keys(res.data[0]);
          var removeList = ["id", "device_token"];
          this.fields = fieldList.filter(item => !removeList.includes(item));
          this.items = res.data;
          this.last_page = res.last_page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    emaChange(value) {
      this.query.ema = value;
      this.getList();
    },
    accountChange(value) {
      this.query.account = value;
      this.getList();
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