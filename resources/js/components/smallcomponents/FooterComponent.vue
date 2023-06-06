<template>
    <footer class="footer bg-dark text-light pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><img class="logoImg" :src="baseAsset+'/'+logo" alt="Logo"><span class="logo">{{ name }}</span></div>
                <div class="col-md-3">
                    <h5>About Us</h5>
                    <p>{{ about }}</p>
                </div>
                <div class="col-md-3">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li v-for="contak in contact" :key="contak.id">{{ contak.name }} : {{ contak.description }}</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Follow Us</h5>
                    <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Download</h5>
                    <ul class="list-inline">
                        <li><a :href="linkPlay"><img :src="baseAsset+'/'+logoPlay" alt="Logo" class="logoPlay"></a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <p>&copy; 2023 Ms Ebta. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
  props: ['about', 'baseAsset', 'logo', 'name', 'contacts', 'linkPlay', 'logoPlay'],
  data() {
    return {
      hoverColor: null,
      contact: []
    };
  },
  created() {
    this.contact = this.contacts;
  },
};
</script>

<style scoped>
.logoImg {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
}
.logoPlay {
    width: 8rem;
    height: 3rem;
}
.logo {
    font-size: 1.3rem;
    font-weight: bold;
}
</style>