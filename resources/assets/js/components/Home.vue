<template>
    <div class="home m-0 pt-12 pl-12">
        <div class="grid-y">
            <div class="cell small-6 medium-2 large-2">
                <nav class="flex items-center justify-between flex-wrap bg-teal-100">
                    <div class="flex items-center flex-shrink-0 text-black ">
                        <img :src="`./../../images/shopping-cart.svg`" class="md:h-16 md:w-16 h-8 w-8 pr-3">
                        <span class="font-semibold md:text-xl tracking-tight text-xs text-white">NUFACI</span>
                    </div>
                </nav>
            </div>
            <div class="cell small-6 medium-10 large-10">
                <div class="grid-x">
                    <transition name="slide">
                        <div class="large-6 medium-6 small-12" v-if="show">
                            <signup></signup>
                        </div>
                    </transition>
                    <transition name="opposite">
                        <div class="large-6 medium-6 small-12" v-if="show">
                            <signup-form></signup-form>
                        </div>
                    </transition>
                </div>
                <div class="grid-x">
                    <transition name="slide">
                        <div class="large-6 medium-6 small-12" v-if="reveal">
                            <signing-form></signing-form>
                        </div>
                    </transition>
                    <transition name="opposite">
                        <div class="large-6 medium-6 small-12" v-if="reveal">
                            <signing>
                            </signing>
                        </div>
                    </transition>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import Signup from "./Signup/Signup";
    import SignupForm from "./Signup/SignupForm";
    import SigningForm from "./Signin/SigningForm";
    import Signing from "./Signin/Signing";
    import {mapGetters} from 'vuex';

    export default {
        name: "Home",
        computed: {
            ...mapGetters({
                show: 'show',
                reveal: 'reveal'
            })
        },
        components: {Signing, SigningForm, SignupForm, Signup},
    }
</script>

<style scoped>
</style>
