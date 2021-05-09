<template class="supplier">
    <div class="ml-12 mr-12">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 large-6 mt-12">
                <h2 class="font-black text-2xl">Register a supplier</h2>
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

                    <button class="main_signup_form_execute">Create</button>

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
    import Vuetable from 'vuetable-2';
    import CssConfig from "./../../VuetableConfig";

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
                ]
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
                        values: "0:20:1",
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
                axios.post('/supplier', this.form).then(({data}) => {
                    if (data.status == 201) {
                        Vue.$toast.open({
                            message: 'Supplier was successfully created',
                            type: 'success',
                            // all of other options may go here
                        });

                    } else {
                        Vue.$toast.open({
                            message: 'An error occurred while creating a supplier',
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                }, () => {
                    Vue.$toast.open({
                        message: 'An error occurred while creating a supplier',
                        type: 'error',
                        // all of other options may go here
                    });
                })
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
                axios.get('/api/users/map_data', this.form).then(({data}) => {
                    this.dates = data
                    // this.dates = this.dates.map(function(o,i) {
                    //     if(typeof o === 'object'){
                    //        return Object.keys(o);
                    //     }
                    // });
                })
            }
        },
        mounted() {
            this.getUsers();
            this.getMapData();
        }
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
