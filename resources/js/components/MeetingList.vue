<template>
    <h3 class="d-inline me-4">会議一覧</h3>
    <button
        type="button"
        class="btn btn-primary d-inline pes-1 mb-2"
        data-bs-toggle="modal"
        data-bs-target="#meetingModal"
        @click="passMeetingId()"
    >
        ＋追加
    </button>
    <div class="accordion" id="accordion">
        <div class="col-md-12 justify-content-center">
            <MeetingDetail v-for="meeting of meetings"
                :key="meeting.id"
                :id="meeting.id"
                :title="meeting.title"
                :start_date_time="meeting.start_date_time"
                :end_date_time="meeting.end_date_time"
                :how="meeting.how"
                :meeting_users="meeting.meeting_users"
                :passMeetingId="passMeetingId"
            />
        </div>
    </div>
    <MeetingModal
        :addMeeting="addMeeting"
        :meeting_id="meeting_id" />
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import MeetingModal from './MeetingModal.vue';
import MeetingDetail from './MeetingDetail.vue';

export default {
    components: {
        MeetingModal,
        MeetingDetail
    },
    setup() {
      const meeting_id = ref(-1)
      return {
        meeting_id
      }
    },
    data() {
        return {
            meetings: [],
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
                how: meeting.how
            });
            this.meetings.sort((a, b) => {
	            return (a.start_date_time < b.start_date_time ? 1 : -1);
            });
        },
        passMeetingId(meeting_id) {
            this.meeting_id = meeting_id
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