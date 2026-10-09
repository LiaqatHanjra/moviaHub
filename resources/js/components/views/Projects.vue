<template>
  <AppLayout>
     <main id="main" class="main">
        <!-- End Page Title -->
        <section class="section">
           <div class="row">
              <div class="col-lg-12">
                 <div class="card">
                    <div class="card-body">
                       <div class="col-10">
                          <h5 class="card-title"></h5>
                          <!-- <button class="btn btn-primary" @click="showModal = true">Add Product</button> -->
                          <button class="btn btn-primary" @click="openAddProductModal">New Project</button>

                          <AlertMessage v-if="alertMessage" :message="alertMessage" :type="alertType" @close="clearAlertMessage" />

                          <table class="table table-bordered">
                             <thead>
                                <tr>
                                   <th>Project</th>
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
                                         <img :src="getImageUrl(image)" alt="Product Image" style="width: 50px; height: auto;">
                                      </div>
                                   </td>
                                   <td>
                                      <button @click="editProduct(product)" class="btn btn-warning btn-sm">Edit</button>
                                      <button @click="deleteProduct(product.id)" class="btn btn-danger btn-sm">
                                      Delete
                                      </button>
                                      <!-- <button @click="openModal(product.id)"  class="btn btn-info btn-sm">Add Inventory</button> -->
                                   </td>
                                </tr>
                             </tbody>
                          </table>

                          <div v-if="showModalInventory" class="modal fade show d-block" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Select Inventory</h5>
                                    <button type="button" class="close" @click="showModalInventory = false" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div v-for="inventory in allInventories" :key="inventory.id">
                                      <div class="form-check">
                                        <input
                                          class="form-check-input"
                                          type="checkbox"
                                          :value="inventory.id"
                                          v-model="selectedInventories"
                                          id="inventory-checkbox-{{ inventory.id }}">
                                        <label class="form-check-label" :for="'inventory-checkbox-' + inventory.id">
                                          {{ inventory.name }}
                                        </label>
                                      </div>
                                    </div>
                                    <br>
                                    <button  class="btn btn-info btn-sm" @click="linkInventories">Save</button>
                                    <button  class="btn btn-secondary btn-sm" @click="closeModal">Close</button>
                                  </div>
                              </div>
                            </div>
                        </div>

                          <!-- Modal Window -->
                          <div v-if="showModal" class="modal fade show d-block" tabindex="-1" role="dialog">
                             <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h5>{{ isEditing ? 'Edit Product' : 'Add Product' }}</h5>
                                      <button type="button" class="close" @click="showModal = false" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                   </div>
                                   <div class="modal-body">
                                    <form @submit.prevent="isEditing ? updateProduct() : addProduct()">

                                         <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" v-model="product.name" class="form-control" id="name" placeholder="Enter name" required>
                                         </div>
                                         <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" v-model="product.price" class="form-control" id="price" placeholder="Enter price" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="size">Size</label>
                                                <input type="text" v-model="product.size" class="form-control" id="size" placeholder="Enter size" required>
                                            </div>
                                          </div>
                                         </div>

                                         <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" v-model="product.description" rows="4"></textarea>
                                         </div>

                                        <div class="form-group">
                                          <label for="image">Image</label>
                                          <input type="file"
                                                multiple
                                                @change="handleImageUpload"
                                                class="form-control"
                                                id="image"
                                                :required="!isEditing && !product.images.length">
                                        </div>
                                        <div v-if="isEditing && product.images.length" class="form-group">
                                          <label>Existing Images</label>
                                          <div v-for="(image, index) in product.images" :key="index">
                                            <img :src="getImageUrl(image)" alt="Product Image" style="width: 50px; margin-right: 5px; height: auto;">
                                            <button type="button" @click="removeImage(index)" class="btn btn-danger btn-sm">Remove</button>
                                          </div>
                                        </div>
                                        <button type="submit" :disabled="isLoading"  class="btn btn-primary">
                                          {{ isEditing ? 'Update Product' : 'Save Product' }}
                                            <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </button>
                                      </form>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
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
<style scoped>
  .table {
  width: 100%;
  margin-top: 20px;
  }
  th, td {
  padding: 10px;
  text-align: left;
  }
  .modal {
  display: block;
  background: rgba(0, 0, 0, 0.5);
  }
  .modal-dialog {
  margin: 10% auto;
  }
  .modal-content {
  padding: 20px;
  }
  .close {
  background: none;
  border: none;
  font-size: 24px;
  }
  .form-group {
  margin-bottom: 20px;
  }
  .btn {
    margin-right: 5px;
  }
</style>
