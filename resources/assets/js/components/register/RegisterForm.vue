<template>
    <form class="form-horizontal" @submit.prevent="register" >

        <div class="form-group" :class="{ 'has-error' : errors.has('name') }">
            <label for="name" class="col-md-3 control-label">Name</label>

            <div class="col-md-7">
                <input v-model="name"
                       v-validate="{ required: true, min: 4}"
                       data-vv-as="姓名"
                       id="name" type="text" class="form-control" name="name" value="" required autofocus>
                <span class="help-block" v-show="errors.has('name')">{{ errors.first('name') }}</span>
            </div>
        </div>

        <div class="form-group" :class="{ 'has-error' : errors.has('email') }">
            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

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

        <div class="form-group" :class="{ 'has-error' : errors.has('password_confirmation') }">
            <label for="password-confirmation" class="col-md-3 control-label">Confirm Password</label>

            <div class="col-md-7">
                <input id="password-confirmation"
                       data-vv-as="确认密码"
                       v-validate="{ required: true, min: 6, confirmed: 'password' }"
                       type="password" class="form-control" name="password_confirmation" required>
                <span class="help-block" v-show="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email:'',
                password:''
            }
        },
        methods:{
            register:function(){
                let formData = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }
                axios.post('/api/register', formData).then(response => {
                    this.$router.push({name:'confirm'})
                })
            }
        }
    }
</script>

<style scoped>

</style>
