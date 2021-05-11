<template>
    <div class="main_signin_form">
        <h2>Sign in
            <br>
            Let Saving Start //</h2>

        <form @submit.prevent="signIn">
            <label>Full Name *</label>
            <input type="text" v-model="form.name" placeholder="Enter your fullname" required/>

            <label>Email *</label>
            <input type="text" v-model="form.email"  placeholder="Enter your email" required/>

            <label>Password *</label>
            <input type="password" v-model="form.password" placeholder="Enter your password" required/>

            <br>

            <div class="terms">
                <input type="checkbox" id="b" required>  <label for="b"> By registering, you confirm you have read
                and agree to Heap's Terms of Service and <span>Privacy Statement.* </span></label>
            </div>

            <br>

            <button class="main_signup_form_execute">SignIn</button>

            <br>

        </form>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data(){
            return {
                form : {},
            }
        },
        methods : {
            signIn : function () {
                axios.post('login', this.form).then(({data}) => {
                    if(data.status == 200){
                        Vue.$toast.open({
                            message: 'Sign in was successful',
                            type: 'success',
                            position : 'bottom-left'
                            // all of other options may go here
                        });
                        window.location.href = '/dashboard';
                    }else{
                        Vue.$toast.open({
                            message: 'An error occured during sign in',
                            type: 'error',
                            position : 'bottom-left'
                            // all of other options may go here
                        });
                    }
                }, () => {
                    Vue.$toast.open({
                        message: 'An error occured during sign in',
                        type: 'error',
                        position : 'bottom-left'
                        // all of other options may go here
                    });
                })
            }
        }
    }
</script>

<style scoped>

</style>
