<template>
    <div class="main_signin_form">
        <h2>Sign in
            <br>
            Let Saving Start //</h2>

        <form>
            <label>Full Name *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <label>Email *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <label>Password *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <button class="main_signup_form_execute">SignIn</button>

            <br>

            <div class="terms">
                <input type="checkbox" id="b" required>  <label for="b"> By registering, you confirm you have read
                and agree to Heap's Terms of Service and <span>Privacy Statement.* </span></label>
            </div>

        </form>

        <!--        <button class="main_signin_form_execute">Signin</button>-->
    </div>
</template>

<script>
    export default {
        name: "SigningForm"
    }
</script>

<style scoped>

</style>
