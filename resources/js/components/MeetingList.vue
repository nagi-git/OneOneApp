<template>
    <div class="container">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="col-md-12 justify-content-center">
                <meeting-detail v-for="meeting of meetings"
                    v-bind:key="meeting.id"
                    v-bind:title="meeting.title"
                    v-bind:date="meeting.date"
                >
                    <!-- <meeting-detail v-bind:row="meeting.id"></meeting-detail> -->
                </meeting-detail>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            meetings: [
                {
                    'id': "",
                    'title': "",
                    'date': "",
                    'start_time': "",
                    'end_time': "",
                    'meeting_user': "",
                    'agenda': "",
                    'how': "",
                },
            ],
        }
    },
    mounted() {
        axios.get('/meetings')
            .then(res => this.meetings = res.data)
    }
}
</script>


<style>
</style>