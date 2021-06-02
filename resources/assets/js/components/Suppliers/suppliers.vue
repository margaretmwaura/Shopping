<template class="supplier">
    <div class="ml-12 mr-12">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 large-6 mt-12">
                <h2 class="font-black text-2xl">{{ title }}</h2>
                <form @submit.prevent="create" class="border-purple-200 pt-4">
                    <label class="text-base">Location *</label>
                    <input type="text" v-model="form.location" placeholder="Enter the location" required
                           class="rounded-lg border-blue-400 mt-2"/>

                    <label class="text-base">Phone Number *</label>
                    <vue-tel-input v-model="form.phone_number"/>

                    <label class="text-base mt-2">User *</label>
                    <select v-model="selectedUser" required
                            class="rounded-lg border-blue-400 mt-2 pl-2">
                        <option v-for="user in users" v-bind:value="user.id">
                            {{ user.name }}
                        </option>
                    </select>

                    <div class="terms">
                        <input type="checkbox" id="b" required>
                        <label for="b"> By registering, you confirm you have read
                            and agree to Heap's Terms of Service and <span>Privacy Statement.* </span></label>
                    </div>

                    <br>

                    <button class="main_signup_form_execute">{{buttonMessage}}</button>

                </form>
            </div>
            <div class="cell small-12 medium-6 large-6 mt-12 ">
                <zingchart :data="chartData"></zingchart>
            </div>
        </div>
        <div class="grid-x pt-6 mb-12">
            <div class="cell small-12 medium-12 large-12">
                <h2 class="font-black text-2xl pb-4">List of suppliers</h2>
                <vuetable ref="vuetable"
                          :css="css.table"
                          api-url="/api/suppliers"
                          :fields="fields"
                          data-path="data"
                          pagination-path=""
                          noDataTemplate="No transfers scheduled yet">
                </vuetable>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import 'zingchart/es6';
    import zingchartVue from 'zingchart-vue';
    import Vuetable from './../../../../../node_modules/vuetable-2/src/components/Vuetable';
    import CssConfig from "./../../VuetableConfig";
    import eventBus from "../../eventBus";

    export default {
        components: {
            zingchart: zingchartVue,
            Vuetable
        },
        data() {
            return {
                css: CssConfig,
                form: {},
                users: [],
                dates: [],
                selectedUser: null,
                fields: [
                    {
                        name: 'name',
                        title: 'Full Name'
                    },
                    {
                        name: 'email',
                        title: 'Email Address'
                    },
                    {
                        name: 'location',
                        title: 'Location'
                    },
                    {
                        name: 'phone_number',
                        title: 'Telephone Number'
                    },
                    {
                        name: '__component:custom_actions',
                        title: 'Action',
                    },
                ],
                edit: false,
                title: "Register a supplier",
                buttonMessage : "Create"
            }
        },
        computed: {
            chartData() {
                return {
                    type: 'bar',
                    title: {
                        text: 'Supplier Signup Statistics',
                        fontSize: 24,
                    },
                    legend: {
                        draggable: true,
                    },
                    scaleX: {
                        // set scale label
                        values: "0:31:1",
                        label: {
                            text: 'Days of the month'
                        },
                    },
                    scaleY: {
                        // scale label with unicode character
                        values: "0:10:1",
                        label: {
                            text: 'Count'
                        }
                    },
                    plot: {
                        // animation docs here:
                        // https://www.zingchart.com/docs/tutorials/design-and-styling/chart-animation/#animation__effect
                        animation: {
                            effect: 'ANIMATION_EXPAND_BOTTOM',
                            method: 'ANIMATION_STRONG_EASE_OUT',
                            sequence: 'ANIMATION_BY_NODE',
                            speed: 275,
                        }
                    },
                    series: [
                        {
                            values: this.dates,
                            'line-color': "#3366ff",
                            'background-color': "#3366ff"
                        },
                    ]
                }

            }
        },
        watch: {
            selectedUser: function () {
                console.log(this.selectedUser)
            },
        },
        methods: {
            create: function () {
                this.form.user_id = this.selectedUser
                console.log(this.edit)
                if (this.edit == true) {
                    this.editSupplier()
                } else {
                    axios.post('/supplier', this.form).then(response => {
                        if (response.data.status == 201) {
                            Vue.$toast.open({
                                message: 'Supplier was successfully created',
                                type: 'success',
                                // all of other options may go here
                            });
                            this.form = {}
                            this.selectedUser = null
                            this.getMapData();
                            this.$refs.vuetable.refresh()

                        } else {
                            Vue.$toast.open({
                                message: 'An error occurred while creating a supplier',
                                type: 'error',
                                // all of other options may go here
                            });
                        }
                    }).catch(error => {
                        let errors = error.response.data.errors;
                        if(errors['user_id']){
                            Vue.$toast.open({
                            message: errors['user_id'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                        if(errors['phone_number']){
                            Vue.$toast.open({
                            message: errors['phone_number'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                        if(errors['location']){
                            Vue.$toast.open({
                            message: errors['location'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                      
                    })
                }
            },
            getUsers: function () {
                let placeHolderUser = {}
                placeHolderUser.name = "Select a user"
                placeHolderUser.id = null
                axios.get('/api/users').then(({data}) => {
                    this.users = data.users;
                    this.users.unshift(placeHolderUser)
                })
            },
            getMapData: function () {
                axios.get('/api/suppliers/map_data', this.form).then(({data}) => {
                    this.dates = data
                })
            },
            editSupplier: function (e) {
                axios.post('/supplier/' + this.form.id, this.form).then(response => {
                    if (response.data.status == 201) {
                        Vue.$toast.open({
                            message: 'Supplier was successfully edited',
                            type: 'success',
                            // all of other options may go here
                        });
                        this.title = "Register a supplier"
                        this.buttonMessage = "Create"
                        this.form = {}
                        this.selectedUser = null
                        this.$refs.vuetable.refresh()
                    } else {
                        Vue.$toast.open({
                            message: 'An error occurred while editing a supplier',
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                }).catch(error => {
                        let errors = error.response.data.errors;
                        if(errors['user_id']){
                            Vue.$toast.open({
                            message: errors['user_id'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                        if(errors['phone_number']){
                            Vue.$toast.open({
                            message: errors['phone_number'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                        if(errors['location']){
                            Vue.$toast.open({
                            message: errors['location'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                        }
                      
                })
            }
        },
        mounted() {
            this.getUsers();
            this.getMapData();
            eventBus.$on('selected-supplier', (supplier) => {
                this.form = supplier
                this.edit = true
                this.selectedUser = supplier.user_id
                window.scrollTo(0, 0);
                this.title = "Edit a supplier"
                this.buttonMessage = "Edit"
            });
            eventBus.$on('reload-page', () => {
                this.$refs.vuetable.refresh()
                this.getMapData()
            })
        },
    }
</script>

<style scoped lang="scss">
    .terms {
        display: block;
        margin-top: 20px;
        padding-right: 20px;

        label {
            display: inline;
            font-weight: normal;
            font-size: 14px;
        }

        input[type=checkbox] {
            display: inline;
        }

        span {
            color: #b83280;
        }
    }

</style>
