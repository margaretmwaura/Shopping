<template>
    <div class="p-12">
        <div class="main_signup">
            <div class="main_signup_leading_text">
                <p><b>01</b> Try heap for free </p>
                <div class="main_signup_vertical"></div>
            </div>
            <div class="main_signup_heading_text">
                <h5>The New Standard in Product Analytics being adopted in hops around Nairobi CBD</h5>

                <p>All of your customer data captured — automatically —
                    and the tools to turn that data into action. No credit card, tracking code, maintenance,
                    or engineering required. Create your account to get started.</p>

                <p class="list_items"><span> 01 </span>   Unlock better insights with a complete, organized data
                    foundation </p>
                <p class="list_items"><span> 02 </span>   Identify and fix the sticky and broken parts of your user
                    journeys </p>
                <p class="list_items"><span> 03 </span>   Improve market agility with faster insights in minutes, not
                    months </p>
                <p class="list_items"><span> 04 </span>   Surface new opportunities to improve conversion and retention
                </p>

                <p  class="signin_link">You already had an account 😲 ? <span v-on:click="changing" class="main_link"><u>Signin</u></span></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Signup",
        methods: {
            changing() {
                this.$store.commit('SET_APPLICATION_THEME');
            }
        }
    }
</script>

<style scoped>

</style>
