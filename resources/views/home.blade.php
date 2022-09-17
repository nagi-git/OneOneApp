@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="d-inline me-4">会議一覧</h3>
    <button type="button" class="btn btn-primary d-inline pes-1 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ＋追加
    </button>
    <!-- ボタン・リンククリック後に表示される画面の内容 -->
    <!-- <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">削除確認画面</h4>
                </div>
                <div class="modal-body">
                    <label>データを削除しますか？</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-danger">削除</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">会議の詳細</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-2">
                            <label for="mtg-date">■日時</label>
                            <input type="mtg-date" class="form-control bg-white" id="mtg-date" placeholder="2022/08/20">
                        </div>
                        <div class="form-group mb-2">
                            <label for="participant">■参加者</label>
                            <input type="participant" class="form-control bg-white" id="participant" placeholder="エムにゃん">
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleFormControlTextarea1">■MTGの内容</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                        </div>
                        <button class="btn btn-primary m-2" type="submit">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-12 justify-content-center">
        <div class="card col-md-6">
            <div class="card-body">
                <h4 class="card-title mb-0">エムにゃんの1on1</h4>
                <p class="ms-3">2022年8月27日 10:00～10:30</p>
                <h6 class="1h-sm mb-1">■参加者</h6>
                <p class="ms-3 m-0">牧野さん</p>
                <p class="ms-3 m-0">エムにゃん</p>
            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <h4 class="card-title mb-0">エムにゃんの1on1</h4>
                <p class="ms-3">2022年8月27日 10:00～10:30</p>
                <h6 class="1h-sm mb-1">■参加者</h6>
                <p class="ms-3 m-0">牧野さん</p>
                <p class="ms-3 m-0">エムにゃん</p>
            </div>
        </div>
    </div>
</div>
@endsection