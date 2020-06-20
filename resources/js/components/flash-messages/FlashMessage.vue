<template>
    <transition name="slide" mode="out-in">
        <div class="flash-message" :class="classes" v-show="visible">
            <div class="flash-message__icon" v-if="icon !== null" v-html="icon"></div>
            <div class="flash-message__text">{{ message }}</div>
            <div class="flash-message__close" @click="onClickClose">&times;</div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            "icon": {
                type: String,
                default: null,
            },
            "level": {
                type: String,
                default: "info",
            },
            "message": {
                type: String,
                required: true,
            },
            "elevated": {
                type: Boolean,
                default: false,
            },
        },
        data: () => ({
            tag: "[flash-message]",
            visible: true,
        }),
        computed: {
            levelClass() {
                return this.level+"-message";
            },
            classes() {
                let out = this.levelClass;
                if (this.elevated) out += " shadow";
                return out;
            },
        },
        methods: {
            initialize() {
                console.log(this.tag+" initializing");
                console.log(this.tag+" icon: ", this.icon);
                console.log(this.tag+" level: ", this.level);
                console.log(this.tag+" message: ", this.message);
                this.initializeData();
            },
            initializeData() {

            },
            onClickClose() {
                this.visible = false;
            },
        },
        mounted() {
            this.initialize();
        }
    }
</script>

<style lang="scss">
    .flash-message {
        display: flex;
        padding: 15px 20px;
        border-radius: 3px;
        flex-direction: row;
        align-items: center;
        box-sizing: border-box;
        &:last-child {
            margin: 0;
        }
        &.info-message {
            color: #fff;
            background-color: #01d3e8;
        }
        &.warning-message {
            color: #fff;
            background-color: #d55706;
        }
        &.success-message {
            color: #fff;
            background-color: #00ab16;
        }
        &.danger-message {
            color: #fff;
            background-color: #d50d06;
        }
        &.shadow {
            box-shadow: 0 2px 1px -1px rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 1px 3px 0 rgba(0,0,0,.12) !important;
        }
        .flash-message__icon {
            margin: 0 15px 0 0;
        }
        .flash-message__text {
            flex: 1;
        }
        .flash-message__close {
            cursor: pointer;
            font-size: 1.2em;
            line-height: 1em;
        }
    }
</style>