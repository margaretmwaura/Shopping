<template>
    <div>
        <div id="view" :class="{'collapsed' : collapsed}" class="bg-gray-50" >
            <div class="relative h-16 bg-white shadow-lg">
                <img :src="`./../../../images/profile.svg`" class="absolute bottom-2 right-12 w-10 h-10">
                <div class="absolute bottom-1 right-0 w-10 h-10" v-on:click="showLogoutIcon"><i class="fa fa-caret-down"></i></div>
            </div>
            <div class="absolute top-20 right-5 h-20 w-24 z-50 bg-white shadow-lg flex items-stretch" v-show="showLogout">
                <p class="font-normal text-base self-center pl-4" v-on:click="logOut">Log out</p>
            </div>
            <router-view>
            </router-view>
        </div>
        <sidebar-menu
            class="sidebar"
            :menu="menu"
            :collapsed="collapsed"
            @item-click="onItemClick"
            @toggle-collapse="onCollapse"
        />
    </div>
</template>

<script>
    import {SidebarMenu} from 'vue-sidebar-menu'

    export default {
        components: {
            SidebarMenu
        },
        data() {
            return {
                menu: [
                    {
                        header: true,
                        title: 'Dashboard',
                        hiddenOnCollapse: true
                    },
                    {
                        href: '/dashboard',
                        title: 'Overview',
                        icon: 'fa fa-chart-pie'
                    },
                    {
                        href: '/suppliers',
                        title: 'Suppliers',
                        icon: 'fa fa-user'
                    },
                    {
                        href: '/products',
                        title: 'Products',
                        icon: 'fa fa-chart-area',
                    }
                ],
                collapsed: true,
                showLogout : false
            }
        },
        methods: {
            onItemClick(e, i) {
            },
            onCollapse(c) {
                this.collapsed = c;
            },
            showLogoutIcon(){
               if(this.showLogout === false){
                   this.showLogout = true
               }else {
                   this.showLogout = false
               }
            },
            logOut(){
                axios.post('logout', this.form).then(({data}) => {
                    if (data.status == 200) {
                        Vue.$toast.open({
                            message: 'Logging out',
                            type: 'success',
                            // all of other options may go here
                        });
                        window.location.href = '/';

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
</script>

<style scoped lang="scss">
    #view {
        padding-left: 350px;
    }
    #view.collapsed {
        padding-left: 50px;
    }
</style>
