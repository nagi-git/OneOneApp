<template>
    <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-0">
                <div class="modal-body p-0" style="height: 500px">
                    <div class="row justify-content-start">
                        <button
                            type="button"
                            class="btn-close m-0 m-3 position-absolute top-0 end-0"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        <MeetingModalSidebar :menuSelect="menuSelect"></MeetingModalSidebar>
                        <MeetingForm
                            v-show="selectMenu === 'meeting'"
                            :addMeeting="addMeeting"
                            :meeting_id="meeting_id"
                        ></MeetingForm>
                        <NotificationForm
                            v-show="selectMenu === 'notification'"
                        ></NotificationForm>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from './com/Multiselect.vue';
import MeetingModalSidebar from './MeetingModalSidebar.vue';
import MeetingForm from './MeetingForm.vue';
import NotificationForm from './NotificationForm.vue';

export default {
    data() {
        return {
            selectMenu: 'meeting'
        }
    },
    props: ['addMeeting', 'meeting_id'],
    components: {
        Multiselect,
        MeetingModalSidebar,
        MeetingForm,
        NotificationForm
    },
    methods: {
        menuSelect(menu) {
            this.selectMenu = menu
        }
    }
}
</script>