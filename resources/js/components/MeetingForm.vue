<template>
    <div class="col-9 pe-5 pt-4 p-3">
        <div class="row ">
            <div class="border-bottom">
                <h3 class="mb-2 ms-2">
                    会議の詳細
                </h3>
            </div>
        </div>
        <form @submit.prevent="postMeeting">
            <div class="form-group mb-3 mt-4">
                <div class="row m-0">
                    <div class="col-1 d-flex align-items-center">
                        <i class="bi bi-emoji-smile me-2 ms-1"></i>
                    </div>
                    <div class="col-11 p-0">
                        <input
                            type="text"
                            class="form-control form-control bg-white"
                            id="title"
                            name="title"
                            v-model="meetingDetail.title"
                            placeholder="タイトルを追加"
                        >
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row m-0 p-0">
                    <div class="col-1 d-flex align-items-center">
                        <i class="bi bi-calendar-check me-2 ms-1"></i>
                    </div>
                    <div class="col-4 pe-1 p-0">
                        <input id="date"
                            class="form-control"
                            type="date"
                            name="date"
                            v-model="meetingDetail.date"
                        />
                        <span id="date_selected"></span>
                    </div>
                    <div class="col-3 pe-0">
                        <input
                            id="start_time"
                            class="form-control"
                            type="time"
                            name="start_time"
                            v-model="meetingDetail.start_time"
                        />
                        <span id="start_time_selected"></span>
                    </div>
                    <div class="col-auto d-flex align-items-center p-0 m-1">～</div>
                    <div class="col-3 p-0">
                        <input
                            id="end_time"
                            class="form-control"
                            type="time"
                            name="end_time"
                            v-model="meetingDetail.end_time"
                        />
                        <span id="end_time_selected"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row m-0">
                    <div class="col-1 d-flex align-items-center">
                        <i class="bi bi-people-fill me-2 ms-1"></i>
                    </div>
                    <div class="col-11 p-0">
                        <Multiselect
                            :users="users"
                            @onSelectUsers="onSelectUsers"
                            :meeting_users="meetingDetail.meeting_users"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row m-0">
                    <div class="col-1 d-flex align-items-center">
                        <i class="bi bi-person-video3 me-2 ms-1"></i>
                    </div>
                    <div class="col-11 p-0">
                        <textarea class="form-control" id="how" name="how" rows="1" v-model="meetingDetail.how"
                            placeholder="場所またはビデオ会議を追加"></textarea>
                    </div>
                </div>
            </div>
            <div class="position-absolute bottom-0 end-0 p-3">
                <button
                    class="btn btn-primary m-1 pe-3 ps-3"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    type="submit"
                >
                    保存
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import Multiselect from './com/Multiselect.vue';

export default {
    props: ['addMeeting', 'onClose', 'meeting_id'],
    data: () => {
        return {
            meetingDetail: {
                id: '',
                title: '',
                date: '',
                start_time: '',
                end_time: '',
                meeting_users: [],
                how: ''
            },
            users: [],
        }
    },
    components: {
        Multiselect
    },
    watch: {
        meeting_id: {
            handler: function () {
                if (this.meeting_id === undefined) return
                axios.get('/meeting/' + this.meeting_id)
                    .then(res => {
                        this.meetingDetail = res.data,
                        this.meetingDetail.date = res.data.start_date_time.substring(0, 10),
                        this.meetingDetail.start_time = res.data.start_date_time.substring(11, 19),
                        this.meetingDetail.end_time = res.data.end_date_time.substring(11, 19)
                    })
            }
        },
    },
    methods: {
        postMeeting() {
            const meetingDetailForm = {
                ...this.meetingDetail,
                meeting_users: this.meetingDetail.meeting_users.map(meeting_user => meeting_user.id),
                start_date_time: `${this.meetingDetail.date} ${this.meetingDetail.start_time}`,
                end_date_time: `${this.meetingDetail.date} ${this.meetingDetail.end_time}`,
            }
            if (this.meetingDetail.id) {
                console.log(this.meetingDetail.id)
                axios.put('/meeting/' + this.meetingDetail.id, meetingDetailForm)
                .then(res => {
                    console.log(res.data)
                })
            } else {
                axios.post('/meeting', meetingDetailForm)
                .then(res => {
                    this.addMeeting(res.data)
                })
                .then(
                    this.clearMeeting()
                )
            }
        },
        clearMeeting() {
            this.meetingDetail.title = ''
            this.meetingDetail.date = ''
            this.meetingDetail.start_time = ''
            this.meetingDetail.end_time = ''
            this.meetingDetail.meeting_users = []
            this.meetingDetail.how = ''
        },
        onSelectUsers(selectedUsers) {
            this.meetingDetail.meeting_users = selectedUsers
        }
    },
    mounted() {
        axios.get('/users')
            .then(res => this.users = res.data)
    }
}
</script>