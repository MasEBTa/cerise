<template>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" :style="{ backgroundColor: colorPrimary || 'rgb(227, 233, 238)' }">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img :src="baseAsset+'/'+logo" alt="Logo" class="logo"><span class="logo">{{ name }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation'">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mx-auto text-dark fw-bold">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Branda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang cerise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#carier">Karir</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <!-- <ul class="navbar-nav ms-auto"> -->
                    <!-- Authentication Links -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                name
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    logout
                                </a>
                            </div>
                        </li> -->
                <!-- </ul> -->
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        props: ['colorPrimary', 'logo', 'name', 'baseAsset'],
        mounted() {
            // console.log('Component mounted.')
        },
    }
</script>

<style scoped>
img {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
}
.logo {
    font-size: 1.3rem;
    font-weight: bold;
}
</style>