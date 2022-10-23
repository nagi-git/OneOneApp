<template>
    <div class="d-flex flex-column bg-light col-3 p-0 border-end rounded-start" style="height: 500px">
        <ul class="nav nav-pills nav-flush flex-column mb-auto">
            <li class="pt-3">
                <button :class="classes.meeting"
                    @click="() => onClickMenu('meeting')">
                    <div class="d-flex align-items-start ms-3">
                        <i class="bi bi-calendar-check"></i>
                        <div class="ms-2">
                            会議
                        </div>
                    </div>
                </button>
            </li>
            <li>
                <button :class="classes.notification"
                    @click="() => onClickMenu('notification')">
                    <div class="d-flex align-items-start ms-3">
                        <i class="bi bi-bell"></i>
                        <div class="ms-2">
                            通知
                        </div>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
const menuKeys = ['meeting', 'notification']
const defaultClasses = menuKeys.reduce((prev, current) => ({
    ...prev,
    [current]: 'nav-link col-12 py-3 link-dark rounded-0'
}), {})
export default {
    props: ['menuSelect'],
    data() {
        return {
            classes: {...defaultClasses, meeting: `${defaultClasses.meeting} active`},
        }
    },
    methods: {
        onClickMenu(menuKey) {
            const classes = {...defaultClasses}
            classes[menuKey] = `${classes[menuKey]} active`
            this.classes = classes
            this.menuSelect(menuKey)
        }
    }
}
</script>


<style>
    .nav-pills .nav-link.active {
        background-color: #b2d2ff;
    }
</style>