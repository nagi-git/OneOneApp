<template>
    <modal-component>
        <div class="modal-header pb-2">
            <h4 class="modal-title" id="exampleModalLabel">会議の詳細</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('meeting') }}">
                <input type="hidden" name="_token" v-bind:value="csrf">
                <div class="form-group mb-2">
                    <label for="title">■タイトル</label>
                    <div class="col-auto p-0 pb-1 m-0">
                        <input type="text"
                            class="form-control bg-white"
                            id="title"
                            name="title"
                            value="テスト"
                            placeholder="エムにゃんの1on1"
                        >
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row g-3">
                        <label for="meeting_date">■日時</label>
                        <div class="col-5 m-0">
                            <input id="meeting_date" class="form-control" type="date" name="meeting_date" />
                            <span id="meeting_date_selected"></span>
                        </div>
                        <div class="col-3 m-0">
                            <input id="start_time" class="form-control" type="time" name="start_time" />
                            <span id="start_time_selected"></span>
                        </div>
                        <div class="col-auto d-flex align-items-center p-0 m-0">～</div>
                        <div class="col-3 m-0">
                            <input id="end_time" class="form-control" type="time" name="end_time" />
                            <span id="end_time_selected"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="meeting_user">■参加者</label>
                    <!-- <input type="meeting_user" class="form-control bg-white" id="meeting_user" name="meeting_user" value="エムにゃん" placeholder="エムにゃん"> -->
                    <multiselect-component></multiselect-component>
                </div>
                <div class="form-group mb-2">
                    <label for="FormControlTextarea1">■MTGの内容</label>
                    <textarea class="form-control" id="agenda" name="agenda" value="たのしい1on1の時間だよ" rows="5"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="FormControlTextarea2">■その他</label>
                    <textarea class="form-control" id="other" name="other" value="五反田" rows="1"></textarea>
                </div>
                <button class="btn btn-primary m-2" type="submit">保存</button>
            </form>
        </div>
    </modal-component>
</template>

<script>
  export default {
    props:  {
      csrf: {
        type: String,
        required: true,
      }
    }
  }
</script>