<template>
    <div>
        <div class="content-wrapper">
            <div class="content-header row">
                <router-link to="/create" class="btn btn-primary">Add</router-link>
            </div>
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table Basic</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
                                    can use any example of below table for your table and it can be use with any type of bootstrap tables.
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Project</th>
                                            <th>Client</th>
                                            <th>Users</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="list in storedata" :key="list.id">
                                           
                                            <td>{{ list.name }}</td>
                                            <td>{{ list.text }}</td>
                                            <td>{{ list.name }}</td>
                                            
                                            <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                                            <td>
                                                <router-link :to="{ name: 'edit-data', params: {id:list.id} }" type="button" class="btn btn-outline-primary">Edit</router-link>
                                                <button @click="deleteData(list.id)" type="button" class="btn btn-outline-secondary">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    data() {
        return {
            storedata: []
        }
    },
    methods: {
        async listData() {
            let url = 'api/storedata';
            const data = await axios.get(url);
            console.log('data', data.data);
            if (data) {
                this.storedata = data.data;
            }
        },
        async deleteData(id){
            let url = 'api/storedata/delete/'+id;
            const result = await axios.get(url);
            if (result) {
                alert('data delete')
            } else {
                alert('data not delete')   
            }
        }
       

    },
    created() {
        this.listData();
    },
}
</script>
<style>
    
</style>

