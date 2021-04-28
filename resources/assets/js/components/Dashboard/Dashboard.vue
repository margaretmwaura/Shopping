<template>
    <div>
        <div id="view" :class="{'collapsed' : collapsed}">
            <router-view/>
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
                        title: 'Main Navigation',
                        hiddenOnCollapse: true
                    },
                    {
                        href: '/dashboard',
                        title: 'Overview',
                        icon: 'fa fa-user'
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
            }
        },
        methods: {
            onItemClick(e, i) {
            },
            onCollapse(c) {
                this.collapsed = c;
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
