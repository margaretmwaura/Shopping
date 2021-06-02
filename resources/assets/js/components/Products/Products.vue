<template class="supplier">
    <div class="ml-12 mr-12">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 large-6 mt-12">
                <h2 class="font-black text-2xl">{{ title }}</h2>
                <form @submit.prevent="create" class="border-purple-200 pt-4">
                    <label class="text-base">Name *</label>
                    <input type="text" v-model="form.name" placeholder="Enter the name" required
                           class="rounded-lg border-blue-400 mt-2"/>

                    <label class="text-base">Description *</label>
                    <textarea type="text" v-model="form.description" placeholder="Enter the description"
                              required rows="4" :maxlength="max"
                              class="rounded-lg border-blue-400 mt-2"/>
                    <p>Allowed characters are <span class="text-red-500">{{ max - form.description.length }}</span></p>

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
                <h2 class="font-black text-2xl pb-4">List of Products</h2>
                <vuetable ref="vuetable"
                          :css="css.table"
                          api-url="/api/products"
                          :fields="fields"
                          data-path="data"
                          pagination-path=""
                          @vuetable:pagination-data="onPaginationData"
                          @vuetable:load-success="loadSuccess"
                          noDataTemplate="No products yet">
                </vuetable>
                <vuetable-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
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
    import VuetablePagination from './../../../../../node_modules/vuetable-2/src/components/VuetablePagination';

    export default {
        components: {
            zingchart: zingchartVue,
            Vuetable,
            VuetablePagination,
        },
        data() {
            return {
                css: CssConfig,
                form: {
                    description : ''
                },
                dates: [],
                fields: [
                    {
                        name: 'name',
                        title: 'Full Name'
                    },
                    {
                        name: 'description_limited',
                        title: 'Description'
                    },
                    {
                        name: '__component:product_custom_actions',
                        title: 'Action',
                    },
                ],
                edit: false,
                title: "Register a product",
                buttonMessage: "Create",
                max: 250,
                allData: false,
                currentPage: 1,
            }
        },
        computed: {
            chartData() {
                return {
                    type: 'line',
                    title: {
                        text: 'Product Statistics',
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
        watch: {},
        methods: {
            create: function () {
                if (this.edit == true) {
                    this.editProduct()
                } else {
                    axios.post('/product', this.form).then(response => {
                        if (response.data.status == 201) {
                            Vue.$toast.open({
                                message: 'Product was successfully created',
                                type: 'success',
                                // all of other options may go here
                            });
                            this.form = {
                                description : ''
                            }
                            this.$refs.vuetable.refresh()

                        } else {
                            Vue.$toast.open({
                                message: 'An error occurred while creating a product',
                                type: 'error',
                                // all of other options may go here
                            });
                        }
                    }).catch(error => {
                        let errors = error.response.data.errors;
                        if (errors['name']) {
                            Vue.$toast.open({
                                message: errors['name'][0],
                                type: 'error',
                                // all of other options may go here
                            });
                        }
                        if (errors['description']) {
                            Vue.$toast.open({
                                message: errors['description'][0],
                                type: 'error',
                                // all of other options may go here
                            });
                        }

                    })
                }
            },
            getMapData: function () {
                axios.get('/api/products/map_data').then(({data}) => {
                    this.dates = data
                })
            },
            editProduct: function (e) {
                axios.post('/product/' + this.form.id, this.form).then(response => {
                    if (response.data.status == 201) {
                        Vue.$toast.open({
                            message: 'Product was successfully edited',
                            type: 'success',
                            // all of other options may go here
                        });
                        this.title = "Register a product"
                        this.buttonMessage = "Create"
                        this.form = {
                            description : ''
                        }
                        this.$refs.vuetable.refresh()
                        this.edit = false;
                    } else {
                        Vue.$toast.open({
                            message: 'An error occurred while editing a product',
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                }).catch(error => {
                    let errors = error.response.data.errors;
                    if (errors['name']) {
                        Vue.$toast.open({
                            message: errors['name'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                    if (errors['description']) {
                        Vue.$toast.open({
                            message: errors['description'][0],
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                })
            },
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            loadSuccess(data) {
                this.$refs.vuetable.$nextTick(()=>{
                    if (!this.allData) {
                        this.allData = data;
                    }
                    if (!data.data.per_page) {
                        data = this.setData(this.currentPage);
                        this.$refs.vuetable.loadSuccess(data);
                    }
                })
            },
            setData(Page) {
                let data = JSON.parse(JSON.stringify(this.allData));
                let total = data.data.data.length;
                let perPage = 5;
                let currentPage = Page;
                let lastPage = parseInt(total / perPage) + ((total % perPage) === 0 ? 0 : 1)
                let from = parseInt((currentPage - 1) * perPage) + 1;
                let to = from + perPage - 1;

                to = to > total ? total : to;
                console.log(from,to)
                let newData = this.allData.data.data.filter(function(element, index) {

                    if (index >= from-1 && index <= to-1) {
                        console.log(index,from,to)
                        return true;
                    }
                    return false;
                })
                // console.log(newData)
                // return newData;

                data.data = {
                    "total": total,
                    "per_page": perPage,
                    "current_page": currentPage,
                    "last_page": lastPage,
                    "next_page_url": "",
                    "prev_page_url": null,
                    "from": from,
                    "to": to,
                    data: newData

                }
                console.log(data)
                this.currentPage = Page;
                this.$refs.vuetable.loadSuccess(data);
                return data;
            },
            onChangePage(page) {
                this.setData(page);
            }
        },
        mounted() {
            this.getMapData();
            eventBus.$on('selected-product', (product) => {
                this.form = product
                this.edit = true
                window.scrollTo(0, 0);
                this.title = "Edit a product"
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
