<template>
  <div>
    <div class="container">
      <table class="table table-bordered data-table" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- .detil-galery -->
    <detil-fiture
      :fitures="dataFitur"
      :base-asset="baseAsset"
    ></detil-fiture>
    <!-- ./detil-galery -->
  </div>
</template>

<script>
import axios from 'axios';
import $ from 'jquery';

export default {
  props: ['baseAsset', 'datas', 'csrfToken'],
  data() {
    return {
      columns: [
        { data: 'DT_RowIndex', searchable: false, sortable: true },
        { data: 'title' },
        { data: 'description' },
        { data: 'action', searchable: false, sortable: false }
      ],
      dataTable: null,
      data: [],
      dataFitur: []
    };
  },
  methods: {
    datatable() {
      this.dataTable = $('#table').DataTable({
        data: this.datas.data,
        columns: this.columns,
        dom: 'lfrt'
      });
    },
    naikkan(param) {
      axios
        .put('/galery/naik', {
          urutan: param
        }, {
          headers: {
            'X-CSRF-TOKEN': this.csrfToken,
            'Accept': 'application/json'
          }
        })
        .then(response => {
          window.location.reload();
        })
        .catch(error => {
          console.error(error);
        });
    },
    turunkan(param) {
      axios
        .put('/galery/turun', {
          urutan: param
        }, {
          headers: {
            'X-CSRF-TOKEN': this.csrfToken,
            'Accept': 'application/json'
          }
        })
        .then(response => {
          window.location.reload();
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
  mounted() {
    this.datatable();
    let naik = this.naikkan;
    let turun = this.turunkan;
    $('tbody', this.$refs.table).on('click', '.naik', function () {
      let urutan = $(this).attr('data-urutan');
      naik(urutan);
      $(this).addClass('disabled');
    });
    $('tbody', this.$refs.table).on('click', '.turun', function () {
      let urutan = $(this).attr('data-urutan');
      turun(urutan);
      $(this).addClass('disabled');
    });
  }
};
</script>
