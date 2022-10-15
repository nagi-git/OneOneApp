<template>
    <div class="accordion-item">
        <h2 class="accordion-header" :id="'heading' + id">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + id"
                aria-expanded="false" :aria-controls="'collapse' + id">
                <h5 class="mb-0 col-3">{{ title }}</h5>
                <p class="h6 m-0 col-2">{{ date }}</p>
                <p class="h6 m-0 col-2">{{ start_time }}～{{ end_time }}</p>
                <i class="fa-solid fa-user-group"></i>
                <span v-for:="user of users" class="d-inline badge bg-warning text-dark auto ms-2">
                    {{ user.name }}
                </span>
            </button>
        </h2>
        <div :id="'collapse' + id" class="accordion-collapse collapse"
            :aria-labelledby="'heading' + id">
            <div class="accordion-body">
                <div class="agenda mb-2">
                    <div class="d-inline mb-2">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                    <div class="d-inline h6 ms-2 mt-1">
                        {{ agenda }}
                    </div>
                </div>
                <div class="how mb-2">
                    <div class="d-inline mb-2">
                        <i class="fa-solid fa-location-dot me-2"></i>
                    </div>
                    <div class="d-inline mb-2">
                        {{ how }}
                    </div>
                </div>
                <div class="minute mb-2">
                    <div class="d-inline mb-2">
                        <i class="fa-regular fa-pen-to-square me-2"></i>
                    </div>
                    <div class="d-inline mb-2">
                        {{ minute }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id', 'title', 'date', 'agenda', 'how', 'start_time', 'end_time', 'users'],
}
</script>