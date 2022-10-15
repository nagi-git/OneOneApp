<template>
    <div class="container">
        <div class="accordion" id="accordion">
            <div class="col-md-12 justify-content-center">
                <meeting-detail v-for="meeting of meetings"
                    v-bind:key="meeting"
                    v-bind:id="meeting.id"
                    v-bind:title="meeting.title"
                    v-bind:date="meeting.date"
                    v-bind:start_time="meeting.start_time"
                    v-bind:end_time="meeting.end_time"
                    v-bind:agenda="meeting.agenda"
                    v-bind:how="meeting.how"
                    v-bind:users="meeting.users"
                >
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
            meetings: [],
            meetingId: 0
        }
    },
    methods: {
        addMeeting(meeting) {
            const formatDate = (date_time) => date_time.substring(0, 10)
            const formatTime = (date_time) => date_time.substring(11, 16)
            this.meetings.push({
                'id': meeting.id,
                'title': meeting.title,
                'date': formatDate(meeting.start_date_time),
                'start_time': formatTime(meeting.start_date_time),
                'end_time': formatTime(meeting.end_date_time),
                'meeting_user': meeting.meeting_user,
                'agenda': meeting.agenda,
                'how': meeting.how,
                'users': meeting.users,
            });
        },
    },
    mounted() {
        axios.get('/meetings')
            .then(res => res.data.forEach(data => this.addMeeting(data)))
    }
}
</script>


<style>
</style>