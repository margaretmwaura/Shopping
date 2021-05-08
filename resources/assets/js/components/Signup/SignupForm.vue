<template>
    <div class="main_signup_form">
        <h2>Create Your
            <br>
            Account</h2>

        <form @submit.prevent="signup">
            <label>Full Name *</label>
            <input type="text" v-model="form.name" placeholder="Enter your fullname" required/>

            <label>Email *</label>
            <input type="text" v-model="form.email" placeholder="Enter your email" required/>

            <label>Password *</label>
            <input type="password" v-model="form.password" placeholder="Enter your password" required/>

            <label>Repeat password *</label>
            <input type="password" v-model="password2" placeholder="Confirm password" required/>

            <br>

            <div class="terms">
                <input type="checkbox" id="b" required> <label for="b"> By registering, you confirm you have read
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
        data() {
            return {
                form: {},
                password2: ""
            }
        },
        methods: {
            signup: function () {
                if (this.form.password !== this.password2) {
                    Vue.$toast.open({
                        message: 'Enter the same password for comfirmation!',
                        type: 'error',
                        // all of other options may go here
                    });
                } else {
                    axios.post('register', this.form).then(({data}) => {
                        if (data.status == 200) {
                            Vue.$toast.open({
                                message: 'Sign up was successful',
                                type: 'success',
                                // all of other options may go here
                            });
                            window.location.href = '/dashboard';

                        } else {
                            Vue.$toast.open({
                                message: 'An error occured during sign up',
                                type: 'error',
                                // all of other options may go here
                            });
                        }
                    },  () => {
                        Vue.$toast.open({
                            message: 'An error occured during sign in',
                            type: 'error',
                            // all of other options may go here
                        });
                    })
                }


            }
        }
    }
</script>

<style scoped>

</style>
