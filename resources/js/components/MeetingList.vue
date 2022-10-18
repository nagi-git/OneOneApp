<template>
    <div class="container">
        <meeting-modal :addMeeting="addMeeting">
        </meeting-modal>
        <div class="accordion" id="accordion">
            <div class="col-md-12 justify-content-center">
                <meeting-detail v-for="meeting of meetings"
                    v-bind:key="meeting.id"
                    v-bind:id="meeting.id"
                    v-bind:title="meeting.title"
                    v-bind:start_date_time="meeting.start_date_time"
                    v-bind:end_date_time="meeting.end_date_time"
                    v-bind:agenda="meeting.agenda"
                    v-bind:how="meeting.how"
                    v-bind:meeting_users="meeting.meeting_users"
                >
                </meeting-detail>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import MeetingModal from './MeetingModal.vue';
import MeetingDetail from './MeetingDetail.vue';

export default {
    components: {
        MeetingModal,
        MeetingDetail
    },
    data() {
        return {
            meetings: [],
            meetingId: 0
        }
    },
    methods: {
        addMeeting(meeting) {
            this.meetings.push({
                id: meeting.id,
                title: meeting.title,
                start_date_time: meeting.start_date_time,
                end_date_time: meeting.end_date_time,
                meeting_users: meeting.meeting_users,
                agenda: meeting.agenda,
                how: meeting.how
            });
            this.meetings.sort((a, b) => {
	            return (a.start_date_time < b.start_date_time ? 1 : -1);
            });
        }
    },
    mounted() {
        axios.get('/meetings')
            .then(res => res.data.forEach(data => this.addMeeting(data)))
    }
}
</script>


<style>
</style>