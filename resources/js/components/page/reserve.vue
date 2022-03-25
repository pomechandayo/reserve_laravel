<template>
<form class="w-50 mx-auto mt-5 form-reserve" action="/reserve/confirm" method="get">
  <input type="hidden" name="_token" :value="csrf" />
  <input type="hidden" name="auth" :value="auth" >

  <div class="form-group">
    <label for="exampleFormControlInput1">予約人数</label>
    <select class="form-control" name="number_reservations">
      <option value="1">1名</option>
      <option value="2">2名</option>
      <option value="3">3名</option>
      <option value="4">4名</option>
      <option value="5">5名</option>
    </select>
    <span class="text-danger" v-if="this.messageNumberReservations">※{{this.messageNumberReservations}}</span>
  </div>
  <div class="form-group">
  <label for="">予約時間</label>
  <select class="form-control" name="reserve_date_time">
      <option value="10">10〜12時</option>
      <option value="12">12〜14時</option>
      <option value="14">14〜16時</option>
      <option value="16">16〜18時</option>
    </select>
  <span class="text-danger" v-if="this.messageReserveDateTime">※{{this.messageReserveDateTime}}</span>
  </div>
  <div class="form-group">
    <label for="">予約日時</label>
    <input type="date" class="form-control w-50" name="reserve_date">
    <span class="text-danger" v-if="this.messageReserveDate">※{{this.messageReserveDate}}</span>
  </div>

  <button class="btn btn-success">予約する</button>

</form>
</template>

<script>
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      messageReserveDate: "",
      messageReserveDateTime: "",
      messageNumberReservations: "",
    };
  },
  props: {
    auth:{
        type: Object|Array
      },
    errors: {
      type: Array | Object,
    },
  },
  created() {
    if (this.errors.reserve_date_time) {
      this.messageReserveDateTime = this.errors.reserve_date_time[0];
    }
    if (this.errors.reserve_date) {
      this.messageReserveDate = this.errors.reserve_date[0];
    }
    if (this.errors.number_reservations) {
      this.messageNumberReservations = this.errors.number_reservations[0];
    }
  },
};
</script>
