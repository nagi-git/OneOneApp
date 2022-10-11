
<template>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <h4 class="mb-0 col-4">{{ title }}</h4>
                <p class="h6 m-0 col-2">{{ date }}</p>
                <p class="h6 m-0 col-2">10:00～11:00</p>
                <span class="d-inline badge bg-warning text-dark auto ms-2">てすとなぎさ</span>
                <span class="d-inline badge bg-warning text-dark auto ms-2">牧野さん</span>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show"
            aria-labelledby="headingOne">
            <div class="accordion-body">
                <div class="row">
                    <div class="agenda">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <label for="agenda">
                            予定の説明
                        </label>
                        <div class="h6 ms-4 mt-1">
                            ほげほげほげほげほげ
                        </div>
                    </div>
                    <div class="minute">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <label for="minute">
                            議事録
                        </label>
                        <div class="h6 ms-4 mt-1">
                            ほげほげほげほげほげ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'date']
}
</script>