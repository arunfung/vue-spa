<template>
    <form class="form-horizontal" @submit.prevent="login" >
        <div class="form-group" :class="{ 'has-error' : errors.has('email') }">
            <label for="email" class="col-md-3 control-label">E-Mail</label>

            <div class="col-md-7">
                <input v-model="email"
                       v-validate="{ required: true, email: true, regex: /[a-z]/ }"
                       data-vv-as="邮箱"
                       id="email" type="email" class="form-control" name="email" value="" required>
                <span class="help-block" v-show="errors.has('email')">{{ errors.first('email') }}</span>
            </div>
        </div>

        <div class="form-group" :class="{ 'has-error' : errors.has('password') }">
            <label for="password" class="col-md-3 control-label">Password</label>

            <div class="col-md-7">
                <input v-model="password"
                       v-validate="{ required: true, min: 6 }"
                       data-vv-as="密码"
                       id="password" type="password" class="form-control" name="password" required>
                <span class="help-block" v-show="errors.has('password')">{{ errors.first('password') }}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    login
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                email:'',
                password:''
            }
        },
        methods:{
            login:function(){
                let formData = {
                    email: this.email,
                    password: this.password
                };
                this.$store.dispatch('loginRequest', formData).then(response => {
                    this.$router.push({name:'profile'})
                })

            }
        }
    }
</script>

<style scoped>

</style>
