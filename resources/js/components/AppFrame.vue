<template>
    <div id="app-frame">
        <img id="background" src="./../../assets/background.svg?url" alt="background"/>
        <div id="container">
            <div id="content">
                <header id="header">
                    <Logo />
                </header>
                <Main />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Main from "./Main/Main.vue";
import Logo from "../../assets/car.svg?component";
</script>

<style scoped>
@import "AppFrame.css";
</style>
