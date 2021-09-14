<template>
    <div class="widget widget-three">
        <div class="widget-heading mb-4">
            <h5 class="">Summary</h5>
        </div>
        <div class="widget-content">
            <div class="order-summary">
                <div class="summary-list"
                     v-for="(candidate, k) in candidates"
                     :key="k">
                    <div class="w-icon">
                        <img :src="candidate.profile_pic">
                    </div>
                    <div class="w-summary-details">
                        <div class="w-summary-info">
                            <h6>{{ candidate.name }}</h6>
                            <p class="summary-count">{{ candidate.vote_count }}</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-secondary"
                                     role="progressbar"
                                     :style="{'width': votePercentage(candidate.vote_count)+'%'}"
                                     aria-valuenow="50" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CandidateSummaryComponent",
        props: {
            poll_id: {
                required: true,
            }
        },
        data: function () {
            return {
                candidates: [],
                show_spinner: false
            }
        },
        computed: {
            totalVotes: function () {
                return this.candidates.reduce(function (total, c) {
                    return total + c.vote_count;
                }, 0);
            },
        },
        beforeMount: function () {
            this.fetchCandidates();
        },
        methods: {
            fetchCandidates: function () {
                if (!this.show_spinner) {
                    this.show_spinner = true;

                    axios
                        .get(`/api/polls/${this.poll_id}/candidates`, {
                            params: {
                                sort: 'votes'
                            }
                        })
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
            votePercentage: function (vote_count) {
                return vote_count/this.totalVotes * 100;
            }
        }
    }
</script>

<style scoped>

</style>