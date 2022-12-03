// import { Vue } from 'vue'
// import VueRouter from 'vue-router'
import {createRouter, createWebHistory}  from 'vue-router'

// ページコンポーネントをインポートする
import MeetingModalComponent from './components/MeetingModal.vue';

// ルータをインストール
// Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
    // { path: '/home' },
    { path: '/meeting', component: MeetingModalComponent },
    { path: '/users', component: MeetingModalComponent },
]

// VueRouterインスタンスを作成する
const router = new createRouter({
    history: createWebHistory(),
    routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router