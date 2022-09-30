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
                        <input type="text" class="form-control bg-white" id="title" name="title" v-model="defaultValue.title"
                            placeholder="エムにゃんの1on1">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row g-3">
                        <label for="meeting_date">■日時</label>
                        <div class="col-5 m-0">
                            <input id="meeting_date" class="form-control" type="date" name="meeting_date"
                                v-model="defaultValue.meeting_date" />
                            <span id="meeting_date_selected"></span>
                        </div>
                        <div class="col-3 m-0">
                            <input id="start_time" class="form-control" type="time" name="start_time"
                                v-model="defaultValue.start_time" />
                            <span id="start_time_selected"></span>
                        </div>
                        <div class="col-auto d-flex align-items-center p-0 m-0">～</div>
                        <div class="col-3 m-0">
                            <input id="end_time" class="form-control" type="time" name="end_time" v-model="defaultValue.end_time" />
                            <span id="end_time_selected"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="meeting_user">■参加者</label>
                    <!-- {{users}} -->
                    <!-- <input type="meeting_user" class="form-control bg-white" id="meeting_user" name="meeting_user" value="エムにゃん" placeholder="エムにゃん"> -->
                    <Multiselect :users="users"/>
                </div>
                <div class="form-group mb-2">
                    <label for="agenda">■MTGの内容</label>
                    <textarea class="form-control" id="agenda" name="agenda" rows="5" v-model="defaultValue.agenda"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="other">■その他</label>
                    <textarea class="form-control" id="other" name="other" rows="1" v-model="defaultValue.other"></textarea>
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
            defaultValue: {
                'title': "",
                'meeting_date': "",
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
            const meeting = {
                'title': this.title,
                'meeting_date': this.meeting_date,
                'meeting_date': this.meeting_date,
                'start_time': this.start_time,
                'end_time': this.end_time,
                'meeting_user': this.meeting_user,
                'agenda': this.agenda,
                'other': this.other
            };
            axios.post('/meeting', meeting)
        },
    },
    mounted() {
        axios.get('/users')
            .then(res => this.users = res.data)
        console.log('焼きそばを食べる')
    }
}
</script>