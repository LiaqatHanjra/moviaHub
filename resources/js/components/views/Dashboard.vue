<template>
    <AppLayout>
        <main id="main" class="main">
            <!-- End Page Title -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card px-0">
                            <div class="card-body px-0">
                                <div class="d-flex justify-content-between p-0 pt-4">
                                    <h5 class=" ms-3">Projects</h5>
                                    <button class="btn btn-primary btn-sm me-3" @click="openAddProductModal">New
                                        Project</button>
                                </div>


                                <AlertMessage v-if="alertMessage" :message="alertMessage" :type="alertType"
                                    @close="clearAlertMessage" />

                                <table class="table table-secondary project_table">
                                    <thead>
                                        <tr>
                                            <th class="ps-3">Project</th>
                                            <th>Staus</th>
                                            <th>Invoiced</th>
                                            <th>Paid</th>
                                            <th>Client</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(product, index) in products" :key="index">
                                            <td>{{ product.name }}</td>
                                            <td>{{ product.size }}</td>
                                            <td>${{ product.price }}</td>
                                            <td>{{ product.description }}</td>
                                            <td>
                                                <div v-for="(image, imgIndex) in product.images" :key="imgIndex">
                                                    <img :src="getImageUrl(image)" alt="Product Image"
                                                        style="width: 50px; height: auto;">
                                                </div>
                                            </td>
                                            <td>
                                                <button @click="editProduct(product)"
                                                    class="btn btn-warning btn-sm">Edit</button>
                                                <button @click="deleteProduct(product.id)"
                                                    class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                                <!-- <button @click="openModal(product.id)"  class="btn btn-info btn-sm">Add Inventory</button> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- End #main -->
    </AppLayout>
</template>
<script>
import AppLayout from "../layouts/AppLayout.vue";
import AlertMessage from "./AlertMessage.vue";

export default {
    components: {
        AppLayout,
        AlertMessage,
    },
    data() {
        return {
            message: 'Hello from Vue.js! Dashboard',
            showModal: false,
            showModalInventory: false,
            isEditing: false,
            product: {
                name: '',
                size: '',
                price: '',
                description: '',
                images: null,
            },
            products: [],
            allInventories: [],
            selectedInventories: [],
            currentProductId: null,
            currentProductInventories: [],
            isLoading: false,
            alertMessage: '',
            alertType: 'success',
        }
    },
    mounted() {
        console.log(this.message);
        this.getProducts();
    },
    methods: {
        openAddProductModal() {
            this.resetProductForm();
            this.isEditing = false;
            this.showModal = true;
        },

        resetProductForm() {
            this.product = {
                id: null,
                name: '',
                size: '',
                price: '',
                description: '',
                images: []
            };
        },

        addProduct() {
            this.isLoading = true;
            const formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('size', this.product.size);
            formData.append('price', this.product.price);
            formData.append('description', this.product.description);
            for (let i = 0; i < this.product.files.length; i++) {
                formData.append('images[]', this.product.files[i]);
            }

            axios.post('api/products', formData, {
                headers: { 'Content-Type': 'multipart/form-data' },
            })
                .then(response => {
                    this.resetProductForm();
                    this.showModal = false;
                    this.alertMessage = 'Product saved successfully';
                    this.alertType = 'success';
                    this.getProducts();
                })
                .catch(error => {
                    console.error('Error saving product: ', error);
                    this.alertMessage = 'Error saving product';
                    this.alertType = 'danger';
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },

        editProduct(product) {
            this.product = { ...product, files: null };
            this.isEditing = true;
            this.showModal = true;
        },

        updateProduct() {
            this.isLoading = true;
            const formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('size', this.product.size);
            formData.append('price', this.product.price);
            formData.append('description', this.product.description);

            if (this.product.files) {
                for (let i = 0; i < this.product.files.length; i++) {
                    formData.append('images[]', this.product.files[i]);
                }
            }

            axios.post(`api/products/${this.product.id}/update`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then(response => {
                    this.resetProductForm();
                    this.isEditing = false;
                    this.showModal = false;
                    this.alertMessage = 'Product updated successfully';
                    this.alertType = 'success';
                    this.getProducts();
                })
                .catch(error => {
                    console.error('Error updating product: ', error);
                    this.alertMessage = 'Error updating product';
                    this.alertType = 'danger';
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
        getProducts() {
            axios.get('api/products')
                .then(response => {
                    this.products = response.data.data
                })
                .catch(error => {
                    console.error('Error fetching user subscriptions: ', error);
                });

        },
        handleImageUpload(event) {
            this.product.files = event.target.files;

        },
        removeImage(index) {
            if (confirm('Are you sure you want to remove this image?')) {
                this.product.images.splice(index, 1);
            }
        },
        deleteProduct(id) {
            axios.delete(`/api/products/${id}`)
                .then(response => {
                    this.products = this.products.filter(product => product.id !== id);
                    this.alertMessage = "Product deleted successfully.";
                    this.alertType = 'success';
                })
                .catch(error => {
                    console.error('Error fetching user subscriptions: ', error);
                    this.alertMessage = 'Error deleting product';
                    this.alertType = 'danger';
                });


            this.showModal = false;
        },
        getImageUrl(image) {
            return '/uploads/' + image.image_name;
        },
        clearAlertMessage() {
            this.alertMessage = '';
        },

    }
};
</script>
