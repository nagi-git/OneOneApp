<template>
    <modal-component>
        <div class="modal-header pb-2">
            <h4 class="modal-title" id="exampleModalLabel">会議の詳細</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form @submit.prevent="postMeeting">
                <input type="hidden" name="_token" v-bind:value="csrf" />

                <div class="form-group mb-2">
                    <label for="title">■タイトル</label>
                    <div class="col-auto p-0 pb-1 m-0">
                        <input type="text" class="form-control bg-white" id="title" name="title" v-model="meetingDetail.title"
                            placeholder="エムにゃんの1on1">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row g-3">
                        <label for="meeting_date">■日時</label>
                        <div class="col-5 m-0">
                            <input id="meeting_date" class="form-control" type="date" name="meeting_date"
                                v-model="meetingDetail.meeting_date" />
                            <span id="meeting_date_selected"></span>
                        </div>
                        <div class="col-3 m-0">
                            <input id="start_time" class="form-control" type="time" name="start_time"
                                v-model="meetingDetail.start_time" />
                            <span id="start_time_selected"></span>
                        </div>
                        <div class="col-auto d-flex align-items-center p-0 m-0">～</div>
                        <div class="col-3 m-0">
                            <input id="end_time" class="form-control" type="time" name="end_time" v-model="meetingDetail.end_time" />
                            <span id="end_time_selected"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="meeting_user">■参加者</label>
                    <Multiselect :users="users" @onSelect="onSelectUsers"/>
                </div>
                <div class="form-group mb-2">
                    <label for="agenda">■MTGの内容</label>
                    <textarea class="form-control" id="agenda" name="agenda" rows="5" v-model="meetingDetail.agenda"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="other">■その他</label>
                    <textarea class="form-control" id="other" name="other" rows="1" v-model="meetingDetail.other"></textarea>
                </div>
                <button class="btn btn-primary m-2" type="submit">保存</button>
            </form>
        </div>
    </modal-component>
</template>

<script>
import axios from 'axios';
import Multiselect from "./com/Multiselect.vue";

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
                'title': "",
                'meeting_date': "",
                'start_time': "",
                'end_time': "",
                'meeting_user': "",
                'agenda': "",
                'other': "",
            },
            "users": [],
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