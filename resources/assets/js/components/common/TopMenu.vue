<template>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!--<button type="button" data-toggle="collapse" data-target="#app-navbar-collapse"></button>-->
                <router-link to="/" class="navbar-brand" exact>Vue-SPA</router-link>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <router-link to="/about" tag="li">
                        <a>about</a>
                    </router-link>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {

    }
</script>
