<template>
    <div class="accordion-item">
        <h2 class="accordion-header" :id="'heading' + id">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + id"
                aria-expanded="false" :aria-controls="'collapse' + id">
                <h5 class="mb-0 col-4">{{ title }}</h5>
                <p class="h6 m-0 col-2">{{ start_date_time.substring(0, 10) }}</p>
                <p class="h6 m-0 col-2">{{ start_date_time.substring(11, 16) }}～{{ end_date_time.substring(11, 16) }}</p>
                <i class="bi bi-people-fill"></i>
                <span v-for:="meeting_user of meeting_users" class="d-inline badge bg-warning text-dark auto ms-2">
                    {{ meeting_user.name }}
                </span>
            </button>
        </h2>
        <div :id="'collapse' + id" class="accordion-collapse collapse"
            :aria-labelledby="'heading' + id">
            <div class="accordion-body">
                <div class="card mb-3">
                    <div class="card-header p-1 ps-3">
                        <div class="d-inline mb-2 me-2 fw-bold">
                            会議・通知の詳細
                        </div>
                        <button
                            type="button"
                            class="btn btn-outline-success py-0 px-2 mx-1 fs-6"
                            @click="passMtgId(id)"
                        >
                            会議／通知を編集
                        </button>
                        <button type="button" class="btn btn-outline-danger py-0 px-2 mx-1 fs-6">会議を削除</button>
                    </div>
                    <div class="card-body p-0 ms-2">
                        <div class="how ms-2">
                            <div class="d-inline mb-2">
                                <i class="bi bi-person-video3 fs-5 me-2 ms-1"></i>
                                <div class="d-inline mb-2 me-2">
                                    場所またはビデオ会議：
                                </div>
                                <div class="d-inline ms-1">
                                    {{ how }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-1 ps-3">
                        <div class="d-inline mb-2 me-2 fw-bold">
                            議事録
                        </div>
                    </div>
                    <div class="card-body ms-2 me-3 p-2">
                        <div class="d-inline mb-2">
                            <textarea class="d-inline form-control col-11 mt-1 ms-2" id="how" name="how" rows="5"
                                placeholder="議事録を追加"></textarea>
                            <div class="d-grid gap-2 justify-content-md-end">
                                <button type="button" class="btn btn-primary py-1 px-2 mx-1">議事録を保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id', 'title', 'how', 'start_date_time', 'end_date_time', 'meeting_users'],
    methods: {
        passMtgId(meeting_id) {
            console.log(meeting_id)
        }
    }
}
</script>