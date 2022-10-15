<template>
    <div class="accordion-item">
        <h2 class="accordion-header" :id="'heading' + id">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + id"
                aria-expanded="false" :aria-controls="'collapse' + id">
                <h5 class="mb-0 col-4">{{ title }}</h5>
                <p class="h6 m-0 col-2">{{ date }}</p>
                <p class="h6 m-0 col-2">{{ start_time }}～{{ end_time }}</p>
                <span class="d-inline badge bg-warning text-dark auto ms-2">てすとなぎさ</span>
                <span class="d-inline badge bg-warning text-dark auto ms-2">牧野さん</span>
            </button>
        </h2>
        <div :id="'collapse' + id" class="accordion-collapse collapse"
            :aria-labelledby="'heading' + id">
            <div class="accordion-body">
                <div class="row">
                    <div class="agenda">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <label for="agenda">
                            予定の説明
                        </label>
                        <div class="h6 ms-4 mt-1">
                            {{ agenda }}
                        </div>
                        <div class="h6 ms-4 mt-1">
                            {{ id }}
                        </div>
                    </div>
                    <div class="how">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <label for="how">
                            会議場所またはURL
                        </label>
                        <div class="h6 ms-4 mt-1">
                            {{ how }}
                        </div>
                    </div>
                    <div class="minute">
                        <i class="fa-regular fa-pen-to-square me-2"></i>
                        <label for="minute">
                            議事録
                        </label>
                        <div class="h6 ms-4 mt-1">
                            {{ minute }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props: ['id', 'title', 'date', 'agenda', 'how', 'start_time', 'end_time']
}
</script>