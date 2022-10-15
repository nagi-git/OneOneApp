<template>
    <modal-component>
        <div class="modal-header pb-2">
            <h4 class="modal-title" id="exampleModalLabel">会議の詳細</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form @submit.prevent="postMeeting">
                <input type="hidden" name="_token" v-bind:value="csrf" />

                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <i class="fa-regular fa-face-smile me-2 ms-1"></i>
                        </div>
                        <div class="col-11">
                            <input type="text" class="form-control bg-white" id="title" name="title" v-model="meetingDetail.title"
                                placeholder="タイトル">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <i class="fa-regular fa-calendar-check me-2 ms-1"></i>
                        </div>
                        <div class="col-4 pe-1">
                            <input id="date" class="form-control" type="date" name="date"
                                v-model="meetingDetail.date" />
                            <span id="date_selected"></span>
                        </div>
                        <div class="col-3 pe-0">
                            <input id="start_time" class="form-control" type="time" name="start_time"
                                v-model="meetingDetail.start_time" />
                            <span id="start_time_selected"></span>
                        </div>
                        <div class="col-auto d-flex align-items-center p-0 m-1">～</div>
                        <div class="col-3 p-0">
                            <input id="end_time" class="form-control" type="time" name="end_time" v-model="meetingDetail.end_time" />
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
                            <multi-select :users="users" @onSelect="onSelectUsers"/>
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
                            <textarea class="form-control" id="agenda" name="agenda" rows="5" v-model="meetingDetail.agenda"
                                placeholder="MTGの内容">
                            </textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary m-1" type="submit">保存</button>
            </form>
        </div>
    </modal-component>
</template>

<script>
import axios from 'axios';
import Multiselect from './com/Multiselect.vue';

export default {
    props: {
        csrf: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            meetingDetail: {
                'title': '',
                'date': '',
                'start_time': '',
                'end_time': '',
                'meeting_user': '',
                'agenda': '',
                'how': '',
            },
            'users': [],
        }
    },
    components: {
        Multiselect
    },
    methods: {
        postMeeting() {
            axios.post('/meeting', this.meetingDetail)
        },
        onSelectUsers(users) {
            this.meetingDetail.meeting_user = users.map(user => user.id)
        }
    },
    mounted() {
        axios.get('/users')
            .then(res => this.users = res.data)
    }
}
</script>