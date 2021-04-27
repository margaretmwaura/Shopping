<template>
    <sidebar-menu :menu="menu">
    </sidebar-menu>
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
                        title: 'Main Navigation',
                        hiddenOnCollapse: true
                    },
                    {
                        href: '/',
                        title: 'Dashboard',
                        icon: 'fa fa-user'
                    },
                    {
                        href: '/charts',
                        title: 'Charts',
                        icon: 'fa fa-chart-area',
                    }
                ]
            }
        }
    }
</script>

<style scoped lang="scss">

</style>
