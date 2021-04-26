<template>
    <div class="p-12">
        <nav class="flex items-center justify-between flex-wrap bg-teal-100">
            <div class="flex items-center flex-shrink-0 text-black ">
                <img :src="`./../../images/shopping.svg`" class="md:h-16 md:w-16 h-8 w-8 pr-3">
                <span class="font-semibold md:text-xl tracking-tight text-xs">NUFACI</span>
            </div>
            <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-black hover:border-black">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto md:text-center">
                <div class="text-sm lg:flex-grow ">
                    <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-pink-700 mr-4 md:text-base font-medium text-xs">
                        Docs
                    </a>
                    <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-pink-700 mr-4 md:text-base font-medium text-xs">
                        Examples
                    </a>
                    <a class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-pink-700 md:text-base font-medium text-xs">
                        Blog
                    </a>
                </div>
                <div>
                    <button class="inline-block text-sm px-4 py-2 leading-none border rounded-2xl text-pink-700
                        hover:text-white hover:bg-pink-700 mt-4 lg:mt-0 mr-8 rounded_button" v-on:click="signup">Sign
                        up
                    </button>
                </div>
            </div>
        </nav>
        <div class="mt-10">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5 ml-8 text-left">
                    <p class="text-6xl font-extrabold font-cursive">Ready To buy a dream ? </p>
                    <p class="leading-tight tracking-wider mt-8 md:mr-28 text-base">Shopping now is easier , by
                        shopping as at online as at offline you can buy items
                        that you want, with simple payment system NFC without complications</p>
                    <div class="w-full block mt-24">
                        <button class="inline-block text-sm px-4 py-2 leading-none border rounded-2xl text-pink-700
                          hover:text-white hover:bg-pink-700 mt-4 lg:mt-0 mr-8 rounded_button">Buy Now !
                        </button>
                        <button class="inline-block text-sm px-4 py-2 leading-none border rounded-2xl text-pink-700
                         hover:text-white hover:bg-pink-700 mt-4 lg:mt-0 mr-12 rounded_button">Policies
                        </button>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-7 ml-8">
                    <img :src="`./../../images/banner.png`" >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import router from './../approuter/router'

    export default {
        mounted() {
        },
        methods: {
            signup() {
                router.push({name: 'signup'});
            }
        }
    }
</script>

<style lang="scss">
    @import "./../../sass/mixins";
    @import "./../../sass/colors";
    .rounded_button{
        @include rounded_boxes($dark-pink)
    }
</style>
