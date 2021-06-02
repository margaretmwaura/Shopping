<template>
    <div>

        <button @click="edit" class="fill-current text-blue-500"><i class="fas fa-edit"></i></button>
        <button @click="$refs.modalName.openModal()" class="fill-current text-red-500"><i class="fa fa-trash-alt"></i></button>

        <modal ref="modalName">
            <template v-slot:header>
                <p class="text-2xl font-bold">Delete Product.</p>
            </template>

            <template v-slot:body>
                <p class="text-base font-medium">Are you sure you want to delete this record?</p>
            </template>

            <template v-slot:footer>
                <div>
                    <button @click="$refs.modalName.closeModal()" class="bg-blue-600 text-white p-4 mr-2 rounded-lg">Cancel</button>
                    <button @click="deleteRow" class="bg-red-600 text-white p-4 rounded-lg">Delete</button>
                </div>
            </template>
        </modal>

    </div>
</template>

<script>
    import axios from 'axios';
    import eventBus from "../../../eventBus";
    import modal from "../../modal";
    export default {
        name : 'custom_actions',
        components: {
            modal
        },
        props: {
            rowData: {
                type: Object,
                required: true
            },
            rowIndex: {
                type: Number
            }
        },
        methods: {
            edit() {
                eventBus.$emit('selected-product',  this.rowData)
            },
            deleteRow(){
                axios.get('/supplier/delete/' + this.rowData.id ).then(({data}) => {
                    if (data.status == 200) {
                        Vue.$toast.open({
                            message: 'Product was successfully deleted',
                            type: 'success',
                            // all of other options may go here
                        });
                        eventBus.$emit('reload-page')
                    } else {
                        Vue.$toast.open({
                            message: 'An error occurred while deleting a product',
                            type: 'error',
                            // all of other options may go here
                        });
                    }
                }, () => {
                    Vue.$toast.open({
                        message: 'An error occurred while deleting a product',
                        type: 'error',
                        // all of other options may go here
                    });
                })
                this.$refs.modalName.closeModal();
            },
        },

    }
</script>

