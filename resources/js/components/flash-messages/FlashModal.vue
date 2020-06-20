<template>
    <transition name="fade" mode="out-in">
        <div id="flash-modal__wrapper" v-show="visible" @click="onClickOverlay">
            <div id="flash-modal">
                <div id="flash-modal__dialog" @click.stop="">
                    <div id="flash-modal__dialog-header">
                        <h4 class="modal-title">{{ title }}</h4>
                        <div class="close" @click="visible = false">&times;</div>
                    </div>
                    <div id="flash-modal__dialog-content">
                        {{ message }}
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                required: true
            },
            title: {
                type: String,
                default: 'Notice'
            },
            closeText: {
                type: String,
                default: 'Close'
            },
        },
        data: () => ({
            tag: "[flash-modal]",
            visible: false,
        }),
        methods: {
            initialize() {
                console.log(this.tag+" initializing");
                console.log(this.tag+" message: ", this.message);
                console.log(this.tag+" title: ", this.title);
                console.log(this.tag+" close text: ", this.closeText);
                this.initializeData();
            },
            initializeData() {
                this.visible = true;
            },
            onClickOverlay() {
                this.visible = false;
            },
        },
        mounted() {
            this.initialize();
        }
    }
</script>

<style lang="scss">
    #flash-modal__wrapper {
        #flash-modal {
            top: 0;
            left: 0;
            z-index: 20;
            width: 100%;
            height: 100%;
            display: flex;
            position: fixed;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            #flash-modal__dialog {
                width: 600px;
                color: #000;
                overflow: hidden;
                border-radius: 3px;
                background-color: #fff;
                #flash-modal__dialog-header {
                    display: flex;
                    flex-direction: row;
                    box-sizing: border-box;
                    align-items: flex-start;
                    padding: 20px 20px 10px 20px;
                    .modal-title {
                        flex: 1;
                        font-size: .8em;
                        font-weight: 600;
                        color: hsl(0, 0%, 40%);
                        text-transform: uppercase;
                    }
                    .close {
                        cursor: pointer;
                        margin-top: -10px;
                    }
                }
                #flash-modal__dialog-content {
                    box-sizing: border-box;
                    padding: 0 20px 20px 20px;
                }
                #flash-modal__dialog-footer {
                    padding: 20px;
                    box-sizing: border-box;
                    background-color: hsl(0, 0%, 95%);
                }
            }
        }
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>