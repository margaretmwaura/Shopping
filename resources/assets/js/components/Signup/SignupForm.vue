<template>
    <div class="main_signup_form">
        <h2>Create Your
            <br>
            Account</h2>

        <form @submit.prevent="signup">
            <label>Full Name *</label>
            <input type="text" v-model="form.name" placeholder="Enter your fullname" required/>

            <label>Email *</label>
            <input type="text" v-model="form.email"  placeholder="Enter your email" required/>

            <label>Password *</label>
            <input type="password" v-model="form.password" placeholder="Enter your password" required/>

            <label>Repeat password *</label>
            <input type="password" v-model="password2" placeholder="Confirm password" required/>

            <br>

            <div class="terms">
                <input type="checkbox" id="b" required>  <label for="b"> By registering, you confirm you have read
                and agree to Heap's Terms of Service and <span>Privacy Statement.* </span></label>
            </div>

            <br>

            <button class="main_signup_form_execute">SignUp</button>



        </form>

    </div>
</template>

<script>
    import axios from "axios";
    export default {
        data(){
            return {
                form : {},
                password2 : ""
            }
        },
        methods : {
            signup : function () {
                if(this.form.password !== this.password2){
                    console.log("Confirm your password")
                }else{
                    console.log("we fine hunnnny")
                }

                axios.post('register', this.form).then(({data}) => {
                    if(data.status === 200){
                        window.location.href = '/dashboard';
                    }else{
                        console.log(data);
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
