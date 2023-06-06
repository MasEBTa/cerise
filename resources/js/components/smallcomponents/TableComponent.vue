<template>
    <table class="table table-striped">
      <thead>
        <tr>
          <th v-for="header in dataHeader" :key="header.id">{{ header }}</th>
        </tr>
      </thead>
      <tbody>
        <tr  v-for="body in dataBody" :key="body.id">
          <td v-for="data in body" :key="data.id"  v-html="data"></td>
        </tr>
      </tbody>
    </table>
</template>
  
<script>
export default {
  props: ['callback'], 
  data() {
    return {
      dataHeader: [],
      dataBody: []
    };
  },
  methods: {
    getBody () {
      let data = this.$parent.makeData();
      if (data instanceof Promise) {
        data.then(result => {
          this.dataBody = result;
          setTimeout(() => {
            this.callback();
          }, 2000);
        });
      } else {
        this.dataBody = data;
        this.callback();
      }
    },
    getHead () {
      this.dataHeader = this.$parent._data.header;
    }
  },
  mounted() {
    this.getBody();
    this.getHead();
  },
};
</script>
  