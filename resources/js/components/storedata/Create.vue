<template>
    <div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <form class="auth-register-form mt-2" @submit.prevent="saveForm">
                                    <div class="mb-1">
                                        <label for="register-username" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="register-username" v-model="form.name" aria-describedby="register-username" tabindex="1" autofocus />
                                        <span v-if="v$.form.name.$error"> {{ v$.form.name.$errors[0].$message }} </span>
                                    </div>
                                    <div class="mb-1">
                                        <label for="register-email" class="form-label">Text</label>
                                        <input type="text" class="form-control" id="register-email"  v-model="form.text" aria-describedby="register-email" tabindex="2" />
                                        <span v-if="v$.form.text.$error"> {{ v$.form.text.$errors[0].$message }} </span>
                                    </div>
                                    
                                    <button class="btn btn-primary w-100" tabindex="5">Submit</button>
                                </form>

                                <div class="divider my-1">
                                    <!-- <div class="divider-text">or</div> -->
                                </div>
                            </div>
                        </div>
                        <!-- /Register basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import useVuelidate from '@vuelidate/core'
import { required } from '@vuelidate/validators'

export default {
    setup () { return { v$: useVuelidate() } },
    data () {
        return {
            form: {
                name: '',
                text: '',
            }
        }
    },
    validations () {
        return {
            form: {
                name: { required }, // Matches this.firstName
                text: { required }, // Matches this.lastName
            }
        }
    },
    methods: {
        onSelect(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                alert('File size big')
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.image = event.target.result
                };
                reader.readAsDataURL(file);
            }
        },
        saveForm() {
           const result =  this.v$.$validate();
            if (!result) {
                alert('form Not submit');
            } else {
                let url = "api/storedata/store";
                const validData = axios.post(url, this.form);
                console.log('data', validData);
                if (validData) {
                    this.$router.push({name:'index'});
                } else {
                    alert('data not save');
                }
            }
        }
    },
}
</script>
<style>
    
</style>

