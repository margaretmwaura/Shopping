<template>
    <div class="main_signup_form">
        <h2>Create Your
            <br>
            Account</h2>

        <form>
            <label>Full Name *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <label>Email *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <label>Password *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <label>Repeat password *</label>
            <input type="text" name="firstname" value="firstname" required/>

            <button class="main_signup_form_execute">SignUp</button>

            <br>

            <div class="terms">
                <input type="checkbox" id="b" required>  <label for="b"> By registering, you confirm you have read
                and agree to Heap's Terms of Service and <span>Privacy Statement.* </span></label>
            </div>

        </form>

    </div>
</template>

<script>
    export default {
        name: "SignupForm"
    }
</script>

<style scoped>

</style>
