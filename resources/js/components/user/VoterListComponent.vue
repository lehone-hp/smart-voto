<template>
    <div class="row">
        <div class="col-md-8">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Voters</h4>
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="#" class="btn btn-secondary">Import</a>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <table class="table table-bordered mb-4">
                        <thead>
                        <tr>
                            <th>Voter</th>
                            <th>Voted</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <template v-if="voters.length > 0">
                            <tr v-for="(voter, k) in voters" :key="k">
                                <td>{{ voter.name }}</td>
                                <td>
                                    <span class="fa fa-check text-success" v-if="voter.voted"></span>
                                    <span class="fa fa-times text-danger" v-else></span>
                                </td>
                                <td>{{ voter.email }}</td>
                                <td class="text-center">
                                    <a href="javascript:;">
                                        <span class="fa fa-pencil-alt"></span></a>
                                </td>
                            </tr>
                        </template>
                        <tr v-else>
                            <td class="text-center" colspan="4">No Registered Voters</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <h4>Add Voter</h4>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text"
                               autocomplete="off"
                               v-model="form.name"
                               :class="{'is-invalid': errors['name']}"
                               name="name" class="form-control">
                        <span class="invalid-feedback" v-if="errors['name']">{{ errors['name'][0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email"
                               autocomplete="off"
                               v-model="form.email"
                               :class="{'is-invalid': errors['email']}"
                               class="form-control">
                        <span class="invalid-feedback" v-if="errors['email']">{{ errors['email'][0] }}</span>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary"
                                v-on:click="addVoter">Add Voter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VoterListComponent",
        props: {
            poll_id: {
                required: true,
            }
        },
        data: function () {
            return {
                voters: [],
                show_spinner: false,
                search: {
                    page: 1,
                },
                form: {
                    name: '',
                    email: ''
                },
                errors: [],
            }
        },
        beforeMount: function () {
            this.fetchVoters();
        },
        methods: {
            fetchVoters: function () {
                if (!this.show_spinner) {
                    this.show_spinner = true;

                    axios
                        .get(`/api/polls/${this.poll_id}/voters`, {
                            params: this.search
                        })
                        .then(resp => {
                            if (this.search.page === 1) {
                                this.voters = resp.data.data;
                            } else {
                                this.voters.push(resp.data.data);
                            }
                        })
                        .catch(error => {

                        })
                        .then(() => {
                            this.show_spinner = false
                        });
                }
            },
            addVoter: function() {
                if (!this.show_spinner) {
                    this.errors = [];
                    this.show_spinner = true;

                    axios
                        .post(`/api/polls/${this.poll_id}/voters`, this.form)
                        .then(resp => {
                            if (resp.data.status === 'validation_error') {
                                this.errors = resp.data.errors;
                            } else if (resp.data.status === 'success') {
                                this.voters.push(resp.data.voter);
                                this.form = {name: '', email: ''}
                            } else {
                                alert(resp.data.message)
                            }
                        })
                        .catch(error => {

                        })
                        .then(() => {
                            this.show_spinner = false
                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>