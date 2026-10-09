<template>
    <AppLayout>
       <main id="main" class="main">
          <div class="pagetitle">
             <h1>Settings</h1>
             <nav>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="">Home</a></li>
                   <li class="breadcrumb-item">Settings</li>
                </ol>
             </nav>
          </div>
          <!-- End Page Title -->
          <section class="section">
             <div class="row">
                <div class="col-lg-12">
                   <div class="card">
                      <div class="card-body">
                         <div class="row">
                            <div class="col-6 ">
                              <h5 class="card-title">Twilio Settings</h5>
                              <form @submit.prevent="updateTwilioSettings" class="needs-validation" novalidate>
                                
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      v-model="form.phone"
                                      id="phone"
                                      required
                                      />
                                    <div class="invalid-feedback">
                                      Please provide a valid phone number.
                                    </div>
                                </div>
  
                                <div class="mb-3">
                                    <label for="twilio_sid" class="form-label">Twilio SID</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      v-model="form.twilio_sid"
                                      id="twilio_sid"
                                      required
                                      />
                                    <div class="invalid-feedback">
                                      Please provide your Twilio SID.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="twilio_token" class="form-label">Twilio Token</label>
                                    <input
                                      type="password"
                                      class="form-control"
                                      v-model="form.twilio_token"
                                      id="twilio_token"
                                      required
                                      />
                                    <div class="invalid-feedback">
                                      Please provide your Twilio Token.
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                              </form>
                          </div>
                          <div class="col-6">
                            <h5 class="card-title">General Settings</h5>
                            <form @submit.prevent="updateGeneralSettings" class="needs-validation" novalidate>
                                <div class="mb-3">
                                  <label class="form-check-label">
                                    <input class="form-check-input" 
                                        type="checkbox" id="check1" 
                                         v-model="form_general.auto_reply"
                                        name="option1" value="something" :checked="form_general.auto_reply">
                                        Aut Reply
                                  </label>
                                </div>
                                <div class="mb-3">
                                    <label for="auto_reply_message" class="form-label">Auto Reply Message</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      v-model="form_general.auto_reply_message"
                                      id="auto_reply_message"
                                      required
                                      />
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                              </form>
                          </div>
                          <div class="col-6">
                            
  
                            <form @submit.prevent="sendTestSMS" class="needs-validation" novalidate>
  
                              <h5 class="card-title">Send Test SMS</h5>
                                
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">To: Phone Number <small> (e.g +1838272938)</small></label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      v-model="form_test_sms.phone_number"
                                      id="phone_number"
                                      required
                                      />
                                </div>
  
                                <div class="mb-3">
                                    <label for="test_text_to_send" class="form-label"> Message</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      v-model="form_test_sms.test_text_to_send"
                                      id="test_text_to_send"
                                      required
                                      />
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Send SMS</button>
                              </form>
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
    
    export default {
      components: {
        AppLayout,
      },
      data() {
        return {
          form: {
            twilio_sid: '',
            twilio_token: '',
            phone: '',
          },
          form_general: {
            auto_reply: false,
            auto_reply_message: '',
          },
          form_test_sms: {
            phone_number: '',
            test_text_to_send: '',
          },
          
          message: '',
          errors: [],
        };
      },
      mounted() {
        console.log(this.message);
        this.fetchTwilioSettings();
        this.fetchGeneralSettings();
      },
      methods: {
          fetchTwilioSettings() {
              axios.get('/api/admin/settings/twilio')
                  .then(response => {
                      const config = JSON.parse(response.data.config);
                      this.form.id = response.data.id;
                      this.form.twilio_sid = config.account_sid || '';
                      this.form.twilio_token = config.auth_token || '';
                      this.form.phone = config.phone_number || '';
                      
                      })
                  .catch(error => {
                       console.error('Error fetching fetchTwilioSettings: ', error);
                  });
    
          },
          updateTwilioSettings() {
            let data = {
                type: 'twilio',
                config: {
                  account_sid: this.form.twilio_sid,
                  auth_token: this.form.twilio_token,
                  phone_number: this.form.phone,
                },
            }
    
            axios
              .post(`/api/admin/settings/${this.form.id}`, data)
              .then(() => {
                this.showModal = false;
                this.isEditing = false;
                this.fetchTwilioSettings();
                alert('settings updated successfully');
              })
              .catch((error) => {
                console.error('Error updating settings:', error);
              });
          },
          fetchGeneralSettings() {
              axios.get('/api/admin/settings/general')
                  .then(response => {
                      const config = JSON.parse(response.data.config);
                      this.form_general.id = response.data.id;
                      this.form_general.auto_reply = config.auto_reply ;
                      this.form_general.auto_reply_message = config.auto_reply_message ;
                      
                      })
                  .catch(error => {
                       console.error('Error fetching fetchGeneralSettings : ', error);
                  });
    
          },
          updateGeneralSettings() {
            let data = {
                type: 'general',
                config: {
                  auto_reply: this.form_general.auto_reply,
                  auto_reply_message: this.form_general.auto_reply_message,
                },
            }
    
            axios
              .post(`/api/admin/settings/${this.form_general.id}`, data)
              .then(() => {
                this.fetchTwilioSettings();
                alert('settings updated successfully');
              })
              .catch((error) => {
                console.error('Error updating settings:', error);
              });
          },
          sendTestSMS() {
            
              axios
              .post(`/api/admin/send-test-sms`, this.form_test_sms)
              .then(() => {
                alert('sms sent successfully');
                this.form_test_sms.phone_number = ''
                this.form_test_sms.test_text_to_send = ''
              })
              .catch((error) => {
                console.error('Error updating settings:', error);
              });
          }
          
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
    margin-right: 5px;;
    }
    form {
      border: 1px solid #ddd;
      padding: 14px;
      border-radius: 9px;
      margin-top: 15px;
    }
  </style>