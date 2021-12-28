<template>
  <div>
    <CCard>
      <CCardHeader>
        <CRow>
          <CCol>
            <h3>1.1.1 Personal Overview Description</h3>
          </CCol>
        </CRow>
        <CRow>
          <CCol sm="3">user_id: {{ account }} </CCol>
          <CCol sm="3"
            >start_date: {{ startDate | moment("YYYY-MM-DD") }}
          </CCol>
          <CCol sm="3">end_date: {{ endDate | moment("YYYY-MM-DD") }} </CCol>
        </CRow>
      </CCardHeader>
      <CCardBody>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col" rowspan="2" class="align-middle">smoking cues</th>
              <th scope="col" colspan="2">B2.食 - 普通煙</th>
              <th scope="col" colspan="2">B3.食 - 加熱煙</th>
              <th scope="col" colspan="2">B4.食 - 電子煙</th>
              <th scope="col" colspan="2">B7.衝動 - 普通煙</th>
              <th scope="col" colspan="2">B10.衝動 - 加熱煙</th>
              <th scope="col" colspan="2">B13.衝動 - 電子煙</th>
              <th scope="col" colspan="2">B14.買 - 普通煙</th>
              <th scope="col" colspan="2">B15.買 - 加熱煙</th>
              <th scope="col" colspan="2">B16.買 - 電子煙</th>
            </tr>
            <tr>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
              <th>Yes</th>
              <th>No</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">c1_a.參與社交應酬/朋友聚會</th>
              <td>{{ items.b2_c1a[0] || '' }}</td>
              <td>{{ items.b2_c1a[1] || '' }}</td>
              <td>{{ items.b3_c1a[0] || '' }}</td>
              <td>{{ items.b3_c1a[1] || '' }}</td>
              <td>{{ items.b4_c1a[0] || '' }}</td>
              <td>{{ items.b4_c1a[1] || '' }}</td>
              <td>{{ items.b7_c1a[0] || '' }}</td>
              <td>{{ items.b7_c1a[1] || '' }}</td>
              <td>{{ items.b10_c1a[0] || '' }}</td>
              <td>{{ items.b10_c1a[1] || '' }}</td>
              <td>{{ items.b13_c1a[0] || '' }}</td>
              <td>{{ items.b13_c1a[1] || '' }}</td>
              <td>{{ items.b14_c1a[0] || '' }}</td>
              <td>{{ items.b14_c1a[1] || '' }}</td>
              <td>{{ items.b15_c1a[0] || '' }}</td>
              <td>{{ items.b15_c1a[1] || '' }}</td>
              <td>{{ items.b16_c1a[0] || '' }}</td>
              <td>{{ items.b16_c1a[1] || '' }}</td>
            </tr>
            <tr>
              <th scope="row">
                c1_b.到娛樂場所消遣（例如酒吧 / 卡拉OK / 遊戲機中心 / 電影院 /
                戲院 / 音樂廳）
              </th>
              <td>{{ items.b2_c1b[0] || '' }}</td>
              <td>{{ items.b2_c1b[1] || '' }}</td>
              <td>{{ items.b3_c1b[0] || '' }}</td>
              <td>{{ items.b3_c1b[1] || '' }}</td>
              <td>{{ items.b4_c1b[0] || '' }}</td>
              <td>{{ items.b4_c1b[1] || '' }}</td>
              <td>{{ items.b7_c1b[0] || '' }}</td>
              <td>{{ items.b7_c1b[1] || '' }}</td>
              <td>{{ items.b10_c1b[0] || '' }}</td>
              <td>{{ items.b10_c1b[1] || '' }}</td>
              <td>{{ items.b13_c1b[0] || '' }}</td>
              <td>{{ items.b13_c1b[1] || '' }}</td>
              <td>{{ items.b14_c1b[0] || '' }}</td>
              <td>{{ items.b14_c1b[1] || '' }}</td>
              <td>{{ items.b15_c1b[0] || '' }}</td>
              <td>{{ items.b15_c1b[1] || '' }}</td>
              <td>{{ items.b16_c1b[0] || '' }}</td>
              <td>{{ items.b16_c1b[1] || '' }}</td>
            </tr>
            <tr>
              <th scope="row">c1_c.飲用酒精產品</th>
              <td>{{ items.b2_c1c[0] || '' }}</td>
              <td>{{ items.b2_c1c[1] || '' }}</td>
              <td>{{ items.b3_c1c[0] || '' }}</td>
              <td>{{ items.b3_c1c[1] || '' }}</td>
              <td>{{ items.b4_c1c[0] || '' }}</td>
              <td>{{ items.b4_c1c[1] || '' }}</td>
              <td>{{ items.b7_c1c[0] || '' }}</td>
              <td>{{ items.b7_c1c[1] || '' }}</td>
              <td>{{ items.b10_c1c[0] || '' }}</td>
              <td>{{ items.b10_c1c[1] || '' }}</td>
              <td>{{ items.b13_c1c[0] || '' }}</td>
              <td>{{ items.b13_c1c[1] || '' }}</td>
              <td>{{ items.b14_c1c[0] || '' }}</td>
              <td>{{ items.b14_c1c[1] || '' }}</td>
              <td>{{ items.b15_c1c[0] || '' }}</td>
              <td>{{ items.b15_c1c[1] || '' }}</td>
              <td>{{ items.b16_c1c[0] || '' }}</td>
              <td>{{ items.b16_c1c[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c1_d.嗅到二手煙</th>
              <td>{{ items.b2_c1d[0] || '' }}</td>
              <td>{{ items.b2_c1d[1] || '' }}</td>
              <td>{{ items.b3_c1d[0] || '' }}</td>
              <td>{{ items.b3_c1d[1] || '' }}</td>
              <td>{{ items.b4_c1d[0] || '' }}</td>
              <td>{{ items.b4_c1d[1] || '' }}</td>
              <td>{{ items.b7_c1d[0] || '' }}</td>
              <td>{{ items.b7_c1d[1] || '' }}</td>
              <td>{{ items.b10_c1d[0] || '' }}</td>
              <td>{{ items.b10_c1d[1] || '' }}</td>
              <td>{{ items.b13_c1d[0] || '' }}</td>
              <td>{{ items.b13_c1d[1] || '' }}</td>
              <td>{{ items.b14_c1d[0] || '' }}</td>
              <td>{{ items.b14_c1d[1] || '' }}</td>
              <td>{{ items.b15_c1d[0] || '' }}</td>
              <td>{{ items.b15_c1d[1] || '' }}</td>
              <td>{{ items.b16_c1d[0] || '' }}</td>
              <td>{{ items.b16_c1d[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">
                c1_e.見到家人食緊任何煙草產品(普通煙仔/加熱煙/電子煙)
              </th>
              <td>{{ items.b2_c1e[0] || '' }}</td>
              <td>{{ items.b2_c1e[1] || '' }}</td>
              <td>{{ items.b3_c1e[0] || '' }}</td>
              <td>{{ items.b3_c1e[1] || '' }}</td>
              <td>{{ items.b4_c1e[0] || '' }}</td>
              <td>{{ items.b4_c1e[1] || '' }}</td>
              <td>{{ items.b7_c1e[0] || '' }}</td>
              <td>{{ items.b7_c1e[1] || '' }}</td>
              <td>{{ items.b10_c1e[0] || '' }}</td>
              <td>{{ items.b10_c1e[1] || '' }}</td>
              <td>{{ items.b13_c1e[0] || '' }}</td>
              <td>{{ items.b13_c1e[1] || '' }}</td>
              <td>{{ items.b14_c1e[0] || '' }}</td>
              <td>{{ items.b14_c1e[1] || '' }}</td>
              <td>{{ items.b15_c1e[0] || '' }}</td>
              <td>{{ items.b15_c1e[1] || '' }}</td>
              <td>{{ items.b16_c1e[0] || '' }}</td>
              <td>{{ items.b16_c1e[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">
                c1_f.見到朋友食緊任何煙草產品(普通煙仔/加熱煙/電子煙)
              </th>
              <td>{{ items.b2_c1f[0] || '' }}</td>
              <td>{{ items.b2_c1f[1] || '' }}</td>
              <td>{{ items.b3_c1f[0] || '' }}</td>
              <td>{{ items.b3_c1f[1] || '' }}</td>
              <td>{{ items.b4_c1f[0] || '' }}</td>
              <td>{{ items.b4_c1f[1] || '' }}</td>
              <td>{{ items.b7_c1f[0] || '' }}</td>
              <td>{{ items.b7_c1f[1] || '' }}</td>
              <td>{{ items.b10_c1f[0] || '' }}</td>
              <td>{{ items.b10_c1f[1] || '' }}</td>
              <td>{{ items.b13_c1f[0] || '' }}</td>
              <td>{{ items.b13_c1f[1] || '' }}</td>
              <td>{{ items.b14_c1f[0] || '' }}</td>
              <td>{{ items.b14_c1f[1] || '' }}</td>
              <td>{{ items.b15_c1f[0] || '' }}</td>
              <td>{{ items.b15_c1f[1] || '' }}</td>
              <td>{{ items.b16_c1f[0] || '' }}</td>
              <td>{{ items.b16_c1f[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">
                c1_g.有人向你推介任何煙草產品/邀請你用任何煙草產品(普通煙仔/加熱煙/電子煙)
              </th>
              <td>{{ items.b2_c1g[0] || '' }}</td>
              <td>{{ items.b2_c1g[1] || '' }}</td>
              <td>{{ items.b3_c1g[0] || '' }}</td>
              <td>{{ items.b3_c1g[1] || '' }}</td>
              <td>{{ items.b4_c1g[0] || '' }}</td>
              <td>{{ items.b4_c1g[1] || '' }}</td>
              <td>{{ items.b7_c1g[0] || '' }}</td>
              <td>{{ items.b7_c1g[1] || '' }}</td>
              <td>{{ items.b10_c1g[0] || '' }}</td>
              <td>{{ items.b10_c1g[1] || '' }}</td>
              <td>{{ items.b13_c1g[0] || '' }}</td>
              <td>{{ items.b13_c1g[1] || '' }}</td>
              <td>{{ items.b14_c1g[0] || '' }}</td>
              <td>{{ items.b14_c1g[1] || '' }}</td>
              <td>{{ items.b15_c1g[0] || '' }}</td>
              <td>{{ items.b15_c1g[1] || '' }}</td>
              <td>{{ items.b16_c1g[0] || '' }}</td>
              <td>{{ items.b16_c1g[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c1_h.人際關係問題 *例如：嬲、鬧交、爭執</th>
              <td>{{ items.b2_c1h[0] || '' }}</td>
              <td>{{ items.b2_c1h[1] || '' }}</td>
              <td>{{ items.b3_c1h[0] || '' }}</td>
              <td>{{ items.b3_c1h[1] || '' }}</td>
              <td>{{ items.b4_c1h[0] || '' }}</td>
              <td>{{ items.b4_c1h[1] || '' }}</td>
              <td>{{ items.b7_c1h[0] || '' }}</td>
              <td>{{ items.b7_c1h[1] || '' }}</td>
              <td>{{ items.b10_c1h[0] || '' }}</td>
              <td>{{ items.b10_c1h[1] || '' }}</td>
              <td>{{ items.b13_c1h[0] || '' }}</td>
              <td>{{ items.b13_c1h[1] || '' }}</td>
              <td>{{ items.b14_c1h[0] || '' }}</td>
              <td>{{ items.b14_c1h[1] || '' }}</td>
              <td>{{ items.b15_c1h[0] || '' }}</td>
              <td>{{ items.b15_c1h[1] || '' }}</td>
              <td>{{ items.b16_c1h[0] || '' }}</td>
              <td>{{ items.b16_c1h[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_a.抑鬱情緒/唔開心/沮喪</th>
              <td>{{ items.b2_c2a[0] || '' }}</td>
              <td>{{ items.b2_c2a[1] || '' }}</td>
              <td>{{ items.b3_c2a[0] || '' }}</td>
              <td>{{ items.b3_c2a[1] || '' }}</td>
              <td>{{ items.b4_c2a[0] || '' }}</td>
              <td>{{ items.b4_c2a[1] || '' }}</td>
              <td>{{ items.b7_c2a[0] || '' }}</td>
              <td>{{ items.b7_c2a[1] || '' }}</td>
              <td>{{ items.b10_c2a[0] || '' }}</td>
              <td>{{ items.b10_c2a[1] || '' }}</td>
              <td>{{ items.b13_c2a[0] || '' }}</td>
              <td>{{ items.b13_c2a[1] || '' }}</td>
              <td>{{ items.b14_c2a[0] || '' }}</td>
              <td>{{ items.b14_c2a[1] || '' }}</td>
              <td>{{ items.b15_c2a[0] || '' }}</td>
              <td>{{ items.b15_c2a[1] || '' }}</td>
              <td>{{ items.b16_c2a[0] || '' }}</td>
              <td>{{ items.b16_c2a[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_b.暴躁/易怒/愤怒</th>
              <td>{{ items.b2_c2b[0] || '' }}</td>
              <td>{{ items.b2_c2b[1] || '' }}</td>
              <td>{{ items.b3_c2b[0] || '' }}</td>
              <td>{{ items.b3_c2b[1] || '' }}</td>
              <td>{{ items.b4_c2b[0] || '' }}</td>
              <td>{{ items.b4_c2b[1] || '' }}</td>
              <td>{{ items.b7_c2b[0] || '' }}</td>
              <td>{{ items.b7_c2b[1] || '' }}</td>
              <td>{{ items.b10_c2b[0] || '' }}</td>
              <td>{{ items.b10_c2b[1] || '' }}</td>
              <td>{{ items.b13_c2b[0] || '' }}</td>
              <td>{{ items.b13_c2b[1] || '' }}</td>
              <td>{{ items.b14_c2b[0] || '' }}</td>
              <td>{{ items.b14_c2b[1] || '' }}</td>
              <td>{{ items.b15_c2b[0] || '' }}</td>
              <td>{{ items.b15_c2b[1] || '' }}</td>
              <td>{{ items.b16_c2b[0] || '' }}</td>
              <td>{{ items.b16_c2b[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_c.寂寞</th>
              <td>{{ items.b2_c2c[0] || '' }}</td>
              <td>{{ items.b2_c2c[1] || '' }}</td>
              <td>{{ items.b3_c2c[0] || '' }}</td>
              <td>{{ items.b3_c2c[1] || '' }}</td>
              <td>{{ items.b4_c2c[0] || '' }}</td>
              <td>{{ items.b4_c2c[1] || '' }}</td>
              <td>{{ items.b7_c2c[0] || '' }}</td>
              <td>{{ items.b7_c2c[1] || '' }}</td>
              <td>{{ items.b10_c2c[0] || '' }}</td>
              <td>{{ items.b10_c2c[1] || '' }}</td>
              <td>{{ items.b13_c2c[0] || '' }}</td>
              <td>{{ items.b13_c2c[1] || '' }}</td>
              <td>{{ items.b14_c2c[0] || '' }}</td>
              <td>{{ items.b14_c2c[1] || '' }}</td>
              <td>{{ items.b15_c2c[0] || '' }}</td>
              <td>{{ items.b15_c2c[1] || '' }}</td>
              <td>{{ items.b16_c2c[0] || '' }}</td>
              <td>{{ items.b16_c2c[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_d.無助</th>
              <td>{{ items.b2_c2d[0] || '' }}</td>
              <td>{{ items.b2_c2d[1] || '' }}</td>
              <td>{{ items.b3_c2d[0] || '' }}</td>
              <td>{{ items.b3_c2d[1] || '' }}</td>
              <td>{{ items.b4_c2d[0] || '' }}</td>
              <td>{{ items.b4_c2d[1] || '' }}</td>
              <td>{{ items.b7_c2d[0] || '' }}</td>
              <td>{{ items.b7_c2d[1] || '' }}</td>
              <td>{{ items.b10_c2d[0] || '' }}</td>
              <td>{{ items.b10_c2d[1] || '' }}</td>
              <td>{{ items.b13_c2d[0] || '' }}</td>
              <td>{{ items.b13_c2d[1] || '' }}</td>
              <td>{{ items.b14_c2d[0] || '' }}</td>
              <td>{{ items.b14_c2d[1] || '' }}</td>
              <td>{{ items.b15_c2d[0] || '' }}</td>
              <td>{{ items.b15_c2d[1] || '' }}</td>
              <td>{{ items.b16_c2d[0] || '' }}</td>
              <td>{{ items.b16_c2d[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_e.沉悶/無聊</th>
              <td>{{ items.b2_c2e[0] || '' }}</td>
              <td>{{ items.b2_c2e[1] || '' }}</td>
              <td>{{ items.b3_c2e[0] || '' }}</td>
              <td>{{ items.b3_c2e[1] || '' }}</td>
              <td>{{ items.b4_c2e[0] || '' }}</td>
              <td>{{ items.b4_c2e[1] || '' }}</td>
              <td>{{ items.b7_c2e[0] || '' }}</td>
              <td>{{ items.b7_c2e[1] || '' }}</td>
              <td>{{ items.b10_c2e[0] || '' }}</td>
              <td>{{ items.b10_c2e[1] || '' }}</td>
              <td>{{ items.b13_c2e[0] || '' }}</td>
              <td>{{ items.b13_c2e[1] || '' }}</td>
              <td>{{ items.b14_c2e[0] || '' }}</td>
              <td>{{ items.b14_c2e[1] || '' }}</td>
              <td>{{ items.b15_c2e[0] || '' }}</td>
              <td>{{ items.b15_c2e[1] || '' }}</td>
              <td>{{ items.b16_c2e[0] || '' }}</td>
              <td>{{ items.b16_c2e[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_f.其他負面情緒</th>
              <td>{{ items.b2_c2f[0] || '' }}</td>
              <td>{{ items.b2_c2f[1] || '' }}</td>
              <td>{{ items.b3_c2f[0] || '' }}</td>
              <td>{{ items.b3_c2f[1] || '' }}</td>
              <td>{{ items.b4_c2f[0] || '' }}</td>
              <td>{{ items.b4_c2f[1] || '' }}</td>
              <td>{{ items.b7_c2f[0] || '' }}</td>
              <td>{{ items.b7_c2f[1] || '' }}</td>
              <td>{{ items.b10_c2f[0] || '' }}</td>
              <td>{{ items.b10_c2f[1] || '' }}</td>
              <td>{{ items.b13_c2f[0] || '' }}</td>
              <td>{{ items.b13_c2f[1] || '' }}</td>
              <td>{{ items.b14_c2f[0] || '' }}</td>
              <td>{{ items.b14_c2f[1] || '' }}</td>
              <td>{{ items.b15_c2f[0] || '' }}</td>
              <td>{{ items.b15_c2f[1] || '' }}</td>
              <td>{{ items.b16_c2f[0] || '' }}</td>
              <td>{{ items.b16_c2f[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_g.壓力</th>
              <td>{{ items.b2_c2g[0] || '' }}</td>
              <td>{{ items.b2_c2g[1] || '' }}</td>
              <td>{{ items.b3_c2g[0] || '' }}</td>
              <td>{{ items.b3_c2g[1] || '' }}</td>
              <td>{{ items.b4_c2g[0] || '' }}</td>
              <td>{{ items.b4_c2g[1] || '' }}</td>
              <td>{{ items.b7_c2g[0] || '' }}</td>
              <td>{{ items.b7_c2g[1] || '' }}</td>
              <td>{{ items.b10_c2g[0] || '' }}</td>
              <td>{{ items.b10_c2g[1] || '' }}</td>
              <td>{{ items.b13_c2g[0] || '' }}</td>
              <td>{{ items.b13_c2g[1] || '' }}</td>
              <td>{{ items.b14_c2g[0] || '' }}</td>
              <td>{{ items.b14_c2g[1] || '' }}</td>
              <td>{{ items.b15_c2g[0] || '' }}</td>
              <td>{{ items.b15_c2g[1] || '' }}</td>
              <td>{{ items.b16_c2g[0] || '' }}</td>
              <td>{{ items.b16_c2g[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_h.擔憂/憂慮</th>
              <td>{{ items.b2_c2h[0] || '' }}</td>
              <td>{{ items.b2_c2h[1] || '' }}</td>
              <td>{{ items.b3_c2h[0] || '' }}</td>
              <td>{{ items.b3_c2h[1] || '' }}</td>
              <td>{{ items.b4_c2h[0] || '' }}</td>
              <td>{{ items.b4_c2h[1] || '' }}</td>
              <td>{{ items.b7_c2h[0] || '' }}</td>
              <td>{{ items.b7_c2h[1] || '' }}</td>
              <td>{{ items.b10_c2h[0] || '' }}</td>
              <td>{{ items.b10_c2h[1] || '' }}</td>
              <td>{{ items.b13_c2h[0] || '' }}</td>
              <td>{{ items.b13_c2h[1] || '' }}</td>
              <td>{{ items.b14_c2h[0] || '' }}</td>
              <td>{{ items.b14_c2h[1] || '' }}</td>
              <td>{{ items.b15_c2h[0] || '' }}</td>
              <td>{{ items.b15_c2h[1] || '' }}</td>
              <td>{{ items.b16_c2h[0] || '' }}</td>
              <td>{{ items.b16_c2h[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_i.緊張</th>
              <td>{{ items.b2_c2i[0] || '' }}</td>
              <td>{{ items.b2_c2i[1] || '' }}</td>
              <td>{{ items.b3_c2i[0] || '' }}</td>
              <td>{{ items.b3_c2i[1] || '' }}</td>
              <td>{{ items.b4_c2i[0] || '' }}</td>
              <td>{{ items.b4_c2i[1] || '' }}</td>
              <td>{{ items.b7_c2i[0] || '' }}</td>
              <td>{{ items.b7_c2i[1] || '' }}</td>
              <td>{{ items.b10_c2i[0] || '' }}</td>
              <td>{{ items.b10_c2i[1] || '' }}</td>
              <td>{{ items.b13_c2i[0] || '' }}</td>
              <td>{{ items.b13_c2i[1] || '' }}</td>
              <td>{{ items.b14_c2i[0] || '' }}</td>
              <td>{{ items.b14_c2i[1] || '' }}</td>
              <td>{{ items.b15_c2i[0] || '' }}</td>
              <td>{{ items.b15_c2i[1] || '' }}</td>
              <td>{{ items.b16_c2i[0] || '' }}</td>
              <td>{{ items.b16_c2i[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_j.焦慮</th>
              <td>{{ items.b2_c2j[0] || '' }}</td>
              <td>{{ items.b2_c2j[1] || '' }}</td>
              <td>{{ items.b3_c2j[0] || '' }}</td>
              <td>{{ items.b3_c2j[1] || '' }}</td>
              <td>{{ items.b4_c2j[0] || '' }}</td>
              <td>{{ items.b4_c2j[1] || '' }}</td>
              <td>{{ items.b7_c2j[0] || '' }}</td>
              <td>{{ items.b7_c2j[1] || '' }}</td>
              <td>{{ items.b10_c2j[0] || '' }}</td>
              <td>{{ items.b10_c2j[1] || '' }}</td>
              <td>{{ items.b13_c2j[0] || '' }}</td>
              <td>{{ items.b13_c2j[1] || '' }}</td>
              <td>{{ items.b14_c2j[0] || '' }}</td>
              <td>{{ items.b14_c2j[1] || '' }}</td>
              <td>{{ items.b15_c2j[0] || '' }}</td>
              <td>{{ items.b15_c2j[1] || '' }}</td>
              <td>{{ items.b16_c2j[0] || '' }}</td>
              <td>{{ items.b16_c2j[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_k.坐立不安</th>
              <td>{{ items.b2_c2k[0] || '' }}</td>
              <td>{{ items.b2_c2k[1] || '' }}</td>
              <td>{{ items.b3_c2k[0] || '' }}</td>
              <td>{{ items.b3_c2k[1] || '' }}</td>
              <td>{{ items.b4_c2k[0] || '' }}</td>
              <td>{{ items.b4_c2k[1] || '' }}</td>
              <td>{{ items.b7_c2k[0] || '' }}</td>
              <td>{{ items.b7_c2k[1] || '' }}</td>
              <td>{{ items.b10_c2k[0] || '' }}</td>
              <td>{{ items.b10_c2k[1] || '' }}</td>
              <td>{{ items.b13_c2k[0] || '' }}</td>
              <td>{{ items.b13_c2k[1] || '' }}</td>
              <td>{{ items.b14_c2k[0] || '' }}</td>
              <td>{{ items.b14_c2k[1] || '' }}</td>
              <td>{{ items.b15_c2k[0] || '' }}</td>
              <td>{{ items.b15_c2k[1] || '' }}</td>
              <td>{{ items.b16_c2k[0] || '' }}</td>
              <td>{{ items.b16_c2k[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_l.疲倦</th>
              <td>{{ items.b2_c2l[0] || '' }}</td>
              <td>{{ items.b2_c2l[1] || '' }}</td>
              <td>{{ items.b3_c2l[0] || '' }}</td>
              <td>{{ items.b3_c2l[1] || '' }}</td>
              <td>{{ items.b4_c2l[0] || '' }}</td>
              <td>{{ items.b4_c2l[1] || '' }}</td>
              <td>{{ items.b7_c2l[0] || '' }}</td>
              <td>{{ items.b7_c2l[1] || '' }}</td>
              <td>{{ items.b10_c2l[0] || '' }}</td>
              <td>{{ items.b10_c2l[1] || '' }}</td>
              <td>{{ items.b13_c2l[0] || '' }}</td>
              <td>{{ items.b13_c2l[1] || '' }}</td>
              <td>{{ items.b14_c2l[0] || '' }}</td>
              <td>{{ items.b14_c2l[1] || '' }}</td>
              <td>{{ items.b15_c2l[0] || '' }}</td>
              <td>{{ items.b15_c2l[1] || '' }}</td>
              <td>{{ items.b16_c2l[0] || '' }}</td>
              <td>{{ items.b16_c2l[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_m.其他精神壓力</th>
              <td>{{ items.b2_c2m[0] || '' }}</td>
              <td>{{ items.b2_c2m[1] || '' }}</td>
              <td>{{ items.b3_c2m[0] || '' }}</td>
              <td>{{ items.b3_c2m[1] || '' }}</td>
              <td>{{ items.b4_c2m[0] || '' }}</td>
              <td>{{ items.b4_c2m[1] || '' }}</td>
              <td>{{ items.b7_c2m[0] || '' }}</td>
              <td>{{ items.b7_c2m[1] || '' }}</td>
              <td>{{ items.b10_c2m[0] || '' }}</td>
              <td>{{ items.b10_c2m[1] || '' }}</td>
              <td>{{ items.b13_c2m[0] || '' }}</td>
              <td>{{ items.b13_c2m[1] || '' }}</td>
              <td>{{ items.b14_c2m[0] || '' }}</td>
              <td>{{ items.b14_c2m[1] || '' }}</td>
              <td>{{ items.b15_c2m[0] || '' }}</td>
              <td>{{ items.b15_c2m[1] || '' }}</td>
              <td>{{ items.b16_c2m[0] || '' }}</td>
              <td>{{ items.b16_c2m[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_n.悠閒輕鬆</th>
              <td>{{ items.b2_c2n[0] || '' }}</td>
              <td>{{ items.b2_c2n[1] || '' }}</td>
              <td>{{ items.b3_c2n[0] || '' }}</td>
              <td>{{ items.b3_c2n[1] || '' }}</td>
              <td>{{ items.b4_c2n[0] || '' }}</td>
              <td>{{ items.b4_c2n[1] || '' }}</td>
              <td>{{ items.b7_c2n[0] || '' }}</td>
              <td>{{ items.b7_c2n[1] || '' }}</td>
              <td>{{ items.b10_c2n[0] || '' }}</td>
              <td>{{ items.b10_c2n[1] || '' }}</td>
              <td>{{ items.b13_c2n[0] || '' }}</td>
              <td>{{ items.b13_c2n[1] || '' }}</td>
              <td>{{ items.b14_c2n[0] || '' }}</td>
              <td>{{ items.b14_c2n[1] || '' }}</td>
              <td>{{ items.b15_c2n[0] || '' }}</td>
              <td>{{ items.b15_c2n[1] || '' }}</td>
              <td>{{ items.b16_c2n[0] || '' }}</td>
              <td>{{ items.b16_c2n[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_o.開心/興奮</th>
              <td>{{ items.b2_c2o[0] || '' }}</td>
              <td>{{ items.b2_c2o[1] || '' }}</td>
              <td>{{ items.b3_c2o[0] || '' }}</td>
              <td>{{ items.b3_c2o[1] || '' }}</td>
              <td>{{ items.b4_c2o[0] || '' }}</td>
              <td>{{ items.b4_c2o[1] || '' }}</td>
              <td>{{ items.b7_c2o[0] || '' }}</td>
              <td>{{ items.b7_c2o[1] || '' }}</td>
              <td>{{ items.b10_c2o[0] || '' }}</td>
              <td>{{ items.b10_c2o[1] || '' }}</td>
              <td>{{ items.b13_c2o[0] || '' }}</td>
              <td>{{ items.b13_c2o[1] || '' }}</td>
              <td>{{ items.b14_c2o[0] || '' }}</td>
              <td>{{ items.b14_c2o[1] || '' }}</td>
              <td>{{ items.b15_c2o[0] || '' }}</td>
              <td>{{ items.b15_c2o[1] || '' }}</td>
              <td>{{ items.b16_c2o[0] || '' }}</td>
              <td>{{ items.b16_c2o[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c2_p.其他正面情緒</th>
              <td>{{ items.b2_c2p[0] || '' }}</td>
              <td>{{ items.b2_c2p[1] || '' }}</td>
              <td>{{ items.b3_c2p[0] || '' }}</td>
              <td>{{ items.b3_c2p[1] || '' }}</td>
              <td>{{ items.b4_c2p[0] || '' }}</td>
              <td>{{ items.b4_c2p[1] || '' }}</td>
              <td>{{ items.b7_c2p[0] || '' }}</td>
              <td>{{ items.b7_c2p[1] || '' }}</td>
              <td>{{ items.b10_c2p[0] || '' }}</td>
              <td>{{ items.b10_c2p[1] || '' }}</td>
              <td>{{ items.b13_c2p[0] || '' }}</td>
              <td>{{ items.b13_c2p[1] || '' }}</td>
              <td>{{ items.b14_c2p[0] || '' }}</td>
              <td>{{ items.b14_c2p[1] || '' }}</td>
              <td>{{ items.b15_c2p[0] || '' }}</td>
              <td>{{ items.b15_c2p[1] || '' }}</td>
              <td>{{ items.b16_c2p[0] || '' }}</td>
              <td>{{ items.b16_c2p[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c3_a.用餐</th>
              <td>{{ items.b2_c3a[0] || '' }}</td>
              <td>{{ items.b2_c3a[1] || '' }}</td>
              <td>{{ items.b3_c3a[0] || '' }}</td>
              <td>{{ items.b3_c3a[1] || '' }}</td>
              <td>{{ items.b4_c3a[0] || '' }}</td>
              <td>{{ items.b4_c3a[1] || '' }}</td>
              <td>{{ items.b7_c3a[0] || '' }}</td>
              <td>{{ items.b7_c3a[1] || '' }}</td>
              <td>{{ items.b10_c3a[0] || '' }}</td>
              <td>{{ items.b10_c3a[1] || '' }}</td>
              <td>{{ items.b13_c3a[0] || '' }}</td>
              <td>{{ items.b13_c3a[1] || '' }}</td>
              <td>{{ items.b14_c3a[0] || '' }}</td>
              <td>{{ items.b14_c3a[1] || '' }}</td>
              <td>{{ items.b15_c3a[0] || '' }}</td>
              <td>{{ items.b15_c3a[1] || '' }}</td>
              <td>{{ items.b16_c3a[0] || '' }}</td>
              <td>{{ items.b16_c3a[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c3_b.睡覺</th>
              <td>{{ items.b2_c3b[0] || '' }}</td>
              <td>{{ items.b2_c3b[1] || '' }}</td>
              <td>{{ items.b3_c3b[0] || '' }}</td>
              <td>{{ items.b3_c3b[1] || '' }}</td>
              <td>{{ items.b4_c3b[0] || '' }}</td>
              <td>{{ items.b4_c3b[1] || '' }}</td>
              <td>{{ items.b7_c3b[0] || '' }}</td>
              <td>{{ items.b7_c3b[1] || '' }}</td>
              <td>{{ items.b10_c3b[0] || '' }}</td>
              <td>{{ items.b10_c3b[1] || '' }}</td>
              <td>{{ items.b13_c3b[0] || '' }}</td>
              <td>{{ items.b13_c3b[1] || '' }}</td>
              <td>{{ items.b14_c3b[0] || '' }}</td>
              <td>{{ items.b14_c3b[1] || '' }}</td>
              <td>{{ items.b15_c3b[0] || '' }}</td>
              <td>{{ items.b15_c3b[1] || '' }}</td>
              <td>{{ items.b16_c3b[0] || '' }}</td>
              <td>{{ items.b16_c3b[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c3_c.小休</th>
              <td>{{ items.b2_c3c[0] || '' }}</td>
              <td>{{ items.b2_c3c[1] || '' }}</td>
              <td>{{ items.b3_c3c[0] || '' }}</td>
              <td>{{ items.b3_c3c[1] || '' }}</td>
              <td>{{ items.b4_c3c[0] || '' }}</td>
              <td>{{ items.b4_c3c[1] || '' }}</td>
              <td>{{ items.b7_c3c[0] || '' }}</td>
              <td>{{ items.b7_c3c[1] || '' }}</td>
              <td>{{ items.b10_c3c[0] || '' }}</td>
              <td>{{ items.b10_c3c[1] || '' }}</td>
              <td>{{ items.b13_c3c[0] || '' }}</td>
              <td>{{ items.b13_c3c[1] || '' }}</td>
              <td>{{ items.b14_c3c[0] || '' }}</td>
              <td>{{ items.b14_c3c[1] || '' }}</td>
              <td>{{ items.b15_c3c[0] || '' }}</td>
              <td>{{ items.b15_c3c[1] || '' }}</td>
              <td>{{ items.b16_c3c[0] || '' }}</td>
              <td>{{ items.b16_c3c[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c3_d.專心工作/集中注意力</th>
              <td>{{ items.b2_c3d[0] || '' }}</td>
              <td>{{ items.b2_c3d[1] || '' }}</td>
              <td>{{ items.b3_c3d[0] || '' }}</td>
              <td>{{ items.b3_c3d[1] || '' }}</td>
              <td>{{ items.b4_c3d[0] || '' }}</td>
              <td>{{ items.b4_c3d[1] || '' }}</td>
              <td>{{ items.b7_c3d[0] || '' }}</td>
              <td>{{ items.b7_c3d[1] || '' }}</td>
              <td>{{ items.b10_c3d[0] || '' }}</td>
              <td>{{ items.b10_c3d[1] || '' }}</td>
              <td>{{ items.b13_c3d[0] || '' }}</td>
              <td>{{ items.b13_c3d[1] || '' }}</td>
              <td>{{ items.b14_c3d[0] || '' }}</td>
              <td>{{ items.b14_c3d[1] || '' }}</td>
              <td>{{ items.b15_c3d[0] || '' }}</td>
              <td>{{ items.b15_c3d[1] || '' }}</td>
              <td>{{ items.b16_c3d[0] || '' }}</td>
              <td>{{ items.b16_c3d[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">c3_e.工作需要靈感</th>
              <td>{{ items.b2_c3e[0] || '' }}</td>
              <td>{{ items.b2_c3e[1] || '' }}</td>
              <td>{{ items.b3_c3e[0] || '' }}</td>
              <td>{{ items.b3_c3e[1] || '' }}</td>
              <td>{{ items.b4_c3e[0] || '' }}</td>
              <td>{{ items.b4_c3e[1] || '' }}</td>
              <td>{{ items.b7_c3e[0] || '' }}</td>
              <td>{{ items.b7_c3e[1] || '' }}</td>
              <td>{{ items.b10_c3e[0] || '' }}</td>
              <td>{{ items.b10_c3e[1] || '' }}</td>
              <td>{{ items.b13_c3e[0] || '' }}</td>
              <td>{{ items.b13_c3e[1] || '' }}</td>
              <td>{{ items.b14_c3e[0] || '' }}</td>
              <td>{{ items.b14_c3e[1] || '' }}</td>
              <td>{{ items.b15_c3e[0] || '' }}</td>
              <td>{{ items.b15_c3e[1] || '' }}</td>
              <td>{{ items.b16_c3e[0] || '' }}</td>
              <td>{{ items.b16_c3e[1] || '' }}</td>
            </tr>

            <tr>
              <th scope="row">以上都無</th>
              <td>{{ items.b2_none[0] || '' }}</td>
              <td>{{ items.b2_none[1] || '' }}</td>
              <td>{{ items.b3_none[0] || '' }}</td>
              <td>{{ items.b3_none[1] || '' }}</td>
              <td>{{ items.b4_none[0] || '' }}</td>
              <td>{{ items.b4_none[1] || '' }}</td>
              <td>{{ items.b7_none[0] || '' }}</td>
              <td>{{ items.b7_none[1] || '' }}</td>
              <td>{{ items.b10_none[0] || '' }}</td>
              <td>{{ items.b10_none[1] || '' }}</td>
              <td>{{ items.b13_none[0] || '' }}</td>
              <td>{{ items.b13_none[1] || '' }}</td>
              <td>{{ items.b14_none[0] || '' }}</td>
              <td>{{ items.b14_none[1] || '' }}</td>
              <td>{{ items.b15_none[0] || '' }}</td>
              <td>{{ items.b15_none[1] || '' }}</td>
              <td>{{ items.b16_none[0] || '' }}</td>
              <td>{{ items.b16_none[1] || '' }}</td>
            </tr>
          </tbody>
        </table>
      </CCardBody>
    </CCard>
  </div>
</template>
<script>
import { overview, get } from "../../helpers/smoker";

export default {
  name: "Overview",
  data() {
    return {
      account: "",
      startDate: "",
      endDate: "",
      query: {
        id: undefined,
      },
      isLoading: false,
      fields: [
        "B2.食 - 普通煙",
        "B3.食 - 加熱煙",
        "B4.食 - 電子煙",
        "B7.衝動 - 普通煙",
        "B10.衝動 - 加熱煙",
        "B13.衝動 - 電子煙",
        "B14.買 - 普通煙",
        "B15.買 - 加熱煙",
        "B16.買 - 電子煙",
      ],
      items: [],
    };
  },
  mounted() {
    this.query.id = this.$route.params.id;
    this.getList();
  },
  metaInfo() {
        return { 
            title: "Personal Overview Description",
        }
    },
  methods: {
    getList() {
      this.isLoading = true;
      get(this.query).then((user) => {
        this.account =
          user.term > 1 ? user.account + "-" + user.term : user.account;
        this.startDate = user.startDate;
        this.endDate = user.endDate;
      });
      overview(this.query.id)
        .then((res) => {
          this.items = res;
          this.isLoading = false;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    onCancel() {
      console.log("User cancelled the loader.");
    },
  },
};
</script>