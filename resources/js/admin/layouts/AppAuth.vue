<template>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <router-view></router-view>
    <q-inner-loading :showing="store.isLoading">
        <q-spinner-gears size="50px" color="primary" />
    </q-inner-loading>
</template>
<script setup lang="ts">
import { computed, ComputedRef, onBeforeUnmount } from "vue";
import store from '../store';

const body = document.getElementsByTagName('body')[0];
body.classList.add('auth-layout');

onBeforeUnmount(() => {
    body.classList.remove('auth-layout')
})

// let visible: ComputedRef<boolean> = computed(() => store.isLoading);
</script>
<style>
.auth-layout {
    background-color: #080710;
}
.auth-layout .background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.auth-layout .background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.auth-layout .shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.auth-layout .shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
.auth-form {
    height: 520;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
.auth-form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
.auth-form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

.auth-layout label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
.auth-layout input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
.auth-layout ::placeholder{
    color: #e5e5e5;
}
 .login-btn, .auth-layout button:not(.transparent-btn) {
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710 !important;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
 .login-btn span.block {
    color: #080710;
    text-transform: capitalize;
}
 .social{
  margin-top: 30px;
  display: flex;
}
 .social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
 .social div:hover{
  background-color: rgba(255,255,255,0.47);
}
 .social .fb{
  margin-left: 25px;
}
 .social i{
  margin-right: 4px;
}
</style>
