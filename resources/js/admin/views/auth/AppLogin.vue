<template>
    <form class="auth-form">
      <h3>Login</h3>
      <q-input label="Username" v-model="form.email" id="username"></q-input>
      <q-input label="Password" type="password" v-model="form.password" id="password"></q-input>

      <q-toggle v-model="form.remember" label="Remember me" color="green"></q-toggle>

      <q-btn label="Log In" @click="login" text-color="dark" class="login-btn"></q-btn>

      <div class="social">
            <q-btn class="go q-mt-none transparent-btn" icon="fab fa-google" label="Google"></q-btn>
            <q-btn class="fb q-mt-none transparent-btn" icon="fab fa-facebook" label="Facebook"></q-btn>
        </div>
        <q-separator class="q-my-md" />
        <div class="row justify-center">
            <q-btn class="go q-mt-none items-center transparent-btn" label="Register" to="/auth/register"></q-btn>
        </div>
    </form>
  </template>

  <script setup lang="ts">
  import useAuth from '../../composables/auth';
  const { login, form } = useAuth();
  </script>

