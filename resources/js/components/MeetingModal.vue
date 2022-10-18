<template>
    <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="postMeeting">
                    <div class="modal-header">
                        <div class="form-group col-11">
                            <input type="text" class="form-control bg-white" id="title" name="title" v-model="meetingDetail.title"
                                placeholder="会議のタイトルを追加">
                        </div>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-1 d-flex align-items-center">
                                    <i class="fa-regular fa-calendar-check me-2 ms-1"></i>
                                </div>
                                <div class="col-4 pe-1">
                                    <input id="date" class="form-control" type="date" name="date"
                                        v-model="meetingDetail.date"/>
                                    <span id="date_selected"></span>
                                </div>
                                <div class="col-3 pe-0">
                                    <input id="start_time" class="form-control" type="time" name="start_time"
                                        v-model="meetingDetail.start_time" />
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
                            <div class="row">
                                <div class="col-1 d-flex align-items-center">
                                    <i class="fa-solid fa-user-group me-2 ms-1"></i>
                                </div>
                                <div class="col-11">
                                    <multi-select
                                        :users="users"
                                        @onSelectUsers="onSelectUsers"
                                        :meeting_users="meetingDetail.meeting_users"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-1 d-flex align-items-center">
                                    <i class="fa-solid fa-location-dot me-2 ms-1"></i>
                                </div>
                                <div class="col-11">
                                    <textarea class="form-control" id="how" name="how" rows="1" v-model="meetingDetail.how"
                                        placeholder="場所またはURL"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-1 mt-2">
                                    <i class="fa-regular fa-file-lines me-2 ms-1"></i>
                                </div>
                                <div class="col-11">
                                    <textarea class="form-control"
                                        id="agenda"
                                        name="agenda"
                                        rows="5"
                                        v-model="meetingDetail.agenda"
                                        placeholder="会議の説明"
                                    >
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary m-1"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            type="submit"
                        >
                            保存
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Multiselect from './com/Multiselect.vue';

export default {
    props: ['addMeeting', 'onClose'],
    data() {
        return {
            meetingDetail: {
                title: '',
                date: '',
                start_time: '',
                end_time: '',
                meeting_users: [],
                agenda: '',
                how: ''
            },
            users: [],
        }
    },
    components: {
        Multiselect
    },
    methods: {
        postMeeting() {
            axios.post('/meeting',{
                ...this.meetingDetail,
                meeting_users: this.meetingDetail.meeting_users.map(meeting_user => meeting_user.id),
                start_date_time: `${this.meetingDetail.date} ${this.meetingDetail.start_time}`,
                end_date_time: `${this.meetingDetail.date} ${this.meetingDetail.end_time}`,
            }).then(res => {
                this.addMeeting(res.data)
            })
            .then(
                this.clearMeeting()
            )
        },
        clearMeeting() {
            this.meetingDetail.title = '';
            this.meetingDetail.date = '';
            this.meetingDetail.start_time = '';
            this.meetingDetail.end_time = '';
            this.meetingDetail.meeting_users = [];
            this.meetingDetail.agenda = '';
            this.meetingDetail.how = '';
        },
        onSelectUsers(selectedUsers) {
            this.meetingDetail.meeting_users = selectedUsers
        }
    },
    mounted() {
        axios.get('/users')
            .then(res => this.users = res.data);
    }
}
</script>