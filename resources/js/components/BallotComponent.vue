<template>
    <div>
        <div class="vote-success py-5" v-if="voter && voter.voted">
            <span class="fa fa-check-circle check"></span>
            <h3>Thank you for casting your vote.</h3>
            <h6 class="text-muted">Results will be published once the voting period comes to an end.</h6>
        </div>
        <template v-else>
            <p class="text-muted pt-5"><strong>Candidates</strong></p>

            <div class="row">
                <div class="col-6 col-md-4 mb-3"
                     v-for="(candidate, k) in candidates" :key="k">
                    <a href="#"
                       v-on:click.prevent="selectCandidate(candidate)"
                       class="widget widget-card-one p-candidate"
                       :class="[ballot.filter(c => c.id === candidate.id).length ? 'selected': '']">
                        <div class="widget-content">
                            <div class="media justify-content-center mb-3">
                                <div class="w-img"><img
                                        :src="candidate.profile_pic"
                                        alt="avatar"></div>
                            </div>
                            <div class="text-center">
                                <h6 class="mb-3">{{ candidate.name }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center py-3" v-show="ballot.length">
                <span class="fa fa-spinner fa-spin mr-2" v-show="show_voting_spinner"></span>
                <button class="btn btn-primary"
                        v-on:click="castVote"
                        :disabled="show_voting_spinner">Cast Vote</button>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: "BallotComponent",
        props: {
            poll_id: {
                required: true,
            },
            token: {
                required: true,
            },
            max_vote: {
                required: true,
            }
        },
        data: function () {
            return {
                candidates: [],
                ballot: [],
                voter: null,
                show_spinner: false,
                show_voting_spinner: false,
            }
        },
        beforeMount: function () {
            this.fetchCandidates();
            this.fetchVoter();
        },
        methods: {
            fetchCandidates: function () {
                if (!this.show_spinner) {
                    this.show_spinner = true;

                    axios
                        .get(`/api/polls/${this.poll_id}/candidates`)
                        .then(resp => {
                            this.candidates = resp.data.data;
                        })
                        .catch(error => {

                        })
                        .then(() => {
                            this.show_spinner = false
                        });
                }
            },
            fetchVoter: function () {
                axios
                    .get(`/api/voters/${this.token}`)
                    .then(resp => {
                        this.voter = resp.data.data;
                        console.log(this.voter.voted)
                    });
            },
            selectCandidate: function (candidate) {
                if (this.ballot.filter(c => c.id === candidate.id).length) {
                    // candidate is in ballot
                    this.ballot = this.ballot.filter(c => c.id !== candidate.id);
                } else {
                    // candidate is not in ballot
                    if (this.ballot.length < this.max_vote) {
                        this.ballot.push(candidate);
                    } else {
                        alert('Maximum allowed vote is ' + this.max_vote);
                    }
                }
            },
            castVote: function () {
                this.show_voting_spinner = true;
                axios
                    .post(`/api/polls/${this.poll_id}/vote`, {
                        candidates: this.ballot,
                        token: this.token
                    })
                    .then(resp => {
                        if (resp.data.status === 'success') {
                            this.voter = resp.data.voter;
                        } else {
                            alert(resp.data.message)
                        }
                    })
                    .catch(error => {

                    })
                    .then(() => {
                        this.show_voting_spinner = false
                    });
            }
        }
    }
</script>

<style scoped>

</style>